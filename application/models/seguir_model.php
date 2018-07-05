<?php
class Seguir_model extends CI_Model{
    //put your code here


    public function guardar_seguir($id_parrilla) {
        $data = array('id_parrilla' =>$id_parrilla);
        $this->db->insert('t_seguir', $data);
    }
    public function buscar_ultimo_seguir(){
	      $this->db->select_max('id');
	    	$consulta=$this->db->get('t_seguir',1);
	    	 if ($consulta->num_rows()>0) {
		        return $consulta;
		        }else{
		        return false;
		        }
    }
    public function buscar_seguir_model($id_parrilla){
        $this->db->select('t_seguir.id as id_seguir, t_det_seguir.id_tipo as id_tipo, t_det_seguir.descripcion as descripcion_det_seguir');
        $this->db->join('t_det_seguir', 't_det_seguir.id_seguir= t_seguir.id', 'left');
        $this->db->where('t_seguir.id_parrilla', $id_parrilla);
        $consulta=$this->db->get('t_seguir');
             if ($consulta->num_rows()>0) {
                return $consulta;
                }else{
                return false;
                }
    }
    public function guardar_det_seguir($id_seguir,$red_social,$descripcion){
    	   $data = array('id_seguir' =>$id_seguir,
                         'id_tipo'=>$red_social,
                         'descripcion'=>$descripcion);
    	$this->db->insert('t_det_seguir', $data);

    }




}