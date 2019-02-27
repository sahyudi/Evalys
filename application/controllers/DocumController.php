<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class DocumController extends CI_Controller {

	function __construct(){
		parent::__construct();
			
			if ($this->session->nik==null){
				redirect(Site_url('login'));
			}

		$this->load->model('M_docum');
		$this->load->helper('url');

	}

	public function index()
	{
		// $data = array(
		// 	'temp' => $this->M_docum->view_items()
		// 	 );
		// $this->load->view('v_document',$data);
		$this->load->view('v_document');

	}
}
