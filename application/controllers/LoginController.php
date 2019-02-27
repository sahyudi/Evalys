<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('url');



	}

	public function index(){
		$this->load->view('login.php');
	}
	
	public function authentication(){
		$nik = htmlspecialchars($_POST['NIK']);

		$data = $this->M_login->get_data($nik)->result();

		if(sizeof($data)){
			// $this->load->view('v_eval.php');
			
			$user = array(
				'nik' => $nik,
				'name' => $data[0]->name,
				'role' => $data[0]->role
			);
			// print_r($user);
			$this->session->set_userdata($user);
			redirect(site_url('/eval'));	
		} else {
			$this->load->view('login.php');	
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		header('location:'.site_url('home').$this->index());
	}

}

?>
