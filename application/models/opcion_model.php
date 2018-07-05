<?php
class Opcion_model extends CI_Model{
    //put your code here

    //**************************json encode***************************************
    public function get_opcion() {
        $consulta = $this->db->get('t_opcion_equipo');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /******************************************************************************/


}