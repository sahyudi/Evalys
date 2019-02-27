<?php


class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url','file');
	}

	function index(){
		$this->load->view('v_form_upload');
	}

	function proses_upload(){

        $config['upload_path']   = FCPATH.'/upload/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('foto',array('nama_foto'=>$nama,'token'=>$token));
        }


	}

}