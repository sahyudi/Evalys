<?php
class M_eval extends CI_Model
{

	var $ojt = 'tb_ojt';
	var $eval = 'tb_eval';
	var $user = 'tb_user';
	var $value = 'tb_value';
	var $temp = 'tb_tmpr';
	var $end = 'tb_end';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function view_items()
	{
		$this->db->from($this->eval);
		$this->db->join($this->ojt, $this->eval . '.ojt_id = ' . $this->ojt . '.id');
		// $this->db->where("ojt_id", 1 );
		$query = $this->db->get();
		return $query;
	}

	function view_user()
	{
		$this->db->from($this->user);
		$query = $this->db->get();
		return $query;
	}

	function end_view($id)
	{
		$query = $this->db->query("
							SELECT N.criteria AS crie, E.status AS hasil, E.remark AS ojt_name,E.*, N.* FROM tb_end E 
							JOIN tb_value N ON E.created_at = N.created_at
							WHERE E.id = " . $id . "
				");
		return $query;
	}
	//////////////////////////// update ke online server
	function get_certifikat($id)
	{
		$query = $this->db->query("
							SELECT * FROM tb_end 
							WHERE tb_end.id = " . $id . "
				");
		return $query;
	}
	////////////////////////////

	function ambil_user($id)
	{
		$query = $this->db->query("SELECT * from tb_user where id = " . $id . "");
		return $query->row();
	}

	function view_ojt()
	{
		$this->db->from($this->ojt);
		$query = $this->db->get();
		return $query;
	}

	function view_bank()
	{
		$this->db->from($this->eval);
		$query = $this->db->get();
		return $query;
	}

	function ambil_bank($id)
	{
		$query = $this->db->query("SELECT * from tb_eval where ojt_id = " . $id . "");
		return $query->row();
	}

	function view_eval($id)
	{
		$query = $this->db->query("
			SELECT* FROM tb_eval 
			where tb_eval.ojt_id = " . $id . "
			");
		return $query;
	}

	function input_data2($id_user, $eval_id, $value, $note, $date)
	{
		$hasil = $this->db->query("INSERT INTO tb_value (user_id, criteria, created_at, value, remark) VALUES('" . $id_user . "', '" . $eval_id . "', '" . $date . "', '" . $value . "','" . $note . "')");
		return $hasil;
	}

	function input_data($ojt_name, $date_ojt, $date_eval, $id_ase, $id_ack, $ket, $id_user, $ex_date, $created_at)
	{

		$hasil = $this->db->query("INSERT INTO tb_end (remark, user_id, assessor, acknowledge, ojt_date, eval_date, ex_date, status, created_at) VALUES('" . $ojt_name . "','" . $id_user . "', '" . $id_ase . "', '" . $id_ack . "', '" . $date_ojt . "', '" . $date_eval . "','" . $ex_date . "', '" . $ket . "', '" . $created_at . "')");
		return $hasil;
	}

	function view_data()
	{
		$query = $this->db->query("
				SELECT id AS _id, remark AS ojt_name,tb_end.* FROM tb_end 
				ORDER BY id DESC
				");
		return $query;
	}

	function get_send_notif()
	{
		$query = $this->db->query("
				SELECT E.id AS _id, E.remark AS ojt_name, * FROM tb_end E
				JOIN tb_telegram T ON E.user_id = T.emp_nik
				-- ORDER BY E.id DESC
				");
		return $query;
	}

	function delete_eval($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->end);
		return;
	}

	function delete_file($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->temp);
		return;
	}

	//////////////////////////////////////////////////query baru update ke pak dirman

	function delete_value($id, $time)
	{

		$query = $this->db->query("
				DELETE FROM tb_value
				WHERE user_id = '" . $id . "' AND created_at = '" . $time . "'
				");
		return $query;
	}


	function delete_file2($id)
	{
		$query = $this->db->query("
				DELETE FROM tb_tmpr
				WHERE end_id = " . $id . "
				");
		return $query;
	}

	//////////////////////////////////////////////////////////


	function save()
	{
		$end_id = $this->input->post('end_id');

		$path = FCPATH . '/upload/' . $_FILES["attachment"]['name'];
		$file_name = $_FILES["attachment"]['name'];
		$num = 0;

		while (file_exists($path)) {
			$num++;
			$path = FCPATH . '/upload/' . $num . $_FILES["attachment"]['name'];
			$file_name = $num . $_FILES["attachment"]['name'];
		}

		if (move_uploaded_file($_FILES['attachment']['tmp_name'], $path)) {
			$foto = $file_name;
		}

		$hasil = $this->db->query("INSERT INTO tb_tmpr(end_id,name_file) VALUES ('" . $end_id . "','" . $foto . "')");
	}

	function view_file($end_id)
	{
		$query = $this->db->query("
							SELECT * FROM tb_tmpr file 
							WHERE file.end_id = '" . $end_id . "' 
							ORDER BY file.end_id DESC
							");
		return $query;
	}


	///////// update ke online server
	function get_items()
	{
		$query = $this->db->query("
				SELECT id AS _id, remark AS ojt_name, * FROM tb_end 
				ORDER BY id DESC
				");
		return $query;
	}
	//////////////////////////////   
}
