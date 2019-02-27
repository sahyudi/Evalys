<?php
class M_bank extends CI_Model{

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
		$query = $this->db->query("
			SELECT ev.id AS _id, * FROM public.tb_eval ev 
			INNER JOIN public.tb_ojt oj ON ev.ojt_id = oj.id
			");
		return $query;
	}

	function input_data($dt){
		$this->db->insert($this->eval, $dt);
		return $this->db->insert_id();
	}

	function delete_bank($id){ //fungsi delete berdasarkan id
	    $this->db->where('id',$id); //pencocokan id, dimana id_transaksi == inputan $id_transaksi
	    $this->db->delete($this->eval); //eksekusi
	    return;
	}

	function edit_bank($id){		
		$query= $this->db->query("
			SELECT ev.id AS _id, * FROM public.tb_eval ev 
			INNER JOIN public.tb_ojt oj ON ev.ojt_id = oj.id
			WHERE ev.id = '$id'
			");
		return $query->row();
	}

	function update_data($where, $dt){
		$this->db->update($this->eval,$dt, $where);
		return $this->db->affected_rows();
	}

	function view_ojt(){
		$this->db->from($this->ojt);
		$query=$this->db->get();
		return $query;
	}

}

?>