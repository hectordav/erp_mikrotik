<?php
class Tipo_anuncio_model extends CI_Model{
    //put your code here

    //**************************json encode***************************************
    public function get_tipo_anuncio() {
        $this->db->order_by('id', 'asc');
        $consulta = $this->db->get('t_tipo_anuncio');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /******************************************************************************/


}