<?php

class Register extends CI_Controller
{
	
	//public function regi(){
	//	echo "cou2 jacks";
	//} 
	
	public function log()
	{
		///echo "cou2 jacks";

		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('uPassword','uPassword','required[min_length[5]');
		if($this->form_validation->run() == TRUE){
			$username=$_POST['username'];
			$uPassword=$_POST['uPassword'];
			$grade1="admin";
			$grade2="user";
			$this->db->select('*');
			$this->db->from('user');
			$query = $this->db->get();
			$user = $query->result();
			foreach ($user as $users ) {
				# code...
				$uname=$users->username ;
				$uGra=$users->uGrade;	
				$uPass=$users->uPassword;
				$uMat=$users->uMatricule;
				//var_dump($uMat);
				//var_dump($users->username);
				if ($username==$uname && $uPassword==$uPass){
					if ($uGra=="admin"){
					$_SESSION['username'] = $uname;
					$_SESSION['uMatricule'] = $uMat;
					//var_dump($_SESSION['uMatricule']);
					redirect("admin/viewlistdemencour","refresh");
					}
					elseif($uGra=="user"){
					$_SESSION['username'] = $uname;
					$_SESSION['uMatricule'] = $uMat;
					redirect("user/profil","refresh");
					}else{
					$this->session->set_flashdata("error","veiller creer une compte ou votre mot de passe ou votre nom est incorrecte");
					redirect ("register/log","refresh");
					}
			}
		}
	}
		//echo "eto eh!!!";	
		$this->load->view('login');
	}	
	public function regist()
	{
		if (isset($_POST['insert_user'])){
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('uMatricule','uMatricule','required');
			$this->form_validation->set_rules('uPassword','uPassword','required[min_length[5]');
			$this->form_validation->set_rules('uAddress','uAddress','required');
			//$this->form_validation->set_rules('uGrade','uGrade','required');
			if($this->form_validation->run()== TRUE){
				//echo "form_validation";
				$data= array(
					'username' =>$_POST['username'] , 
					'uMatricule' =>$_POST['uMatricule'],
					'uAddress' =>$_POST['uAddress'],
					'uPassword' =>$_POST['uPassword'],
					'uGrade' =>$_POST['uGrade']    
					);
				$this->db->insert('user',$data);
				$this->session->set_flashdata("success","votre compte est creeé");
				redirect("register/log","refresh");
			}
			else{
				$this->session->set_flashdata("success","votre compte est creeé");
				redirect("register/log","refresh");
			}
		}
		//$this->load->view('register');
	}
}

?>