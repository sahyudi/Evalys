<?php
class M_ojt extends CI_Model{

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
		$this->db->from($this->ojt);
		$query=$this->db->get();
		return $query;
	}

	// function view_bank(){
	// 	$query = $this->db->query("
	// 		SELECT ev.id AS _id, * FROM public.tb_eval ev 
	// 		INNER JOIN public.tb_ojt oj ON ev.ojt_id = oj.id
	// 		WHERE ev.ojt_id = 1
	// 		");
	// 	// $query2 = $query->result();
	// 	return $query;
	// }	

	function input_data($dt){
		$this->db->insert($this->ojt, $dt);
		return $this->db->insert_id();
	}
///////query baru update ke server
	function delete_all_bank($ojt_id){
		 $this->db->where('ojt_id',$ojt_id); 
	    $this->db->delete($this->eval);
	    return;
	}
//////////////
	function input_bank($dt){
		$this->db->insert($this->eval, $dt);
		return $this->db->insert_id();
	}

	function delete_bank($id){ //fungsi delete berdasarkan id
	    $this->db->where('id',$id); //pencocokan id, dimana id_transaksi == inputan $id_transaksi
	    $this->db->delete($this->eval); //eksekusi
	    return;
	}

	function delete_ojt($id){ 
	    $this->db->where('id',$id); 
	    $this->db->delete($this->ojt);
	    return;
	}

	function edit_ojt($id){		
		$this->db->from($this->ojt);
		$this->db->where('id',$id);
		$query= $this->db->get();
		return $query->row();
	}

	function update_data($where, $dt){
		$this->db->update($this->ojt,$dt, $where);
		return $this->db->affected_rows();
	}

}

?>