<?php
class Tipo_api_model extends CI_Model{

    public function get_tipo_api() {
     $consulta = $this->db->get('t_tipo_api');
        if ($consulta->num_rows()>0) {
            return $consulta;
            }else{
            return false;
            }
    }
}