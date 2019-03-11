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

		$insert_id = $this->M_user->input_data($data);

		echo json_encode(array("status" => TRUE, "msg" => "Data registered successful"));
	}


	function delete_bank($id){
		$this->M_ojt->delete_bank($id);
		$ojt_id = $this->input->post('ojt_id');
		$this->view_bank($ojt_id);
	}


	function delete_ojt($id){
		$this->M_ojt->delete_ojt($id); 
		echo json_encode(array("status" => TRUE, "msg" => "Data deleted successful"));

	}

	function edit_ojt($id){
		$data=$this->M_ojt->edit_ojt($id);
		echo json_encode($data);
	}

	function update_ojt(){
		$data = array(
			'kode' => $this->input->post('kode'),
			'name' => $this->input->post('name'),
			'due_date' => $this->input->post('due_date')
		);

		$this->M_ojt->update_data(array('id'=>$this->input->post('id')), $data);
		
		echo json_encode(array("status" => TRUE, "msg" => "Data updated successful"));
	}

}

?>
