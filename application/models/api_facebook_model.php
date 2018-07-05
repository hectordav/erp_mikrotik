<?php
class Api_facebook_model extends CI_Model{
    public function get_api_equipo($id_equipo) {
     $this->db->where('id_equipo', $id_equipo);
     $consulta = $this->db->get('t_api');
        if ($consulta->num_rows()>0) {
            return $consulta;
            }else{
            return false;
            }
    }



}