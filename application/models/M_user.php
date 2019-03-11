<?php
class M_User extends CI_Model{

	var $user = 'public.tb_user';
	

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_user(){
		$query = $this->db->query("
			SELECT * FROM public.tb_user ");
		return $query;
	}

	function input_data($dt){
		$this->db->insert($this->user, $dt);
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