<?php class Modelo_model extends CI_Model{
    //put your code here
    public function get_modelo($id_modelo){
        $this->db->where('id', $id_modelo);
        $query=$this->db->get('t_modelo');
        if ($query->num_rows()>0) {
            return $query;
            }else{
            return false;
            }
    }
      //**************************json encode***************************************
    public function get_modelo_id($id_marca) {
        $this->db->where('id_marca', $id_marca);
        $this->db->order_by('descripcion', 'asc');
        $query = $this->db->get('t_modelo');
        if($query->num_rows() > 0){
            return $query->result();
        }
    }
    /******************************************************************************/

    public function guardar_modelo($id_marca, $modelo) {
       $data = array('id_marca' =>$id_marca ,
                     'descripcion'=>$modelo);
        $this->db->insert('t_modelo', $data);
    }
    public function actualizar_modelo($id_modelo,$id_marca, $modelo) {
       $data = array('id_marca' =>$id_marca ,
                     'descripcion'=>$modelo);
       $this->db->where('id', $id_modelo);
        $this->db->update('t_modelo', $data);
    }

}