<?php

/**
* 
*/
class cont_reliq extends CI_Controller 
{
	
	public function __construct()
	{
		parent:: __construct();
	}


	public function getRest()
	{
		$numMat = $_SESSION['uMatricule'];
		$nbdem = 0;
		$numMatdem = 0;
		
		$restreliq = 0;
		$numMatstat = 0;
		$this->db->select('*');
		$this->db->from('demande');
		$this->db->WHERE('uMatricule',$numMat);
		$query = $this->db->get();
		$demande = $query->result();
		//$data['demande'] = $demande;
		var_dump($demande);

 		foreach ($demande as $dem ) {

 			$numMatdem = $dem->uMatricule;
			$nbdem = $dem->nb_jour_demande;
			
			# code...
		}
	if ($demande !=null) {

		# code...
			$sumreliq = 0;
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
		var_dump($nbdem,$numMatdem);
		var_dump($sumreliq);
		# code...
			if ($statreliq !=null) {
				# code...
				$datarest = array(
				'uMatricule' =>$numMat ,
				'nbreliq' =>$sumreliq - $nbdem );
				$this->db->where('uMatricule',$numMat);
				$this->db->update('statreliq',$datarest);
			}

		redirect("user/profil","refresh");
				var_dump($sumreliq);
	}
		$this->load->view('user/profil');
	}
}

//SELECT SUM(nbreliq) AS nbtotal
//FROM statreliq
//WHERE uMatricule = 'matt'

?>