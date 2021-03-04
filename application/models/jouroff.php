<?php 
	
	/**
	* 
	*/
	class jouroff extends CI_Model
	{
	public function get_all_jOff()
		{
			$this->db->select('*');
			$this->db->from('recupoff');
			$query = $this->db->get();

			return $query->result();


		}
	public function get_recup($id)
	{
		$this->db->select('*');
		$this->db->where('idjOff',$id);
		$this->db->from('recupoff');
		$query = $this->db->get();

		return $query->result();
	}
	public function get_recupoff($id)
	{
		$this->db->select('*');
		$this->db->where('idjOff',$id);
		$this->db->from('recupoff');
		$query = $this->db->get();

		return $query->row();
	}
	public function updatejoff($id)
		{
			$data = array(
				'nbJ' =>$this->input->post('nbJ') , 
				'date_debut' =>$this->input->post('date_debut') ,
				'date_fin' =>$this->input->post('date_fin') 				 
				);
			$this->db->where('idjOff',$id);
			$this->db->update('recupoff',$data);
			return $id;
		}


	}
?>	