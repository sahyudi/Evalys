<?php
class M_home extends CI_Model{

	var $ojt = 'tb_ojt';
	var $eval = 'tb_eval';
	var $user = 'tb_user';
	var $value = 'tb_value';
	var $temp = 'tb_tmpr';
	var $end = 'tb_end';


	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function view_items(){		
		$this->db->from($this->eval);
		$this->db->join($this->ojt, $this->eval.'.ojt_id = '.$this->ojt.'.id');
		// $this->db->where("ojt_id", 1 );
		$query=$this->db->get();
		return $query;
	}

	function view_user(){
		$this->db->from($this->user);
		$query=$this->db->get();
		return $query;
	}


	function view_ojt(){
		$this->db->from($this->ojt);
		$query=$this->db->get();
		return $query;
	}

	function view_bank(){
		$this->db->from($this->eval);
		$query=$this->db->get();
		return $query;
	}

	function ambil_bank($id){
		$query = $this->db->query("SELECT * from tb_eval where ojt_id = ".$id."") ;	
		return $query->row();
	}
	
//// update ke pak dirman
	function view_data(){
		$dat = $this->input->post('id_user');
		$query = $this->db->query("
							SELECT remark as ojt_name, user_id as nik,  MAX(ex_date) as ex_date FROM tb_end
							WHERE status = 'PASSED' AND user_id = '".$dat."'
							GROUP BY (remark), user_id
							
				");
		return $query;
	}

}
