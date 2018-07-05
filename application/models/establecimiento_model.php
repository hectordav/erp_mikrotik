<?php
class Establecimiento_model extends CI_Model{
    //put your code here

    //**************************json encode***************************************
    public function get_establecimiento() {
        $this->db->order_by('nombre', 'asc');
        $consulta = $this->db->get('t_establecimiento');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /******************************************************************************/
    public function guardar_establecimiento($nombre,$direccion,$persona_contacto,$telf,$comentario,$mi_archivo){
        $data = array('nombre'=>$nombre,
                      'direccion'=>$direccion,
                      'persona_contacto'=>$persona_contacto,
                      'telf'=>$telf,
                      'comentario'=>$comentario,
                      'imagen'=>$mi_archivo);
        $this->db->insert('t_establecimiento', $data);
    }

    public function get_app_img_establecimiento_id($id_establecimiento){
        $this->db->select('t_establecimiento.id as id_establecimiento, t_establecimiento.imagen as img_establecimiento, t_api.appid as app_id_face, t_api.secret as secret_face');
        $this->db->join('t_establecimiento', 't_api.id_establecimiento = t_establecimiento.id', 'left');
        $this->db->where('id_establecimiento', $id_establecimiento);
        $consulta=$this->db->get('t_api',1);
         if ($consulta->num_rows()>0) {
            return $consulta;
            }else{
            return false;
            }


    }


}