<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

		function __construct()
		{
		parent::__construct();

		}
		public function login($login, $clave){
			$this->db->select('id, id_nivel, usuario');
			$this->db->from('t_usuario');
			$this->db->where('login', $login);
			$this->db->where('clave', $clave);
			$consulta = $this->db->get();
			$resultado = $consulta->row();
			return $resultado;
		}
		public function buscar_datos_usuario($id_usuario){
			$this->db->select('t_usuario_perfil.id as id_det_usuario, t_usuario.usuario as nombre_usuario, t_usuario_perfil.descripcion as descripcion,t_usuario_perfil.sobre_mi as sobre_mi,t_usuario_perfil.imagen as imagen, t_usuario_perfil.puntaje as puntaje');
			$this->db->join('t_usuario_perfil', 't_usuario_perfil.id_usuario = t_usuario.id', 'left');
			$this->db->where('t_usuario_perfil.id_usuario', $id_usuario);
			$consulta=$this->db->get('t_usuario',1);
			if ($consulta->num_rows()>0) {
				return $consulta;
				}else{
				return false;
				}
		}
		public function actualizar_puntaje_usuario($id_det_usuario, $puntaje){
			$this->db->where('id', $id_det_usuario);
			$data['puntaje']=$puntaje;
			$this->db->update('t_usuario_perfil', $data);
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
		public function id_cliente_usuario($id_usuario){
			$this->db->where('id', $id_usuario);
			$query = $this->db->get('t_usuario',1);
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
		public function buscar_usuarios(){
			$query = $this->db->get('t_usuario');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}

		public function buscar_ultimo_usuario(){
			$this->db->select_max('id');
			$consulta=$this->db->get('t_usuario');
			if ($consulta->num_rows()>0) {
				return $consulta;
				}else{
				return false;
				}
		}

		public function guardar_usuario_final($id_usuario_2,$id_nivel,$nombre,$login,$clave){
			$data = array('id_cliente' =>$id_usuario_2 ,
				'id_nivel'=>$id_nivel,
				'usuario'=>$nombre,
				'login'=>$login,
				'clave'=>$clave );
			$this->db->insert('t_usuario', $data);

		}
		public function guardar_usuario_1($id_nivel,$nombre,$login,$clave){
			$data = array('id_nivel'=>$id_nivel,
						  'usuario'=>$nombre,
						  'login'=>$login,
						  'clave'=>$clave );
			$this->db->insert('t_usuario', $data);
		}
		public function guardar_perfil_usuario($id_usuario_3,$descripcion,$sobre_mi,$imagen,$puntaje){
			$data = array('id_usuario' =>$id_usuario_3 ,
			'imagen'=>$imagen,
			'descripcion'=>$descripcion,
			'sobre_mi'=>$sobre_mi,
			'puntaje'=>$puntaje);
			$this->db->insert('t_usuario_perfil', $data);
	}


}
