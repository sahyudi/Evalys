<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class EvalController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->nik == null) {
			redirect(Site_url('login'));
		}
		// if ($this->session->role != 'admin') {
		// 		$this->load->view('v_error');
		// }

		$this->load->model('M_eval');
		$this->load->helper('url');
	}

	public function index()
	{
		$data = array(
			'temp' => $this->M_eval->view_items(),
			'user' => $this->M_eval->view_user(),
			'ojt' => $this->M_eval->view_ojt(),
			'bank' => $this->M_eval->view_bank()
		);
		$this->load->view('v_eval', $data);
	}

	// function get_certifikat(){
	// 	$this->load->view('v_certifikat');
	// }

	function ambil_user($id)
	{
		$data = $this->M_eval->ambil_user($id);
		echo json_encode($data);
	}

	function ambil_bank($id)
	{
		$data = $this->M_eval->ambil_bank($id);
		echo json_encode($data);
	}

	function get_data($id)
	{
		$data = $this->M_eval->get_data($id);
		echo json_encode($data);
	}


	function view_eval()
	{
		$dat = $this->input->post('ojt_id');
		// echo $data;
		$data2 = array(
			'query' => $this->db->query("SELECT * FROM tb_eval ev 
										 where ev.ojt_id = " . $dat . "
										 ")
		);
		$this->load->view('view_test', $data2);
	}

	function save_eval()
	{
		$id_user = $this->input->post('user_id');
		$id_ojt = $this->input->post('ojt_id');
		$id_ase = $this->input->post('asse');
		$id_ack = $this->input->post('ack');
		$date_ojt = $this->input->post('ojt_date');
		$date_eval = $this->input->post('eval_date');
		$test = $this->input->post('test');
		$nilai = $this->input->post('nilai[]');
		$note = $this->input->post('note[]');
		$id_eval = $this->input->post('id_eval[]');

		$new_date_ojt = date('Y-m-d', strtotime($date_ojt));
		$new_date_eval = date('Y-m-d', strtotime($date_eval));

		$created_at = date('Y-m-d H:i:s');

		$data = $this->db->query("
								SELECT due_date,name FROM tb_ojt
								WHERE tb_ojt.id = '" . $id_ojt . "'
								");
		$hasil = $data->result();

		$due = $hasil[0]->due_date;
		$ojt_name = $hasil[0]->name;


		$nilai_akhir = 0;
		for ($i = 0; $i < count($nilai); $i++) {

			$insert_id2[$i] = $this->M_eval->input_data2($id_user, $id_eval[$i], $nilai[$i], $note[$i], $created_at);
			if ($nilai[$i] == 0) {
				$nilai_akhir++;
			}
		}
		if ($nilai_akhir > 0) {
			$ket = 'FAILED';
			$ex_date = $new_date_eval;
		} else {
			$ket = "PASSED";
			$ex_date = date('Y-m-d H:i:s', strtotime('+' . $due . 'year', strtotime($date_eval)));
		}
		$insert_id = $this->M_eval->input_data($ojt_name, $new_date_ojt, $new_date_eval, $id_ase, $id_ack, $ket, $id_user, $ex_date, $created_at);


		echo json_encode(array("status" => TRUE, "msg" => "Data registered successful"));
	}



	function view_data()
	{

		$data = array(
			'user' => $this->M_eval->view_user(),
			'end' => $this->M_eval->view_data()
		);
		$this->load->view('v_data-eval', $data);
	}

	function delete_eval($id)
	{

		$data = $this->db->query("
								SELECT user_id, created_at FROM tb_end
								WHERE id = '" . $id . "'
								")->result();

		$data2 = $this->db->query("
								SELECT name_file FROM tb_tmpr
								WHERE tb_tmpr.end_id = '" . $id . "'
								")->result();


		$user_id = $data[0]->user_id;
		$created_at = $data[0]->created_at;


		if (is_array($data2)) {
			foreach ($data2 as $del) {
				unlink(FCPATH . '/upload/' . $del->name_file);
			}
		}


		$this->M_eval->delete_value($user_id, $created_at);
		$this->M_eval->delete_eval($id);
		$this->M_eval->delete_file2($id);

		echo json_encode(array("status" => TRUE, "msg" => "Data deleted successful"));
	}

	function end_view($id)
	{
		$data = array(
			'view' => $this->M_eval->end_view($id)
		);
		$html = $this->load->view('v_laporan', $data);
	}

	function view_sio()
	{
		$data = array(
			'sio' => $this->M_eval->view_sio()
		);

		$this->load->view('v_sio', $data);
	}

	function view_file($end_id)
	{
		$data =  array(
			'file' => $this->M_eval->view_file($end_id)
		);
		$this->load->view('v_file', $data);
	}

	function upload_file()
	{
		$end_id = $this->input->post('end_id');
		$this->M_eval->save();
		$this->view_file($end_id);
	}

	function download($filename)
	{
		$this->load->helper('download');
		$filename2 = str_replace('%20', ' ', $filename);

		force_download(FCPATH . '/upload/' . $filename2, null);
	}

	function delete_file($id)
	{
		$data = $this->db->query("
								SELECT name_file FROM tb_tmpr
								WHERE tb_tmpr.id = '" . $id . "'
								")->result();
		// print_r($data);

		unlink(FCPATH . '/upload/' . $data[0]->name_file);
		$this->M_eval->delete_file($id);
		$end_id = $this->input->post('end_id');
		$this->view_file($end_id);
	}

	///////////////////////////// update ke online server
	function print_evaluation()
	{
		//     load library
		$id = 1;
		$data = array(
			'view' => $this->M_eval->end_view($id)
		);

		$data2 = $data['view']->result();

		$name = $data2[0]->user_id; //nanti diganti dengan nama
		$ojt_name = $data2[0]->ojt_name;

		// print_r($name);
		ini_set('memory_limit', '256M');

		// boost the memory limit if it's low ;)
		$this->load->library('pdf');
		$_pdf = $this->pdf->load();

		$html = $this->load->view('v_laporan', $data, true);

		$_pdf->SetHTMLHeader('<h2>coba kamu</2>');
		$_pdf->WriteHTML($html); // write the HTML into the PDF
		$output = 'evaluation_form_' . $ojt_name . '_' . $name . '_.pdf';
		$_pdf->Output("$output", 'I'); // save to file because we can
		exit();
	}

	function get_certifikat($id)
	{
		//     load library


		// $id = 43;
		$data = array(
			'data' => $this->M_eval->get_certifikat($id)
		);
		$data2 = $data['data']->result();

		// print_r($data2);
		// exit;
		$name = $data2[0]->user_id; //nanti diganti dengan nama
		$ojt_name = $data2[0]->remark;


		$this->load->library('pdf');
		$pdf = $this->pdf->load();

		// print_r($name);
		ini_set('memory_limit', '256M');
		$html = $this->load->view('v_certifikat', $data, true);

		//untuk margin landscape       
		$pdf->addPage('L');
		$pdf->WriteHTML($html); // write the HTML into the PDF
		$output = 'certifikat_' . $ojt_name . '_' . $name . '_.pdf';
		$pdf->Output("$output", 'I'); // save to file because we can
		exit();
	}



	function telegram($msg)
	{

		$telegrambot = '645949649:AAHGMXg553to5HH0xNhuCdvZQHwRg_DN1dU';
		$telegramchatid = 384920975;

		$url = 'https://api.telegram.org/bot' . $telegrambot . '/sendMessage';
		$data = array('chat_id' => $telegram_id, 'text' => $msg);
		$options = array('http' => array('method' => 'POST', 'header' => "Content-Type:application/x-www-form-urlencoded\r\n", 'content' => http_build_query($data),),);

		$context = stream_context_create($options);
		$result = file_get_contents($url, false, $context);

		return $result;
	}
	function send_notif_telegram()
	{
		$tl = $this->M_eval->get_send_notif()->result();

		$link = 'http://localhost/hr_program/evalys/index.php/home';

		$data2 = date('Y-m-d');
		// $msg = 'Pesan kosong';
		$array_nik = array(); // tampung per nik (DISTINCT)
		$array_content = array();
		$array_tg_id = array();
		$pembuka = "Hi Sobat !!!! \n
				Saya MyLicense \n \n

				Jangan lupa Kompetensi sobat akan habis masa berlakunya. \n";

		// 1. Thread Inspection Level 1 - 5 May 2019
		// 2. CNC Operator Level 1 - 6 May 2019




		// $idx = 0;

		// PENGOLAHAN DARI DB
		foreach ($tl as $end) {
			$data = date('Y-m-d', strtotime('-3month', strtotime($end->ex_date)));
			$nik = $end->user_id;
			$status = $end->status;
			$telegram_id = $end->telegram_id;

			if ($data <= $data2 && $status == 'PASSED') {
				if (!in_array($nik, $array_nik)) {
					// cek nik yang mulainya dengan 0
					$array_nik[] = $nik;
					$array_tg_id[strval($nik)] = $telegram_id;
				}

				$msg = $end->ojt_name . " expiry pada : \n" . date("d M Y", strtotime($end->ex_date) . "\n");

				if (empty($array_content[strval($nik)])) {
					$array_content[strval($nik)] = $msg;
				} else {
					$array_content[strval($nik)] .= $msg;
				}
				$penutup = "SEGERA LAKUKAN PERPANJANGAN YA!!! \n
							Jika tidak dilakukan perpanjangan kompetensi sobat akan expired.
							Silahkan menghubungi Training Center di Ext. 108 atau 118
							untuk melakukan perpanjangan. \n

							Sukses Selalu!!";
				$kirim = $pembuka . "\n" . $array_content[strval($nik)] . "\n" . $penutup;
			}
		}

		// PENGIRIMAN TELEGRAM
		for ($i = 0; $i < sizeof($array_nik); $i++) {

			$this->telegram($kirim);
		}

		// $this->view_data();
		redirect(site_url('eval/view-data'));
	}
	////////////////////////////////////////////

}
