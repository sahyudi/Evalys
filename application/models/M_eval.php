<?php
class M_eval extends CI_Model{

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

	function end_view($id){
		$query = $this->db->query("
							SELECT O.name AS _name, E.status AS hasil, * FROM Public.tb_end E 
							JOIN public.tb_ojt O ON E.ojt_id = O.id
							JOIN public.tb_user U ON E.user_id = U.id
							JOIN public.tb_eval V ON O.id = V.ojt_id
							JOIN public.tb_value N ON V.id = N.eval_id
							WHERE E.eval_date = N.eval_date AND E.id = ".$id."
				");
		return $query;
	}

	function ambil_user($id){
		$query = $this->db->query("SELECT * from public.tb_user where id = ".$id."") ;	
		return $query->row();
	}

	function view_ojt(){
		$this->db->from($this->ojt);
		$query=$this->db->get();
		return $query;
	}

	function view_sio(){
		$dat= $this->input->post('id_user');

		$query = $this->db->query("
							SELECT O.name AS _name, * FROM public.tb_end E 
							JOIN public.tb_ojt O ON E.ojt_id = O.id
							JOIN public.tb_user U ON E.user_id = U.id
							where E.status = 'PASSED' AND E.id_user = ".$dat."
							");
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

	function view_eval($id){
		$query = $this->db->query("
			SELECT* FROM public.tb_eval 
			where tb_eval.ojt_id = ".$id."
			");
		return $query;
	}

	function input_data2($id_user, $eval_id, $value,$note,$date){
		$hasil=$this->db->query("INSERT INTO tb_value (user_id, eval_id, eval_date, value, remark) VALUES('".$id_user."', '".$eval_id."', '".$date."', '".$value."','".$note."')");
		return $hasil;
	}

	function input_data($id_ojt, $date_ojt, $date_eval,$id_ase,$id_ack,$ket,$id_user,$ex_date){

		$hasil=$this->db->query("INSERT INTO tb_end (ojt_id, user_id, assessor, acknowledge, ojt_date, eval_date, ex_date, status) VALUES('".$id_ojt."','".$id_user."', '".$id_ase."', '".$id_ack."', '".$date_ojt."', '".$date_eval."','".$ex_date."', '".$ket."')");
		return $hasil;
	}

	function view_data(){
		$query = $this->db->query("
				SELECT O.name AS _name, E.id AS _id, * FROM Public.tb_end E 
				INNER JOIN public.tb_ojt O ON E.ojt_id = O.id
				INNER JOIN public.tb_user U ON E.user_id = U.id
				ORDER BY E.id DESC
				");
		return $query;
	}

	function delete_eval($id){ //fungsi delete berdasarkan id
	    $this->db->where('id',$id); //pencocokan id, dimana id_transaksi == inputan $id_transaksi
	    $this->db->delete($this->end); //eksekusi
	    return;
	}

	function save(){
        $end_id = $this->input->post('end_id');

        $path = FCPATH.'/upload/'. $_FILES["attachment"]['name'];
        $file_name = $_FILES["makan"]['name'];
        $num = 0;
        while(file_exists($path)) {
            $num++;
            $path = FCPATH.'/upload/'. $num . $_FILES["attachment"]['name'];
            $file_name = $num . $_FILES["attachment"]['name'];
        }

            if (move_uploaded_file($_FILES['attachment']['tmp_name'], $path)) {
                $foto = $file_name;
            }
             $hasil=$this->db->query("INSERT INTO tb_tmpr(end_id,name_file) VALUES ('".$end_id."','".$foto."')");
    }

    function view_file($end_id){
    	$query = $this->db->query("
							SELECT * FROM public.tb_tmpr file 
							WHERE file.end_id = '".$end_id."' 
							ORDER BY file.end_id DESC
							");
		return $query;
    }
    
}

?>