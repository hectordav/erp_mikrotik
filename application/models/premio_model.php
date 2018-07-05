<?php
class Premio_model extends CI_Model{
    //put your code here


     //*************************json encode***************************************
    public function get_premio_id($id_premio) {
        $this->db->where('id', $id_premio);
        $consulta = $this->db->get('t_premio',1);
        if($consulta->num_rows() > 0){
            return $consulta;
        }else{
            return false;
        }
    }
    public function get_premio_diferente($id_premio) {
        $this->db->where('id <>', $id_premio);
        $consulta = $this->db->get('t_premio',4);
        if($consulta->num_rows() > 0){
            return $consulta;
        }else{
            return false;
        }
    }
     public function get_todos_premios() {
        $this->db->order_by('id', 'desc');
        $this->db->where('cantidad >','1');
        $consulta = $this->db->get('t_premio');
        if($consulta->num_rows() > 0){
            return $consulta;
        }else{
            return false;
        }
    }
    public function get_ultimo_premio(){
      $this->db->select_max('id');
      $consulta=$this->db->get('t_premio');
      if ($consulta->num_rows()>0) {
        return $consulta;
        }else{
        return false;
        }
    }
    /***************************************************************************/
    public function guardar_premio($id_anunciante, $codigo, $nombre, $descripcion, $puntaje, $cantidad, $imagen){
        $data = array('id_anunciante' =>$id_anunciante,
                      'codigo'=>$codigo,
                      'nombre'=>$nombre,
                      'descripcion'=>$descripcion,
                      'puntaje'=>$puntaje ,
                      'cantidad'=>$cantidad,
                      'imagen'=>$imagen);
        $this->db->insert('t_premio', $data);
    }

    public function actualizar_premio($id_premio, $id_anunciante, $codigo, $nombre, $descripcion, $puntaje, $cantidad, $archivo){
        $this->db->where('id', $id_premio);
        $data = array('id_anunciante' =>$id_anunciante,
                      'codigo'=>$codigo,
                      'nombre'=>$nombre,
                      'descripcion'=>$descripcion,
                      'puntaje'=>$puntaje ,
                      'cantidad'=>$cantidad,
                      'imagen'=>$archivo);
        $this->db->update('t_premio', $data);
    }
    public function actualizar_cantidad_premio($id_premio,$cantidad){
        $this->db->where('id', $id_premio);
        $data = array('cantidad'=>$cantidad);
        $this->db->update('t_premio', $data);
    }



}