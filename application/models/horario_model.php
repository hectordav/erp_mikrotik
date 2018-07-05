<?php
class Horario_model extends CI_Model{
    //put your code here

    //************************json encode***************************************
    public function get_horario() {
        $consulta = $this->db->get('t_horario');
        if($consulta->num_rows() > 0){
            return $consulta->result();
        }
    }
    /***************************************************************************/
    public function get_horario_id($horario){
    	$this->db->where('id', $horario);
    	$consulta=$this->db->get('t_horario');
    	if ($consulta->num_rows()>0) {
    		return $consulta;
    	}else{
    		return false;

    	}
    }
    public function get_horario_id_hora($horario){
    	$this->db->where('hora_i <=', $horario);
    	$this->db->where('hora_f >=', $horario);
    	$consulta=$this->db->get('t_horario');
    	if ($consulta->num_rows()>0) {
    		return $consulta;
    	}else{
    		return false;

    	}
    }

}