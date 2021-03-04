<?php
/**
* 
*/
class listdemUse extends CI_Controller
{
	
	public function __construct()
	{
		parent:: __construct();
	}
	public function get_list_demande()
	{	
		$matr= $_SESSION['uMatricule'];
		$this->load->model('demande_model');
		$demande = $this->demande_model->listdemus();
		$data ['demande'] = $demande;

		$this->load->view('demande/listmademande',$data);
	}
	public function get_nb_don()
	{
		$this->load->model('demande_model');
		$demande = $this->demande_model->listStatut();
				$nbsom=0;
		foreach ($demande as $demandes) {
			# code...
			$nbdon = $demandes->nb_jour_donne;
			$nbanc = $demandes->nb_jour_ancient;
			$nbsom = $nbsom + $nbanc + $nbdon ;


		}
		$data ['nbsom'] = $nbsom;
		
		$this->load->view('user/profil',$data);

	}
}
?>