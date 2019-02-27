<?php
class M_docum extends CI_Model{

	var $ojt = 'public.tb_ojt';
	var $eval = 'public.tb_eval';
	var $user = 'public.tb_user';
	var $value = 'public.tb_value';
	var $temp = 'public.tb_tmpr';


	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function view_items(){		
		$this->db->from($this->eval);
		$this->db->join($this->ojt, $this->eval.'.ojt_id = '.$this->ojt.'.id');
		// $this->db->join($this->items, $this->booking.'.items_id ='.$this->items.'.items_id');
		$this->db->where("ojt_id", 1 );
		$query=$this->db->get();
		return $query;
	}

}

?>