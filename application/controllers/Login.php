<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class login extends CI_Controller
{

	public function __construct()
	{

		parent:: __construct();

	}

 	public function log()
	{
		
		$this->load->view('login');
	}	
}
?>
