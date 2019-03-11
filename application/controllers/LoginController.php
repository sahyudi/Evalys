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
		$nik = $this->input->post('NIK');
		$pass = $this->input->post('password');

		if ($nik == '' || $pass == '') {
			echo '<script> alert("Nik / password can not empty") </script>';
				$this->load->view('login.php');	
			
		}else{

			$data = $this->M_login->get_data($nik)->result();

			if(sizeof($data)){
				// $this->load->view('v_eval.php');
				
				$user = array(
					'nik' => $nik,
					'role' => $data[0]->role
				);
				// print_r($user);
				$this->session->set_userdata($user);
				redirect(site_url('/eval'));	
				// echo json_encode(array('failed' => 'true' ));
			} else {
				// echo json_encode(array('failed' => 'false' ));
				echo '<script> alert("Username / password not valid") </script>';
				$this->load->view('login.php');	
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		header('location:'.site_url('home').$this->index());
	}

}

?>
