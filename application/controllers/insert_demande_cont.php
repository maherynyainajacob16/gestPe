<?php
class insert_demande_cont extends CI_Controller 
{
    public function __construct()
	{
		parent:: __construct();
	}
	
	
    public function insert_dem()
    {

$ndjourdem = 0;
    	

		if (isset($_POST['insert_demande'])){
			$datedeb = $_POST['date_debut_demande'] ;
            $datefin = $_POST['date_fin_demande'];
            $date1 = strtotime($datedeb);
            $date2 = strtotime($datefin);
            $nb_dif = $date2 - $date1;
            $ndjourdem = $nb_dif/86400 + 1;
            $motif = $_POST['motif'];
            $nom = $_POST['username'];
            $numMat = $_POST['uMatricule'];
            $numDem = $_POST['numDemande'];
       		$sumreliq = 0;
       		if ($ndjourdem > 0) {
       			# code...
       			$this->db->select('nbreliq');
			//$this->db->AS('nbsum');
			$this->db->from('statreliq');
			$this->db->WHERE('uMatricule',$numMat);
			$query = $this->db->get();
			$statreliq = $query->result();
					
			foreach ($statreliq as $sumstat) {
				# code...
				//$numMatstat = $sumstat->uMatricule;
				$sumreliq = $sumstat->nbreliq;
			}      
            if($sumreliq >= $ndjourdem){
            	if( $motif !=null && $ndjourdem != null && $numMat == $_SESSION['uMatricule'] && $nom == $_SESSION['username'] && $numDem != null && $ndjourdem<= $sumreliq ){
				//echo "form_validation";
				$data= array(
					'username' =>$_POST['username'], 
					'uMatricule' =>$_SESSION['uMatricule'],
					'date_debut_demande' =>$_POST['date_debut_demande'],
					'date_fin_demande' =>$_POST['date_fin_demande'],
                    'motif' =>$_POST['motif'],
                    'nb_jour_demande'=>$ndjourdem,
                    'numDemande' =>$numDem    
					);
				
					# code...
					
		//var_dump($nbdem,$numMatdem);
		//var_dump($sumreliq);
		# code...
			if ($statreliq !=null && $statreliq >= $ndjourdem) {
				# code...
				$datarest = array(
				'uMatricule' =>$numMat ,
				'nbreliq' =>$sumreliq - $ndjourdem );
				$this->db->insert('demande',$data);
			
				$this->db->where('uMatricule',$numMat);
				$this->db->update('statreliq',$datarest);
				$this->session->set_flashdata("success","votre demande en cours");
				redirect("listdemUse/get_list_demande","refresh");
				
			}
				

            }
            		
			}
			//$_SESSION['num'] =$numDes;
			else{
				redirect("listdemUse/get_list_demande","refresh");
			}

       		}
       	
			else{
				$erreur = "erreur de saisie";
				redirect("listdemUse/get_list_demande","refresh",$erreur);
		       			
       		}
		}
       // $this->load->view('demande/insert_demande');
    }
    public function editdem($id)
    {
    	$this->load->model('demande_model');
    	$data['demande'] = $this->demande_model->get_dem($id);
    	$nb1 = 0;
    	$nb2 = 0;
    	$matr = $_SESSION['uMatricule'];

    	if(isset($_POST['update_demande']))
    	{
    		$datedeb = $_POST['date_debut_demande'] ;
            $datefin = $_POST['date_fin_demande'];
            $date1 = strtotime($datedeb);
            $date2 = strtotime($datefin);
            $nb_dif = $date2 - $date1;
            $ndjourdem = $nb_dif/86400 + 1;
            if ($ndjourdem > 0) {
            	# code...
            	$this->db->select('*');
				$this->db->from('demande');
				$this->db->where('idDemande',$id);
				$query = $this->db->get();
				$demande = $query->result();
				$nb=0;
				
					foreach ($demande as $dem) {

						# code...
						 $nb=$dem->nb_jour_demande;

					}
					//var_dump($nb);
    		if ($this->demande_model->updatedemande($id)) {

    			$this->db->select('*');
				$this->db->from('statreliq');
				$this->db->where('uMatricule',$matr);
				$query = $this->db->get();
				$statreliq = $query->result();
				$nbre=0;
					foreach ($statreliq as $reliq) {

						# code...
						$nbre = $reliq->nbreliq;

					}
				$nb1 = $nbre +$nb;
				$nb2 = $nb1 - $ndjourdem;

				$dataupreliq = array(
						'uMatricule' =>$matr,
						'nbreliq' => $nb2
						);
					$this->db->where('uMatricule',$matr);
					$this->db->update('statreliq',$dataupreliq);
    			//var_dump($data);
    			$this->session->set_flashdata("success","votre mise a jour est reussie");
				redirect("listdemUse/get_list_demande","refresh");
    			# code...
    		}else{
    			$this->session->set_flashdata("erreur","votre mise a jour n'est reussie");
				redirect("insert_demande_cont/editdem","refresh");

    		}
            }
    	}


 		$this->load->view('demande/updatedem',$data);


    }

    public function deletedem($id)
    {
    	$matr= $_SESSION['uMatricule'];
		//$nb1=0;
		$nbac = 0;
		//$nbdoa = 0;
		$nb = 0;
		
		
		
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
					//$nbdoa = $stat->nb_jour_donne; 

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

    	$this->load->model('demande_model');
    	//$this->load->model('mise_jour_model');
		//$data['statreliq']=$this->mise_jour_model->get_nbreliq($matr);
		$this->demande_model->deletedemande($id);
		redirect("listdemUse/get_list_demande","refresh");
    }
}
 
?>