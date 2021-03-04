<?php

class model_recupOff extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
	}
	public function rjovalid()
	{
		$this->db->select('*');
		$this->db->from('recupoffval');
		$query = $this->db->get();
		$data['recupoffval'] = $query->result();
		$this->load->view('admin/rjovalid',$data);
	}

	public function rjo_get()
	{
		$umat = $_SESSION['uMatricule'];
		$this->db->select('*');
		$this->db->from('recupoff');
		$this->db->where('uMatricule',$umat);
		$query = $this->db->get();
		$data['recupoff'] = $query->result();
		$this->load->view('recupOff/listOff',$data);
	}
	public function rjovalid_get()
	{
		$umat = $_SESSION['uMatricule'];
		$this->db->select('*');
		$this->db->from('recupoffval');
		$this->db->where('uMatricule',$umat);
		$query = $this->db->get();
		$data['recupoffval'] = $query->result();
		$this->load->view('recupOff/listOffV',$data);
	}
	public function insertrecupOff()
	{
		if (isset($_POST['insert_jOff'])){
			$usnam=$_SESSION['username'];
			$matr= $_SESSION['uMatricule'];
			$nbjOff=$_POST['nbJ'];
			$date1 = $_POST['date_debut'];
			$date2 = $_POST['date_fin'];			
			if($usnam == $_POST['username'] && $nbjOff != null && $date2 != null && $date1 != null && $_POST['uMatricule'] == $matr ){
				$date11 = strtotime($date1);
                $date22 = strtotime($date2);
                $nb_dif = $date22 - $date11;
				$nbjourdem = $nb_dif/86400 + 1;
				if( $nbjourdem > 0 && $nbjOff > 0)
				{
					$data = array(
						'username' =>   $usnam,
						'uMatricule' =>    $matr,
						'nbJ' => $nbjOff,
						'date_debut' => $date1,	
						'date_fin' =>   $date2  
						);
					
					$this->db->insert('recupoff', $data);
	
					
					$this->session->set_flashdata("success","votre demande est en cours");
					redirect("model_recupOff/rjo_get","refresh");
				}
				
			}
		
			else{
				echo "il y a une erreur sur votre insertion";
				$this->session->set_flashdata("success","il y a une erreur sur votre insertion");
				redirect("model_recupOff/insertrecupOff","refresh");
			}
		}
		redirect("model_recupOff/rjo_get","refresh");
		//$this->load->view('recupOff/insertOff');
	}

	public function list_all_recupoff()
	{
		$this->load->model('jouroff');

		$recupoff = $this->jouroff->get_all_jOff();
		$data['recupoff'] = $recupoff;
		//var_dump($data);
		$this->load->view('admin/list_all_joff', $data);
	}
	public function validJoff($id)
	{
		$this->load->model('jouroff');

		$recupoff = $this->jouroff->get_recup($id);
		$data['recupoff'] = $recupoff;
		//var_dump($data);
		//$this->load->view('admin/list_all_joff', $data);

		$umat = null;
		$usnam = null;
		$nbj = 0;
		$nbrel = 0;
		$dated = null;
		$datef = null;

		foreach ($recupoff as $recup) {
			# code...
			$umat = $recup->uMatricule;
			$usnam = $recup->username;
			$nbj = $recup->nbJ;
			$dated = $recup->date_debut;
			$datef = $recup->date_fin;

		}
		$valid = 'Récupération de jour-off acceptée';
		$dataOff = array(
			'uMatricule' =>$umat ,
			'username' =>$usnam,
			'nbjOff' =>$nbj,
			'date_debut'=>$dated,
			'date_fin' =>$datef,
			'reponse'=>$valid );
		$this->db->insert('recupoffval',$dataOff);

		$this->db->select('*');
		$this->db->where('uMatricule',$umat);
		$this->db->from('statreliq');
		$nbrel = $this->db->get();

		$dataR = $nbrel->result();
		//var_dump($dataR);

		 if ($dataR == null)
				{

					$dataupreliq = array(
						'uMatricule' =>$umat,
						'nbreliq' => $nbj
						);
					$this->db->insert('statreliq',$dataupreliq);
				}
				

				//s'il n'est pas null
				else{
					$nb=0;
					foreach ($dataR as $reliq) {

						# code...
						$nb = $reliq->nbreliq;

					}
					$dataupreliq = array(
						'uMatricule' =>$umat,
						'nbreliq' => $nb + $nbj
						);
					//var_dump($dataupreliq);
					$this->db->where('uMatricule',$umat);
					$this->db->update('statreliq',$dataupreliq);

				}
			$this->db->where('idjOff',$id);
			$this->db->delete('recupoff');

			redirect("model_recupOff/list_all_recupoff","refresh");

	}

	public function annulJoff($id)
	{
		$this->load->model('jouroff');

		$recupoff = $this->jouroff->get_recup($id);
		$data['recupoff'] = $recupoff;
		//var_dump($data);
		//$this->load->view('admin/list_all_joff', $data);

		$umat = null;
		$usnam = null;
		$nbj = 0;
		$nbrel = 0;
		$dated = null;
		$datef = null;

		foreach ($recupoff as $recup) {
			# code...
			$umat = $recup->uMatricule;
			$usnam = $recup->username;
			$nbj = $recup->nbJ;
			$dated = $recup->date_debut;
			$datef = $recup->date_fin;

		}
		$valid = 'Récupération de jour-off annulée';
		$dataOff = array(
			'uMatricule' =>$umat ,
			'username' =>$usnam,
			'nbjOff' =>$nbj,
			'date_debut'=>$dated,
			'date_fin' =>$datef,
			'reponse'=>$valid );
		$this->db->insert('recupoffval',$dataOff);

			$this->db->where('idjOff',$id);
			$this->db->delete('recupoff');

		redirect("model_recupOff/list_all_recupoff","refresh");

	}
	public function suppoff($id)
	{
		$this->db->where('idjOff',$id);
		$this->db->delete('recupoff');
		redirect("model_recupOff/rjo_get","refresh");
	}
	public function editoff($id)
	{
		$this->load->model('jouroff');
		$data['recupoff']=$this->jouroff->get_recupoff($id);
		if (isset($_POST['update_jOff'])) {
			# code...
			if($this->jouroff->updatejoff($id)){

				$this->session->set_flashdata("success","votre mise a jour est reussie");
				redirect("model_recupOff/rjo_get","refresh");
			}else {
				# code...
				$this->session->set_flashdata("erreur","erreur de la mise jour");
				redirect("model_recupOff/editoff","refresh");
			}
		}

		$this->load->view('recupOff/editjOff',$data);

	}
}
?>