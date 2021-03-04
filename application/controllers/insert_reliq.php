<?php
class insert_reliq extends CI_Controller 
{
    public function __construct()
	{
		parent:: __construct();
	}

	public function forreliq(){
		$nbrest = 0;
		$uMatricule=$_SESSION['uMatricule']; 
		$this->db->select('*');
		$this->db->from('statreliq');
		$this->db->where('uMatricule',$uMatricule);
		$query = $this->db->get();
		$statreliq = $query->result();
		/*foreach ($statreliq as $statreliqs) {
			$nbreliq = $statreliqs->nbreliq;		
			# code...
			$nbrest=$nbreliq;

		}*/
		$data['$statreliq']=$statreliq;
		//redirect("user/profil","refresh");

		$this->load->view('user/profil',$data);
	}

}
?>