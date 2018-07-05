<?php
class Combo_model extends CI_Model{
    //put your code here

    public function get_agencia() {
        $this->db->order_by('descripcion', 'asc');
        $estados = $this->db->get('t_agencia');
        if($estados->num_rows() > 0){
            return $estados->result();
        }
    }
    public function get_corporacion() {
        $this->db->order_by('descripcion', 'asc');
        $estados = $this->db->get('t_corporacion');
        if($estados->num_rows() > 0){
            return $estados->result();
        }
    }


}