<?php
class Video_model extends CI_Model{

    public function guardar_video($id_parrilla,$video_1_espa,$video_2_espa,$video_1_cata,$video_2_cata,$video_1_eng,$video_2_eng){
        $data = array('id_parrilla' =>$id_parrilla,
                      'video_webm_espa'=>$video_1_espa,
                      'video_mp4_espa'=>$video_2_espa,
                      'video_webm_cata'=>$video_1_cata,
                      'video_mp4_cata'=>$video_2_cata,
                      'video_webm_eng'=>$video_1_eng,
                      'video_mp4_eng'=>$video_2_eng);
        $this->db->insert('t_video', $data);
    }

    public function get_video_id($id_parrilla){
      $this->db->where('id_parrilla', $id_parrilla);
      $consulta=$this->db->get('t_video',1);
      if ($consulta->num_rows()>0) {
        return $consulta;
      }else{
        return false;
      }
    }


}