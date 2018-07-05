<?php
class Tipo_model extends CI_Model{
    //put your code here

    //**************************json encode***************************************
    public function get_tipo() {
        $this->db->order_by('descripcion', 'asc');
        $consulta = $this->db->get('t_tipo');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /******************************************************************************/
    //**************************json encode***************************************
    public function get_marca($id_tipo) {
        $this->db->where('id_tipo', $id_tipo);
        $this->db->order_by('descripcion', 'asc');
        $marca = $this->db->get('t_marca');
        if($marca->num_rows() > 0){
            return $marca->result();
        }
    }
    /******************************************************************************/
     //**************************json encode***************************************
    public function get_modelo($id_marca) {
        $this->db->where('id_marca', $id_marca);
        $this->db->order_by('descripcion', 'asc');
        $modelo = $this->db->get('t_modelo');
        if($modelo->num_rows() > 0){
            return $modelo->result();
        }
    }
    /******************************************************************************/


}