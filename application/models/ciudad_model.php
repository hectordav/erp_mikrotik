<?php
class Ciudad_model extends CI_Model{
    //put your code here

    //**************************json encode***************************************
    public function get_ciudad() {
        $this->db->order_by('ciudad', 'asc');
        $consulta = $this->db->get('t_ciudad');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /******************************************************************************/


}