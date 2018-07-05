<?php
class Comparte_model extends CI_Model{

    public function guardar_comparte($id_parrilla,$comparte_espa,$comparte_cata,$comparte_eng) {
        $data = array('id_parrilla' =>$id_parrilla,
                      'info_comparte_espa'=>$comparte_espa,
                      'info_comparte_cata'=>$comparte_cata,
                      'info_comparte_eng'=>$comparte_eng
                      );
        $this->db->insert('t_comparte', $data);
    }
    public function buscar_compartir($id_parrilla){
    	$this->db->where('id_parrilla', $id_parrilla);
    	$consulta=$this->db->get('t_comparte', 1);
    		if ($consulta->num_rows()>0) {
        	return $consulta;
        	}else{
        	return false;
       	 	}
    }
    public function buscar_comparte_id($id_comparte){
    	$this->db->where('id', $id_comparte);
    	$consulta=$this->db->get('t_comparte', 1);
    		if ($consulta->num_rows()>0) {
        	return $consulta;
        	}else{
        	return false;
       	 	}
    }



}