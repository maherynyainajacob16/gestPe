<?php
/**
* 
*/
class demande_model extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();
	}
	public function getalldemande()
	{
		$this->db->select('*');
		$this->db->from('demande');
		$query = $this->db->get();
		return $query->result();

	}

	public function listdemus()
	{
		$matr= $_SESSION['uMatricule'];
		$this->db->select('*');
		$this->db->from('demande');
		$this->db->where('uMatricule',$matr);
		$query = $this->db->get();
		return $query->result();
	}
	public function listStatut(){
		$matr= $_SESSION['uMatricule'];
		$this->db->select('*');
		$this->db->from('statut');
		$this->db->where('uMatricule',$matr);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_dem($id)
	{
		$this->db->select('*');
		$this->db->where('idDemande',$id);
		$this->db->from('demande');
		$query = $this->db->get();

		return $query->row();
	}
	public function updatedemande($id)
		{
			$date1 = strtotime($this->input->post('date_debut_demande'));
            $date2 = strtotime($this->input->post('date_fin_demande') );
            $nb_dif = $date2 - $date1;
            $ndjourdem = $nb_dif/86400 + 1;
			$data = array(
				'numDemande' =>$this->input->post('numDemande') , 
				'date_debut_demande' =>$this->input->post('date_debut_demande') ,
				'date_fin_demande' =>$this->input->post('date_fin_demande') ,
				'motif' =>$this->input->post('motif'),
				'nb_jour_demande'=> $ndjourdem ,
				 
				);
			$this->db->where('idDemande',$id);
			$this->db->update('demande',$data);
			return $id;
		}

	public function deletedemande($id)
		{
			$this->db->where('idDemande',$id);
			$this->db->delete('demande');
		}
}

?>