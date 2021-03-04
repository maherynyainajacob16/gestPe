<?php

class Admin extends CI_Controller
{

	public function __construct()
	{

		parent:: __construct();

	}
	public function chercherdem()
	{
		
		if (isset($_POST['chercher'])) {
			# code...
			$dataA = "tonga ato";
			$con = mysqli_connect("<?php echo base_url();?>","root","","projetdb");
			var_dump($dataA);
			$datedeb = $_POST['date1'];
			$datefin = $_POST['date2'];
			$query = "select * from demandevalid where date_debut_demande between '$datedeb ' and 'datefin'";
			$result = '';
			$sql = mysqli_query($con, $query);
			var_dump($sql);
			/*$this->db->select('*');
			$this->db->from('demandevalid');
			$this->db->where('date_debut_demande');
			$this->db->between('$datedeb');
			$this->db->and('$datefin');
			$query = $this->db->get();
			$data['demandevalid'] = $query->result();
			var_dump($data);*/
			}

		$this->load->view('admin/viewAdmin');

		
	}
	
	public  function viewAdm()
	{


		$this->load->view('admin/viewAdmin');
		

	}
	public function all_decision()
	{
		$this->load->model('user_model');
		$statut = $this->user_model->get_alllist_update();
		$data ['statut'] = $statut;
		$this->load->view('admin/list_all_decision',$data);
	}

	public function viewlistdemencour()
	{
		$this->load->model('demande_model');
		$data['demande']= $this->demande_model->getalldemande();
		# code...
		$this->load->view('admin/listdemencour',$data);
	}
	public function viewdemvalider()
	{
		$this->db->select('*');
		$this->db->from('demandevalid');
		$query = $this->db->get();
		$data['demandevalid'] = $query->result();
		$this->load->view('admin/listdemvalider',$data);
	}

	public function listdemannuler()
	{
		$this->db->select('*');
		$this->db->from('demandeannuler');
		$query = $this->db->get();
		$data['demandeannuler'] = $query->result();

		$this->load->view('admin/listdemannuler',$data);

	}
	public function annuler($id)
	{
		$matr= null;
		//$nb1=0;
		$nbac = 0;
		//$nbdoa = 0;
		$nb = 0;
		$usname = null;
		$iddem = null;
		$detdeb = null;
		$datefin = null;
		$motif = null;
		$nbdem = 0;
		
		
		
			# code...
			$this->db->select('*');
			$this->db->from('demande');
			$this->db->where('idDemande',$id);
			$query = $this->db->get();
			$statut = $query->result();
			//var_dump($statut);
				foreach ($statut as $stat) {

				# code...
					$nbac = $stat->nb_jour_demande;
					$matr = $stat->uMatricule; 
					$usname = $stat->username;
					$iddem = $stat->idDemande;
					$detdeb =$stat->date_debut_demande;
					$datefin = $stat->date_fin_demande;
					$motif = $stat->motif;
					$nbdem = $stat->nb_jour_demande;



					}
			//$nb1 = $nbac + $nbdoa;
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
						'nbreliq' => $nb + $nbac
						);
			$this->db->where('uMatricule',$matr);
			$this->db->update('statreliq',$dataupreliq);

			if ($id == $iddem) {
				# code...
				$valid ="la demande est annulée";
			$data= array(
					'user' =>$usname, 
					'uMatricule' =>$matr,
					
                    'reponse' =>$valid  ,
                    'datedeb' =>$detdeb,
                    'datefin'=>$datefin,
                    'nbjour'=>$nbdem ,
                    'motif'=>$motif,
					);
				$this->db->insert('demandeannuler',$data);
			}

    	$this->load->model('demande_model');
    	//$this->load->model('mise_jour_model');
		//$data['statreliq']=$this->mise_jour_model->get_nbreliq($matr);
		$this->demande_model->deletedemande($id);
		
		redirect("admin/viewlistdemencour","refresh");
    }

	
	public function valid($id)
	{
		$this->db->select('*');
		$this->db->from('demande');
		$this->db->where('idDemande',$id);
		$query = $this->db->get();
		$demande = $query->result();
			$iddem = null;
			$umat = null;
			$detdeb = null;
			$datefin = null;
			$usname = null;
			$motif = null;
			$nbdem = 0;

		foreach ($demande as $dem ) {
			# code...
			$iddem = $dem->idDemande;
			$umat=$dem->uMatricule;
			$detdeb =$dem->date_debut_demande;
			$datefin = $dem->date_fin_demande;
			$usname = $dem->username;
			$motif = $dem->motif;
			$nbdem = $dem->nb_jour_demande;

		}
		$valid = "La demande est validée";

		if ($id == $iddem) {
			# code...
			$data= array(
					'username' =>$usname, 
					'uMatricule' =>$umat,
					'date_debut_demande' =>$detdeb,
					'date_fin_demande' =>$datefin,
                    'motif' =>$motif,
                    'nb_jour_demande'=>$nbdem,
                    'reponse' =>$valid   
					);
				$this->db->insert('demandevalid',$data);
				$this->load->model('demande_model');
    			//$this->load->model('mise_jour_model');
				//$data['statreliq']=$this->mise_jour_model->get_nbreliq($matr);
				$this->demande_model->deletedemande($id);
				
				redirect("admin/viewdemvalider","refresh");

		}
		
		$this->load->view('admin/listdemvalider');

	}
	public function validstat($id)
	{
		$umat = null;
		$numdes = null;
		$nbjourD = 0;
		$nbjourA = 0;
		$datefin = 0;
		$datedeb = 0;
		$iddes = 0;
		$this->db->select('*');
		$this->db->where('idStat',$id);
		$this->db->from('statut');
		$query = $this->db->get();
		$statut = $query->result();

		foreach ($statut as $stat ) {
			# code...
			$umat = $stat->uMatricule;
			$numdes = $stat->numDecision;
			$nbjourD = $stat->nb_jour_donne;
			$nbjourA = $stat->nb_jour_ancient;
			$datefin = $stat->date_fin_pa;
			$datedeb = $stat->date_debut_pa;
			$iddes = $stat->idStat;

		}
		$statvalid = "La decision est validée";

		if ($id == $iddes)
		{
			$data = array(
				'numDecision' =>$numdes ,
				'nb_jour_donne' =>$nbjourD,
				'nb_ancien'=>$nbjourA,
				'date_debut' =>$datedeb,
				'date_fin'=>$datefin,
				'uMatricule'=>$umat,
				'statvalid' => $statvalid
				);
			$this->db->insert('statvalid',$data);
		
			//selection donné table statreliq
				$this->db->select('*');
				$this->db->from('statreliq');
				$this->db->where('uMatricule',$umat);
				$query = $this->db->get();
				$statreliq = $query->result();
				//si null
				 if ($statreliq == null)
				{

					$dataupreliq = array(
						'uMatricule' =>$umat,
						'nbreliq' => $nbjourD + $nbjourA
						);
					$this->db->insert('statreliq',$dataupreliq);
				}
				

				//s'il n'est pas null
				else{
					$nb=0;
					foreach ($statreliq as $reliq) {

						# code...
						$nb = $reliq->nbreliq;

					}
					$dataupreliq = array(
						'uMatricule' =>$umat,
						'nbreliq' => $nb + $nbjourA + $nbjourD
						);
					$this->db->where('uMatricule',$umat);
					$this->db->update('statreliq',$dataupreliq);

				}
				$this->load->model('mise_jour_model');
				$this->mise_jour_model->deletestatut($id);
				$this->session->set_flashdata("success","votre decision a été validés");
				redirect("admin/list_des_val","refresh");
			}
			else{
				echo "il y a une erreur";
				$this->session->set_flashdata("success","il y a une ");
				redirect("admin/all_decision","refresh");
			}



	}

	public function list_des_val()
	{
		$this->load->model('user_model');
		$statut = $this->user_model->list_des_valid();
		$data ['statvalid'] = $statut;
		//var_dump($data);
		$this->load->view('admin/viewstatvalid',$data);

	}

	public function deletestat($id)
	{
		$umat = null;
		$numdes = null;
		$nbjourD = 0;
		$nbjourA = 0;
		$datefin = 0;
		$datedeb = 0;
		$iddes = 0;
		$this->db->select('*');
		$this->db->where('idStat',$id);
		$this->db->from('statut');
		$query = $this->db->get();
		$statut = $query->result();

		foreach ($statut as $stat ) {
			# code...
			$umat = $stat->uMatricule;
			$numdes = $stat->numDecision;
			$nbjourD = $stat->nb_jour_donne;
			$nbjourA = $stat->nb_jour_ancient;
			$datefin = $stat->date_fin_pa;
			$datedeb = $stat->date_debut_pa;
			$iddes = $stat->idStat;

		}
		$statvalid = "decision annulée";

		if ($id == $iddes)
		{
			$data = array(
				'numDecision' =>$numdes ,
				'nb_jour_donne' =>$nbjourD,
				'nb_ancien'=>$nbjourA,
				'date_debut' =>$datedeb,
				'date_fin'=>$datefin,
				'uMatricule'=>$umat,
				'statvalid' => $statvalid
				);
			$this->db->insert('statvalid',$data);
		
			
			}
			else{
				echo "il y a une erreur";
				$this->session->set_flashdata("success","il y a une ");
				redirect("admin/all_decision","refresh");
			}


		$this->load->model('mise_jour_model');
		$this->mise_jour_model->deletestatut($id);
		redirect("admin/all_decision","refresh");

	}


}

?>