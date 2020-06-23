<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_home');
		$this->load->helper('url');
	}

	public function index()
	{
		$data = array(
			'temp' => $this->M_home->view_items(),
			'user' => $this->M_home->view_user(),
			'ojt' => $this->M_home->view_ojt(),
			'bank' => $this->M_home->view_bank()
		);
		$this->load->view('v_home', $data);
	}

	function view_sio()
	{
		$sio = $this->M_home->view_data();

		$data = array(
			'sio' => $sio
		);

		$this->load->view('v_sio', $data);
	}
}
