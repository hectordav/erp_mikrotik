<?php
class Pregunta_respuesta_model extends CI_Model{

    public function guardar_respuesta($id_pregunta,$respuesta) {
        $data = array('id_pregunta'=>$id_pregunta,
                      'id_respuesta' =>$respuesta);
        $this->db->insert('t_seleccionar_respuesta', $data);
    }

}