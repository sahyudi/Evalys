<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class OjtController extends CI_Controller {

	function __construct(){
		parent::__construct();

			if ($this->session->nik==null){
				redirect(Site_url('login'));
			}

		$this->load->model('M_ojt');
		$this->load->helper('url');

	}

	public function index()
	{

		$data =  array(
			// 'bank' => $this->M_ojt->view_bank(),
			'ojt' => $this->M_ojt->view_items()
		);
		// echo json_encode($data);
		$this->load->view('v_input-ojt', $data);
	}

	public function laporan_pdf(){

        $data = array(
            "dataku" => array(
                "nama" => "Petani Kode",
                "url" => "http://petanikode.com"
            )
        );

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('laporan_test', $data);
    }

	function view_bank($ojt_id){
		$data =  array(
				'bank' => $this->db->query("
							SELECT ev.id AS _id, * FROM public.tb_eval ev 
							INNER JOIN public.tb_ojt oj ON ev.ojt_id = oj.id
							WHERE ev.ojt_id = '".$ojt_id."' 
							ORDER BY _id DESC
							") 
				);
		$this->load->view('v_bank',$data);
	}

	function add_ojt(){
		$data = array(
			'kode' => $this->input->post('kode'),
			'name' => $this->input->post('name'),
			'due_date' => $this->input->post('due_date')

		);

		$insert_id = $this->M_ojt->input_data($data);

		echo json_encode(array("status" => TRUE, "msg" => "Data registered successful"));
	}

	function add_bank(){
		$data = array(
			'quest' => $this->input->post('quest'),
			'ojt_id' => $this->input->post('ojt_id'),
			'remark' => $this->input->post('')
		);

		$ojt_id = $this->input->post('ojt_id');
		$insert_id =  $this->M_ojt->input_bank($data);
		$this->view_bank($ojt_id);
		
	}


	function delete_bank($id){
		$this->M_ojt->delete_bank($id);
		$ojt_id = $this->input->post('ojt_id');
		$this->view_bank($ojt_id);
	}


	function delete_ojt($id){
		$this->M_ojt->delete_ojt($id); 
		echo json_encode(array("status" => TRUE, "msg" => "Data deleted successful"));

	}

	function edit_ojt($id){
		$data=$this->M_ojt->edit_ojt($id);
		echo json_encode($data);
	}

	function update_ojt(){
		$data = array(
			'kode' => $this->input->post('kode'),
			'name' => $this->input->post('name'),
			'due_date' => $this->input->post('due_date')
		);

		$this->M_ojt->update_data(array('id'=>$this->input->post('id')), $data);
		
		echo json_encode(array("status" => TRUE, "msg" => "Data updated successful"));
	}

}

?>
