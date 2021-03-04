<?php
/**
* 
*/
class register_model extends CI_Model
{
	
	public function __construct()
	{
		# code...
		parent:: __construct();
	}


	public function get_login()
	{

		$username = $_POST['username'];
		$uPassword = md5($_POST['uPassword']);
		$uGrade=$_POST['uGrade'];

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'=>$username, 'uPassword' => $uPassword));
		$query = $this->db->get();


		return $query->row();
	}
}


?>