<?php
class Equipo_model extends CI_Model{
    //put your code here

    public function guardar_equipo($id_opcion,$id_tipo,$id_marca,$id_modelo,$id_establecimiento, $id_zona,$descripcion, $mac,$serial,$direccion,$lat,$lng,$ssid,$cloud,$subida,$bajada,$dt_fecha){
        $data = array('id_opcion_equipo'=>$id_opcion,
                      'id_modelo' =>$id_modelo,
                      'id_establecimiento' =>$id_establecimiento,
                      'id_zona'=>$id_zona,
                      'descripcion' =>$descripcion,
                      'mac' =>$mac,
                      'num_serie' =>$serial,
                      'direccion' =>$direccion,
                      'lat' =>$lat,
                      'long' =>$lng,
                      'ssid' =>$ssid,
                      'cloud' =>$cloud,
                      'subida' =>$subida,
                      'bajada' =>$bajada,
                      'fecha_creacion' =>$dt_fecha);
          $this->db->insert('t_equipo', $data);
    }
    public function contar_equipo(){
            $this->db->from('t_equipo');
            return $this->db->count_all_results();
    }
    public function get_lat_long_equipo(){
    $consulta = $this->db->get('t_equipo');
    if($consulta->num_rows()>0)
    {
      return $consulta->result();
    }
  }
    public function update_equipo($id_equipo,$id_tipo,$id_marca,$id_modelo,$id_establecimiento, $id_zona,$descripcion,$mac,$serial,$direccion,$lat,$lng,$ssid,$cloud,$subida,$bajada,$dt_fecha){
        $data = array('id_modelo' =>$id_modelo,
                      'id_establecimiento' =>$id_establecimiento,
                      'id_zona'=>$id_zona,
                      'descripcion' =>$descripcion,
                      'mac' =>$mac,
                      'num_serie' =>$serial,
                      'direccion' =>$direccion,
                      'lat' =>$lat,
                      'long' =>$lng,
                      'ssid' =>$ssid,
                      'cloud' =>$cloud,
                      'subida' =>$subida,
                      'bajada' =>$bajada,
                      'fecha_creacion' =>$dt_fecha);
        $this->db->where('id', $id_equipo);
        $this->db->update('t_equipo', $data);
    }

    public function get_equipo($id_equipo){
      $this->db->where('id', $id_equipo);
      $equipo=$this->db->get('t_equipo',1);
       if ($equipo->num_rows()>0) {
        return $equipo;
        }else{
        return false;
        }
    }
  public function get_equipo_mac($mac) {
    /*aqui busca el id del equipo con la mac y la opcion equipo esté activo*/
        $this->db->where('mac', $mac);
        $this->db->where('id_opcion_equipo',1);
        $query = $this->db->get('t_equipo',1);
        if ($query->num_rows()>0) {
            return $query;
            }else{
            return false;
            }
    }
   //**************************json encode***************************************
    public function get_equipo_2() {
        $this->db->order_by('descripcion', 'asc');
        $consulta = $this->db->get('t_equipo');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /******************************************************************************/
      //**************************json encode***************************************
    public function get_equipo_id($id_zona) {
        $id_tipo=1;
        $this->db->select('t_equipo.id as equipo_id, t_equipo.descripcion equipo_descripcion, t_equipo.direccion as equipo_direccion');
        $this->db->join('t_modelo', 't_equipo.id_modelo = t_modelo.id', 'left');
        $this->db->join('t_marca', 't_modelo.id_marca = t_marca.id', 'left');
        $this->db->join('t_tipo', 't_marca.id_tipo = t_tipo.id', 'left');
        $this->db->where('t_equipo.id_zona', $id_zona);
        $this->db->where('t_tipo.id', $id_tipo);
        $consulta = $this->db->get('t_equipo');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /******************************************************************************/
    public function actualizar_opcion_equipo($id_equipo, $id_opcion){
      $data = array('id_opcion_equipo' =>$id_opcion);
      $this->db->where('id', $id_equipo);
      $this->db->update('t_equipo', $data);
    }

}