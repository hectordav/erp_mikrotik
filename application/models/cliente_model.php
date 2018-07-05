<?php
class Cliente_model extends CI_Model{
    //put your code here

    public function contar_cliente_reg(){
        $this->db->from('t_cliente');
        return $this->db->count_all_results();
    }
    /*public function contar_puntaje_conexion_cliente($id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $this->db->from('t_conexion');
        return $this->db->count_all_results();
    }*/
    public function buscar_cliente_mail($correo){
    	$this->db->where('email', $correo);
    	$consulta=$this->db->get('t_cliente', 1);
    	 if ($consulta->num_rows()>0) {
		        return $consulta;
		        }else{
		        return false;
		        }
    }
    public function buscar_id_cliente(){
        $consulta=$this->db->get('t_cliente');
        if ($consulta->num_rows()>0) {
                return $consulta;
                }else{
                return false;
                }
    }


}