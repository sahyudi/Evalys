<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class BankController extends CI_Controller {

	function __construct(){
		parent::__construct();
		
			if ($this->session->nik == null){
				redirect(Site_url('login'));
			}

			if ($this->session->role != 'admin') {
				redirect(Site_url('eval/view-data'));
			}
			
		$this->load->model('M_bank');
		$this->load->helper('url');

	}

	public function index()
	{
		$data = array(
			'bank' => $this->M_bank->view_items(),
			'ojt' => $this->M_bank->view_ojt()
			 );
		$this->load->view('v_eval-bank',$data);
	}

	function add_bank(){
		$data = array(
			'quest' => $this->input->post('quest'),
			'ojt_id' => $this->input->post('ojt'),
			'remark' => $this->input->post('')
		);

		$insert_id = $this->M_bank->input_data($data);
		echo json_encode(array("status" => TRUE, "msg" => "Data registered successful"));
	}

	function delete_bank($id){
		$this->M_bank->delete_bank($id); 
		echo json_encode(array("status" => TRUE, "msg" => "Data deleted successful"));
	}

	function edit_bank($id){
		$data=$this->M_bank->edit_bank($id);
		echo json_encode($data);
	}

	function update_bank(){
		$data = array(
			'quest' => $this->input->post('quest')
		);

		$this->M_bank->update_data(array('id'=>$this->input->post('id')), $data);
		
		echo json_encode(array("status" => TRUE, "msg" => "Data updated successful"));
	}

}


