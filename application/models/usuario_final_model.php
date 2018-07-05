<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_final_model extends CI_Model {

		function __construct()
		{
		parent::__construct();

		}
		public function get_login_facebook($login){
		$this->db->where('email', $login);
		$cliente=$this->db->get('t_cliente');
	     if ($cliente->num_rows()>0) {
	        return $cliente;
	        }else{
	        return false;
	        }
		}
		public function get_login_twitter($login){
		$this->db->where('email', $login);
		$cliente=$this->db->get('t_cliente');
	     if ($cliente->num_rows()>0) {
	        return $cliente;
	        }else{
	        return false;
	        }
		}
		public function get_like_facebook($usuario_data,$id_tipo_conexion,$id_organizacion){
		$this->db->where('id_cliente', $usuario_data);
		$this->db->where('id_tipo_conexion', $id_tipo_conexion);
		$this->db->where('id_establecimiento', $id_organizacion);
		$conexion=$this->db->get('t_conexion');
	     if ($conexion->num_rows()>0) {
	        return $conexion;
	        }else{
	        return false;
	        }
		}
		public function get_follow_twitter($usuario_data,$id_tipo_conexion,$id_organizacion){
		$this->db->where('id_cliente', $usuario_data);
		$this->db->where('id_tipo_conexion', $id_tipo_conexion);
		$this->db->where('id_establecimiento', $id_organizacion);
		$conexion=$this->db->get('t_conexion');
	     if ($conexion->num_rows()>0) {
	        return $conexion;
	        }else{
	        return false;
	        }
		}
		public function id_usuario($usuario){

			$this->db->where('usuario', $usuario);
			$query = $this->db->get('t_usuario');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}

		public function guardar_usuario_final($id_genero,$login,$nombre_apellido){
			$data = array('id_genero' =>$id_genero,
						  'email'=>$login,
						  'nombre'=>$nombre_apellido);
			$this->db->insert('t_cliente', $data);

		}
		public function guardar_usuario_final_registro($id_genero,$login,$nombre_apellido,$fecha_nac){
			$data = array('id_genero' =>$id_genero,
						  'email'=>$login,
						  'nombre'=>$nombre_apellido,
						  'fecha_nac'=>$fecha_nac);
			$this->db->insert('t_cliente', $data);

		}
		public function guardar_conexion_usuario($usuario_data,$id_establecimiento,$id_tipo_conexion,$id_equipo,$fecha,$hora){
			$data = array('id_cliente' =>$usuario_data,
						  'id_establecimiento'=>$id_establecimiento,
						  'id_tipo_conexion'=>$id_tipo_conexion,
						  'id_equipo'=>$id_equipo,
						  'fecha'=>$fecha,
						  'hora'=>$hora);
			$this->db->insert('t_conexion', $data);

		}
		public function buscar_usuarios(){
			$query = $this->db->get('t_usuario');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}


}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */