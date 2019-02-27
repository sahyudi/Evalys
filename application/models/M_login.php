<?php
class M_login extends CI_Model{

	var $ojt = 'public.tb_ojt';
	var $eval = 'public.tb_eval';
	var $user = 'public.tb_user';
	var $value = 'public.tb_value';
	var $temp = 'public.tb_tmpr';


	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_data($nik){
		$data = $this->db->query("
				SELECT nik, name, * FROM public.tb_user u
				WHERE u.nik = '".$nik."' LIMIT 1
				");

		return $data;
	}

}

?>