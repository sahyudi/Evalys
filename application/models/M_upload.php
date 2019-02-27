<?php
class M_upload extends CI_Model{
 
    function simpan_upload($end_id,$foto){
        $hasil=$this->db->query("INSERT INTO tb_tmpr(end_id,name_file) VALUES ('".$end_id."','".$foto."')");
        return $hasil;
    }

    public function save(){
        $end_id = $this->input->post('end_id');

        $path = FCPATH.'/upload/'. $_FILES["attachment"]['name'];
        $file_name = $_FILES["attachment"]['name'];
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
     
}