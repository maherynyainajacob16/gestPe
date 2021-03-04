<?php 
	
	/**
	* 
	*/
	class mise_jour_model extends CI_Model
	{
		
		
		public function get_stat($id)
		{
			$this->db->select('*');
			$this->db->where('idStat',$id);
			$this->db->from('statut');
			$query = $this->db->get();

			return $query->row();


		}
		public function get_nbreliq($matr)
		{
			$this->db->select('*');
			$this->db->where('uMatricule',$matr);
			$this->db->from('statreliq');
			$query = $this->db->get();

			return $query->row();


		}
		public function updatestatmod($id)
		{
			$data = array(
				'nb_jour_donne' =>$this->input->post('nb_jour_donne') , 
				'date_debut_pa' =>$this->input->post('date_debut_pa') ,
				'date_fin_pa' =>$this->input->post('date_fin_pa') ,
				'nb_jour_ancient' =>$this->input->post('nb_jour_ancient'),
				'numDecision'=>$this->input->post('numDecision') ,
				 
				);
			$this->db->where('idStat',$id);
			$this->db->update('statut',$data);
			return $id;
		}

		public function deletestatut($id)
		{
			$this->db->where('idStat',$id);
			$this->db->delete('statut');
		}
	}

?>