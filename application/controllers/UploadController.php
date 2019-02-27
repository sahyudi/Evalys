<?php 
class UploadController extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_upload');
        $this->load->library('upload');
    } 
 
    function index(){
        $this->load->view('v_upload');
    }
 
    // function upload_foto(){
    //     $config['upload_path'] = './upload/'; //path folder
    //     // $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    //     $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
    //     $this->upload->initialize($config);
    //     if(!empty($_FILES['filefoto']['name'])){
 
    //         if ($this->upload->do_upload('filefoto')){
    //             $gbr = $this->upload->data();
    //             //Compress Image
    //             $config['image_library']='gd2';
    //             $config['source_image']='./assets/images/'.$gbr['file_name'];
    //             $config['create_thumb']= FALSE;
    //             $config['maintain_ratio']= FALSE;
    //             $config['quality']= '50%';
    //             // $config['width']= 600;
    //             // $config['height']= 400;
    //             $config['new_image']= './assets/images/'.$gbr['file_name'];
    //             $this->load->library('image_lib', $config);
    //             $this->image_lib->resize();
 
    //             $foto=$gbr['file_name'];
    //             $end_id=$this->input->post('end_id');
    //             $this->M_upload->simpan_upload($end_id,$foto);
    //             echo "Image berhasil diupload";
    //         } else{
    //             echo "Image gagal di upload";	
    //         }
                      
    //     }else{
    //         echo "Image yang diupload kosong";
    //     }
                 
    // }

    public function upload_foto(){
        
        $this->M_upload->save();

        // $this->load->view('v_upload');

    }
 
}