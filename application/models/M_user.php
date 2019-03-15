<?php
class M_User extends CI_Model{

	var $user = 'public.tb_user';
	var $telegram = 'public.tb_telegram';
	

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function get_user(){
		$query = $this->db->query("
			SELECT * FROM public.tb_user ");
		return $query;
	}

	function get_telegram(){
		$query = $this->db->query("
			SELECT * FROM public.tb_telegram ");
		return $query;
	}

	function add_user($dt){
		$this->db->insert($this->user, $dt);
		return $this->db->insert_id();
	}

	function add_id_telegram($dt){
		$this->db->insert($this->telegram, $dt);
		return $this->db->insert_id();
	}

	

	function delete_user($id){ //fungsi delete berdasarkan id
	    $this->db->where('id',$id); //pencocokan id, dimana id_transaksi == inputan $id_transaksi
	    $this->db->delete($this->user); //eksekusi
	    return;
	}

	function delete_telegram($id){ //fungsi delete berdasarkan id
	    $this->db->where('id',$id); //pencocokan id, dimana id_transaksi == inputan $id_transaksi
	    $this->db->delete($this->telegram); //eksekusi
	    return;
	}

	function edit_user($id){		
		$query= $this->db->query("
			SELECT * FROM public.tb_user 
			WHERE tb_user.id = '$id'
			");
		return $query->row();
	}

	function edit_telegram($id){		
		$query= $this->db->query("
			SELECT * FROM public.tb_telegram 
			WHERE tb_telegram.id = '$id'
			");
		return $query->row();
	}

	function update_data($where, $dt){
		$this->db->update($this->user,$dt, $where);
		return $this->db->affected_rows();
	}

	function view_ojt(){
		$this->db->from($this->ojt);
		$query=$this->db->get();
		return $query;
	}

}

?>