<?php 
	class user_model extends CI_Model
	{
		
		public function get_all_user()
		{
			# code...
			$this->db->select('*');
			$this->db->from('user');
			$query = $this->db->get();
			return $query->result();
		}
		public function get_all_userid($id)
		{
			# code...
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('uId',$id);
			$query = $this->db->get();
			return $query->result();
		}
		public function get_list_update()
		{
			# code...
			$matr= $_SESSION['uMatricule'];
			$this->db->select('*');
			$this->db->from('statut');
			$this->db->where('uMatricule',$matr);
			$query = $this->db->get();
			return $query->result();
		}
		public function get_alllist_update()
		{
			# code...
			$this->db->select('*');
			$this->db->from('statut');
			$query = $this->db->get();
			return $query->result();
		}


		public function list_des_valid()
		{
			$this->db->select('*');
			$this->db->from('statvalid');
			$query = $this->db->get();
			return $query->result();

		}
		
	}

?>