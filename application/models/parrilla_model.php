<?php
class Parrilla_model extends CI_Model{
    //put your code here

     public function guardar_parrilla($id_anunciante,$fecha_inicio,$fecha_final){
        $data = array('id_anunciante'=>$id_anunciante,
                      'fecha_i'=>$fecha_inicio,
                      'fecha_f'=>$fecha_final);
        $this->db->insert('t_parrilla', $data);
    }
    public function guardar_det_parrilla($id_parrilla,$id_anunciante,$id_tipo_anuncio,$id_equipo,$id_horario,$fecha_inicio,$fecha_final,$hora_i,$hora_f){
        $data = array('id_parrilla'=>$id_parrilla,
                      'id_anunciante'=>$id_anunciante,
                      'id_tipo_anuncio'=>$id_tipo_anuncio,
                      'id_equipo'=>$id_equipo,
                      'id_horario'=>$id_horario,
                      'fecha_inicio'=>$fecha_inicio,
                      'fecha_final'=>$fecha_final);
        $this->db->insert('t_det_parrilla', $data);
    }

    function get_parrilla($id_parrilla){
        $this->db->where('id', $id_parrilla);
        $parrilla=$this->db->get('t_parrilla', 1);
        if ($parrilla->num_rows()>0) {
        return $parrilla;
        }else{
        return false;
        }
    }
    function get_det_parrilla($id_parrilla){
        $this->db->where('id_parrilla', $id_parrilla);
        $this->db->group_by('id_tipo_anuncio');
        $det_parrilla=$this->db->get('t_det_parrilla');
        if ($det_parrilla->num_rows()>0) {
        return $det_parrilla;
        }else{
        return false;
        }
    }
     function get_parrilla_det_parrilla($id_det_parrilla){
        $this->db->where('id', $id_det_parrilla);
        $det_parrilla=$this->db->get('t_det_parrilla');
        if ($det_parrilla->num_rows()>0) {
        return $det_parrilla;
        }else{
        return false;
        }
    }
    public function get_ultima_parrilla(){
      $this->db->select_max('id');
      $consulta=$this->db->get('t_parrilla', 1);
       if ($consulta->num_rows()>0) {
        return $consulta;
        }else{
        return false;
        }
    }
    public function editar_parrilla($id_parrilla,$id_anunciante,$id_tipo_anuncio,$id_equipo,$id_horario,$fecha_inicio,$fecha_final){
        $data = array('id_anunciante'=>$id_anunciante,
                      'id_tipo_anuncio'=>$id_tipo_anuncio,
                      'id_equipo'=>$id_equipo,
                      'id_horario'=>$id_horario,
                      'fecha_inicio'=>$fecha_inicio,
                      'fecha_final'=>$fecha_final);
        $this->db->where('id', $id_parrilla);
        $this->db->update('t_parrilla', $data);
    }
    public function buscar_parrilla_prueba($id_anunciante){
      $this->db->select('t_parrilla.id as id_parrilla, t_det_parrilla.id_tipo_anuncio as tipo_anuncio');
      $this->db->join('t_det_parrilla', 't_det_parrilla.id_parrilla = t_parrilla.id', 'left');
      $this->db->where('t_parrilla.id_anunciante', $id_anunciante);
      $consulta=$this->db->get('t_parrilla',1);
       if ($consulta->num_rows()>0) {
        return $consulta;
        }else{
        return false;
        }
    }
    public function buscar_parrilla_fecha($id_equipo,$id_horario,$fecha){
      $this->db->select('t_det_parrilla.id as id_det_parrilla, t_det_parrilla.id_parrilla as id_parrilla, t_det_parrilla.id_anunciante as id_anunciante, t_det_parrilla.id_tipo_anuncio as tipo_anuncio, t_det_parrilla.id_equipo as id_equipo, t_anunciante.nombre as nombre_anunciante, t_anunciante.direccion as direccion_anunciante, t_anunciante.imagen as imagen_anunciante, t_det_parrilla.id_horario as id_horario_det_parrilla, t_det_parrilla.fecha_inicio as fecha_i_det_parrilla, t_det_parrilla.fecha_final as fecha_f_det_parrilla');
      $this->db->join('t_parrilla', 't_det_parrilla.id_parrilla = t_parrilla.id', 'left');
      $this->db->join('t_anunciante', 't_det_parrilla.id_anunciante = t_anunciante.id', 'left');
      $this->db->join('t_horario', 't_det_parrilla.id_horario = t_horario.id', 'left');
      $this->db->where('t_det_parrilla.id_equipo', $id_equipo);
      $this->db->where('t_det_parrilla.id_horario', $id_horario);
      $this->db->where('t_det_parrilla.fecha_inicio <=', $fecha);
      $this->db->where('t_det_parrilla.fecha_final >=', $fecha);
      $consulta=$this->db->get('t_det_parrilla',1);
      if ($consulta->num_rows()>0) {
        return $consulta;
      }else{
        return false;
      }
    }
    public function buscar_parrilla_fecha_3($equipo,$anuncio,$horario,$fecha_inicio,$fecha_final){
      $this->db->select('t_det_parrilla.id as id_det_parrilla, t_det_parrilla.id_parrilla as id_parrilla, t_det_parrilla.id_anunciante as id_anunciante, t_det_parrilla.id_tipo_anuncio as tipo_anuncio, t_det_parrilla.id_equipo as id_equipo, t_anunciante.nombre as nombre_anunciante, t_anunciante.direccion as direccion_anunciante, t_anunciante.imagen as imagen_anunciante, t_det_parrilla.id_horario as id_horario_det_parrilla, t_det_parrilla.fecha_inicio as fecha_i_det_parrilla, t_det_parrilla.fecha_final as fecha_f_det_parrilla');
      $this->db->join('t_parrilla', 't_det_parrilla.id_parrilla = t_parrilla.id', 'left');
      $this->db->join('t_anunciante', 't_det_parrilla.id_anunciante = t_anunciante.id', 'left');
      $this->db->join('t_horario', 't_det_parrilla.id_horario = t_horario.id', 'left');
      $this->db->where('t_det_parrilla.id_equipo', $equipo);
      $this->db->where('t_det_parrilla.id_horario', $horario);
       $this->db->where('t_det_parrilla.id_tipo_anuncio', $anuncio);
      $this->db->where('t_det_parrilla.fecha_inicio ', $fecha_inicio);
      $this->db->where('t_det_parrilla.fecha_final ', $fecha_final);
      $consulta=$this->db->get('t_det_parrilla',1);
      if ($consulta->num_rows()>0) {
        return $consulta;
      }else{
        return false;
      }
    }
   public function buscar_parrilla_fecha_2($id_equipo,$id_horario,$fecha,$id_tipo_anuncio_segment){
    $this->db->select('t_det_parrilla.id as id_det_parrilla, t_det_parrilla.id_parrilla as id_parrilla, t_det_parrilla.id_anunciante as id_anunciante, t_det_parrilla.id_tipo_anuncio as tipo_anuncio, t_det_parrilla.id_equipo as id_equipo, t_anunciante.nombre as nombre_anunciante, t_anunciante.direccion as direccion_anunciante, t_anunciante.imagen as imagen_anunciante, t_det_parrilla.id_horario as id_horario_det_parrilla, t_det_parrilla.fecha_inicio as fecha_i_det_parrilla, t_det_parrilla.fecha_final as fecha_f_det_parrilla');
      $this->db->join('t_parrilla', 't_det_parrilla.id_parrilla = t_parrilla.id', 'left');
      $this->db->join('t_anunciante', 't_det_parrilla.id_anunciante = t_anunciante.id', 'left');
      $this->db->join('t_horario', 't_det_parrilla.id_horario = t_horario.id', 'left');
      $this->db->where('t_det_parrilla.id_tipo_anuncio >', $id_tipo_anuncio_segment);
      $this->db->where('t_det_parrilla.id_equipo', $id_equipo);
      $this->db->where('t_det_parrilla.id_horario', $id_horario);
      $this->db->where('t_det_parrilla.fecha_inicio <=', $fecha);
      $this->db->where('t_det_parrilla.fecha_final >=', $fecha);
      $consulta=$this->db->get('t_det_parrilla',1);
      if ($consulta->num_rows()>0) {
        return $consulta;
      }else{
        return false;
      }

   }
   public function eliminar_parrilla($id_parrilla){
     $this->db->where('id', $id_parrilla);
     $this->db->delete('t_parrilla');
   }
    public function buscar_tipo_anuncio_parrilla($id_parrilla){
     $this->db->select('id_tipo_anuncio');
     $this->db->where('id_parrilla', $id_parrilla);
     $this->db->delete('t_det_parrilla');
     $consulta=$this->db->get('t_det_parrilla',1);
      if ($consulta->num_rows()>0) {
        return $consulta;
      }else{
        return false;
      }
   }
}