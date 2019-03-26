<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	function __construct(){
		parent::__construct();

			if ($this->session->nik==null){
				redirect(Site_url('login'));
			}

		$this->load->model('M_user');
		$this->load->helper('url');

	}

	public function index()
	{

		$data =  array(
			'user' => $this->M_user->get_user()
		);
		$this->load->view('v_user', $data);
	}

	function add_user(){
		$data = array(
			'nik' => $this->input->post('nik'),
			'role' => $this->input->post('role')
		);

		$this->M_user->add_user($data);

		echo json_encode(array("status" => TRUE, "msg" => "Data saved successful"));
	}

	function delete_user($id){
		$this->M_user->delete_user($id); 
		echo json_encode(array("status" => TRUE, "msg" => "Data deleted successful"));

	}

	function edit_user($id){
		$data=$this->M_user->edit_user($id);
		echo json_encode($data);
	}

	function update_user(){
		$data = array(
			'nik' => $this->input->post('update_nik'),
			'role' => $this->input->post('role')
		);

		$this->M_user->update_data(array('id'=>$this->input->post('user_id')), $data);
		
		echo json_encode(array("status" => TRUE, "msg" => "Data updated successful"));
	}

/////////////////////update ke pak dirman
	function get_telegram(){

		$data =  array(
			'user' => $this->M_user->get_telegram()
		);
		$this->load->view('v_telegram', $data);
	}

	function add_id_telegram(){
		$data = array(
			'emp_nik' => $this->input->post('nik'),
			'telegram_id' => $this->input->post('telegram_id')
		);

		$this->M_user->add_id_telegram($data);

		echo json_encode(array("status" => TRUE, "msg" => "Data saved successful"));
	}

	function delete_telegram($id){
		$this->M_user->delete_telegram($id); 
		echo json_encode(array("status" => TRUE, "msg" => "Data deleted successful"));

	}

	function edit_telegram($id){
		$data=$this->M_user->edit_telegram($id);
		echo json_encode($data);
	}

	function update_telegram(){
		$data = array(
			'emp_nik' => $this->input->post('update_nik'),
			'telegram_id' => $this->input->post('update_telegram_id')
		);

		$this->M_user->update_data_telegram(array('id'=>$this->input->post('user_id')), $data);
		
		echo json_encode(array("status" => TRUE, "msg" => "Data updated successful"));
	}

/////////////////////

}

?>
