<?php
class M_home extends CI_Model{

	var $ojt = 'public.tb_ojt';
	var $eval = 'public.tb_eval';
	var $user = 'public.tb_user';
	var $value = 'public.tb_value';
	var $temp = 'public.tb_tmpr';
	var $end = 'public.tb_end';


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
		$query = $this->db->query("SELECT * from public.tb_eval where ojt_id = ".$id."") ;	
		return $query->row();
	}
	

	function view_data(){
		$dat = $this->input->post('id_user');
		$query = $this->db->query("SELECT O.name AS _name, * FROM public.tb_end E 
							JOIN public.tb_ojt O ON E.ojt_id = O.id
							JOIN public.tb_user U ON E.user_id = U.id
							where E.status = 'PASSED' AND E.user_id = ".$dat."
				");
		return $query;
	}

}

?>