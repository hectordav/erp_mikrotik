<?php
class Zona_model extends CI_Model{
    //put your code here

    //**************************json encode***************************************
    public function get_zona() {
        $this->db->order_by('descripcion', 'asc');
        $consulta = $this->db->get('t_zona');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /******************************************************************************/
     //**************************json encode***************************************
    public function get_zona_id($id_ciudad) {
        $this->db->order_by('descripcion', 'asc');
        $this->db->where('id_ciudad', $id_ciudad);
        $consulta = $this->db->get('t_zona');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /******************************************************************************/


}