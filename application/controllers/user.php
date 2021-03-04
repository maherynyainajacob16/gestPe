<?php
class User extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();

		/*if(!isset ($_SESSION['user_logged'])){
			$this->session->set_flashdata("error","errroe");
			redirect("register/log");
		}*/
	}
	public function visit($id)
	{
		
		$this->load->model('user_model');
		$user = $this->user_model->get_all_userid($id);
		$data['user'] = $user;
		$uname = null;
		$umat=null;
		$uid=null;
		foreach ($user as $users) {
			$umat = $users->uMatricule;
			$uname= $users->username;
			$uid = $users->uId;
			# code...
		}
		if ($uid == $id) {
			$matr = $umat;
			$this->load->model('mise_jour_model');
			$data['statreliq']= $this->mise_jour_model->get_nbreliq($matr);
			$_SESSION['username'] = $uname;
			$_SESSION['uMatricule'] = $umat;
			redirect("user/profil","refresh");
			# code...
		}
		else{
			redirect("user/listUser","refresh");
		}
		$this->load->view('user/profil',$data);
	}
	public  function profil()
	{
		$matr = $_SESSION['uMatricule'];

		$this->load->model('mise_jour_model');
		$data['statreliq']= $this->mise_jour_model->get_nbreliq($matr);
		# code...
			$matr=$_SESSION['uMatricule'];
		$this->db->select('*');
		$this->db->from('demandevalid');
		$this->db->where('uMatricule',$matr);
		$query = $this->db->get();
		$data1['demandevalide'] = $query->result();
		//var_dump($data1);
		
		
		$this->load->view('user/profil',$data1 + $data);
	}
	public function listUser()
	{
		$this->load->model('user_model');
		$user = $this->user_model->get_all_user();
		$data['user'] = $user;
		$this->load->view('user/listUser',$data);
	}
	public function mystat()
	{
		//$matr= $_SESSION['uMatricule'];
		$this->load->model('user_model');
		$statut = $this->user_model->get_list_update();
		$data ['statut'] = $statut;
		
		$this->load->view('user/mystat',$data);
	}
	

	public function getlistdemannuler()
	{
		$matr=$_SESSION['uMatricule'];
		$this->db->select('*');
		$this->db->from('demandeannuler');
		$this->db->where('uMatricule',$matr);
		$query = $this->db->get();
		$data1['demandeannuler'] = $query->result();
		$this->load->view('user/listdemannuleruser',$data1);
	}
	public function update_user()
	{
		if (isset($_POST['update_user'])){
			$username = $_POST['username'];
			$matr = $_POST['uMatricule'];
			$mdp = $_POST ['mdp'];
			$mat = null;
			$pass = null;
			$name = null;
			$grad = null;
			$add = null;

			if ($username != null && $matr != null && $mdp != null)
			{
				$this->db->select('*');
				$this->db->from('user');
				$this->db->where('uMatricule', $matr);
				$query = $this->db->get();
				$users = $query->result();
				foreach ($users as $us) {
					# code...
					$mat = $us->uMatricule;
					$pass = $us->uPassword;
					$name = $us->username;
					$grad = $us->uGrade;
					$add = $us->uAddress;
				}
				$data = array(
					'uMatricule' => $matr,
					'uPassword' => $mdp,
					'username' => $username,
					'uGrade' => $grad,
					'uAddress' => $add,

					);
				var_dump($data);
				$this->db->where('uMatricule',$mat);
				$this->db->update('user',$data);
				redirect("register/log","refresh");


			}

		}else {
			# code...
			redirect("user/profil","refresh");
		}
	}
	public function delete($id)
	{
		$this->db->where('uId',$id);
		$this->db->delete('user');
		redirect("user/listUSer","refresh");
	}
}
?>