<?php
class Anunciante_model extends CI_Model{
    //put your code here

    //*************************json encode***************************************
    public function get_anunciante() {
        $this->db->order_by('nombre', 'asc');
        $consulta = $this->db->get('t_anunciante');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
     public function contar_anunciante(){
            $this->db->from('t_anunciante');
            return $this->db->count_all_results();
    }
    /***************************************************************************/

    public function get_anunciante_id($id_anunciante) {
        $this->db->where('id', $id_anunciante);
        $consulta = $this->db->get('t_anunciante',1);
        if($consulta->num_rows() > 0){
            return $consulta;
        }else{
            return false;
        }
    }

    public function guardar_anunciante($nombre,$direccion,$logo){
        $data = array('nombre' =>$nombre,
                      'direccion'=>$direccion,
                      'imagen'=>$logo );
        $this->db->insert('t_anunciante', $data);
    }


}