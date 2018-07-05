<?php
class Pregunta_model extends CI_Model{

    public function guardar_pregunta($opcion,$id_parrilla,$pregunta_esp,$pregunta_eng, $pregunta_cata) {
        $data = array('id_opcion_pregunta'=>$opcion,
                      'id_parrilla' =>$id_parrilla,
                      'pregunta_esp'=>$pregunta_esp,
                      'pregunta_eng'=>$pregunta_eng,
                      'pregunta_cata'=>$pregunta_cata);
        $this->db->insert('t_pregunta', $data);
    }
    public function buscar_ultima_pregunta(){
	      $this->db->select_max('id');
	    	$consulta=$this->db->get('t_pregunta',1);
	    	 if ($consulta->num_rows()>0) {
		        return $consulta;
		        }else{
		        return false;
		        }
    }
    public function guardar_respuesta($id_pregunta,$resp_4_1,$resp_4_1,$resp_4_1){
      $data = array('id_pregunta' =>$id_pregunta,
                    'respuesta_esp'=>$resp_4_1,
                    'respuesta_cata'=>$resp_4_1,
                    'respuesta_eng'=>$resp_4_1);
      $this->db->insert('t_respuesta', $data);
    }
    public function guardar_det_seguir($id_seguir,$red_social,$descripcion){
    	$data = array('id_seguir' =>$id_seguir,
    				  'id_tipo'=>$red_social,
                      'descripcion'=>$descripcion);
    	$this->db->insert('t_det_seguir', $data);

    }
    public function id_buscar_pregunta($id_parrilla){
      $this->db->where('id_parrilla', $id_parrilla);
      $consulta=$this->db->get('t_pregunta');
      if ($consulta->num_rows()>0) {
        return $consulta;
      }else{
        return false;
      }

    }
      public function buscar_pregunta_id($id_pregunta){
      $this->db->where('id', $id_pregunta);
      $consulta=$this->db->get('t_pregunta');
      if ($consulta->num_rows()>0) {
        return $consulta;
      }else{
        return false;
      }

    }
    public function buscar_respuesta_id_pregunta($id_pregunta){
      $this->db->select('t_respuesta.id_pregunta as id_pregunta, t_respuesta.id as id_respuesta, t_pregunta.id_opcion_pregunta as id_opcion_pregunta, t_pregunta.pregunta_esp as pregunta_esp,  t_pregunta.pregunta_cata as pregunta_cata,  t_pregunta.pregunta_eng as pregunta_eng, t_pregunta.id_parrilla as id_parrilla, t_respuesta.respuesta_esp as respuesta_esp,t_respuesta.respuesta_eng as respuesta_eng, t_respuesta.respuesta_cata as respuesta_cata');
      $this->db->join('t_pregunta', 't_respuesta.id_pregunta = t_pregunta.id', 'left');
      $this->db->where('t_respuesta.id_pregunta', $id_pregunta);
      $consulta=$this->db->get('t_respuesta');
      if ($consulta->num_rows()>0) {
          return $consulta;
            }else{
            return false;
            }
      }


      public function buscar_respuesta_id_pregunta_2($id_pregunta){
      $this->db->select('t_respuesta.id_pregunta as id_pregunta, t_respuesta.id as id_respuesta, t_pregunta.id_opcion_pregunta as id_opcion_pregunta, t_pregunta.pregunta_esp as pregunta_esp,  t_pregunta.pregunta_cata as pregunta_cata,  t_pregunta.pregunta_eng as pregunta_eng, t_pregunta.id_parrilla as id_parrilla, t_respuesta.respuesta_esp as respuesta_esp, t_respuesta.respuesta_eng as respuesta_eng, t_respuesta.respuesta_cata as respuesta_cata ');
      $this->db->join('t_pregunta', 't_respuesta.id_pregunta = t_pregunta.id', 'left');
      $this->db->where('t_respuesta.id_pregunta', $id_pregunta);
      $consulta=$this->db->get('t_respuesta');
      if ($consulta->num_rows()>0) {
          return $consulta;
            }else{
            return false;
            }
      }






    public function contar_respuesta($id_respuesta){
      $this->db->where('id_respuesta',$id_respuesta);
      $this->db->from('t_seleccionar_respuesta');
      return $this->db->count_all_results();
    }
}