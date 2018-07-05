<?php
class Nivel_model extends CI_Model{
    //put your code here


    public function get_nivel() {
        $consulta=$this->db->get('t_nivel');
         if ($consulta->num_rows()>0) {
            return $consulta;
            }else{
            return false;
            }
    }
}