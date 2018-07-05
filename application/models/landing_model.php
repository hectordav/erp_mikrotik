<?php
class Landing_model extends CI_Model{
    //put your code here

   public function guardar_landing($id_parrilla,$url_landing){
       $data = array('id_parrilla' =>$id_parrilla,
                     'url'=>$url_landing );
       $this->db->insert('t_landing_page', $data);
   }

   public function buscar_landing($id_parrilla){
   	$this->db->where('id_parrilla', $id_parrilla);
   	$consulta=$this->db->get('t_landing_page',1);
     if ($consulta->num_rows()>0) {
        return $consulta;
        }else{
        return false;
        }

   }


}