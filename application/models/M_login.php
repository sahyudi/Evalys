<?php
class M_login extends CI_Model{


	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_data($nik){
		$data = $this->db->query("
				SELECT * FROM public.tb_user
				WHERE nik = '".$nik."' LIMIT 1
				");

		return $data;
	}

}

?>