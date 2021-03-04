<?php

class mise_jour extends CI_Controller
{

	public function __construct()
	{
		parent:: __construct();
	}
	//insertion du mise ajour du statut
	public  function insert_update_statut()
	{
		if (isset($_POST['insert_stat'])){
			$numDes=$_POST['numDecision'];
			$matr= $_SESSION['uMatricule'];
			$nbDo=$_POST['nb_jour_donne'];
			$nbAnc=$_POST['nb_jour_ancient'];
			$date1 = $_POST['date_debut_pa'];
            $date2 = $_POST['date_fin_pa'];		
            	
			if($numDes != null && $nbDo != null && $date2 != null && $date1 != null && $_POST['uMatricule'] == $matr ){
                $date11 = strtotime($date1);
                $date22 = strtotime($date2);
                $nb_dif = $date22 - $date11;
                $nbjourdem = $nb_dif/86400 + 1;
                if( $nbjourdem > 0 && $nbDo > 0 )
                {
                    $data = array(
                        'numDecision' =>   $numDes,
                        'uMatricule' =>    $matr,
                        'nb_jour_donne' => $nbDo,
                        'date_debut_pa' => $date1,	
                        'date_fin_pa' =>   $date2,
                        'nb_jour_ancient'=>$nbAnc   
                        );
                    $this->db->insert('statut', $data);
                    $this->session->set_flashdata("success","votre mise à jour est bien faite");
                    redirect("user/mystat","refresh");
                }				
			}
		
			else{
				echo "il y a une erreur sur votre insertion";
				$this->session->set_flashdata("success","il y a une erreur sur votre insertion");
				redirect("user/mystat","refresh");
			}
		}
		
        redirect("user/mystat","refresh");
		// $this->load->view('user/insert_stat');
	}

	public function listdesval()

	{

		$matr = $_SESSION['uMatricule'];
		$this->db->select('*');
		$this->db->where('uMatricule',$matr);
		$this->db->from('statvalid');
		$query = $this->db->get();
		$data['statvalid'] = $query->result();

		$this->load->view('user/liststatvalid',$data);

	}

	public function editstat($id)
	{
		$matr = $_SESSION['uMatricule'];
		$nbdtaloa = 0;
		$nbvaovao = 0;
		$nbIzy = 0;
		$nb1 = 0;
		$nb2 = 0;
		$this->load->model('mise_jour_model');
		$data['statut']=$this->mise_jour_model->get_stat($id);
		//$this->mise_jour_model->updatestatmod($id);
		if(isset($_POST ['updatestat'])){
			
			if($this->mise_jour_model->updatestatmod($id)){

				$this->session->set_flashdata("success","votre mise a jour est reussie");
				redirect("user/mystat","refresh");
			}else {
				# code...
				$this->session->set_flashdata("erreur","erreur de la mise jour");
				redirect("mise_jour/editstat","refresh");
			}
		}

		$this->load->model('mise_jour_model');
		
		//var_dump($s);
		$this->load->view('user/editstat',$data);

	}
	public function deletestat($id)
	{
		$matr= $_SESSION['uMatricule'];
		$nb1=0;
		$nbac = 0;
		$nbdoa = 0;
		$nb = 0;
		
		
		
			# code...
			/*$this->db->select('*');
			$this->db->from('statut');
			$this->db->where('idStat',$id);
			$query = $this->db->get();
			$statut = $query->result();
			//var_dump($statut);
				foreach ($statut as $stat) {

				# code...
					$nbac = $stat->nb_jour_ancient;
					$nbdoa = $stat->nb_jour_donne; 

					}
			$nb1 = $nbac + $nbdoa;
			//var_dump($nb1);
			$this->db->select('*');
			$this->db->from('statreliq');
			$this->db->where('uMatricule',$matr);
			$query = $this->db->get();
			$statreliq = $query->result();
			
				foreach ($statreliq as $reliq) {
					# code...
					$nb = $reliq->nbreliq;
					}
			$dataupreliq = array(
						'uMatricule' =>$matr,
						'nbreliq' => $nb - $nb1
						);
			$this->db->where('uMatricule',$matr);
			$this->db->update('statreliq',$dataupreliq);*/

			//var_dump($nb);	
		
		
		
		//$this->load->model('mise_jour_model');
		//$data['statreliq']=$this->mise_jour_model->get_nbreliq($matr);
		$this->load->model('mise_jour_model');
		$this->mise_jour_model->deletestatut($id);
		redirect("user/mystat","refresh");

	}
}
?>