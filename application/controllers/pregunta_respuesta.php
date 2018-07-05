<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pregunta_respuesta extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('pregunta_respuesta_model');
			$this->load->model('usuario_model');
	}

	public function guardar_respuesta(){
		try {
		$id_pregunta=$this->input->post('txt_id_pregunta', TRUE);
		$id_parrilla=$this->input->post('txt_id_parrilla', TRUE);
		$id_tipo_anuncio_segment['tipo_anuncio_seg']=4;
		$this->session->set_userdata($id_tipo_anuncio_segment);
		$respuesta=$this->input->post('respuesta', TRUE);
		$this->pregunta_respuesta_model->guardar_respuesta($id_pregunta,$respuesta);
		redirect('login/busca_nueva_parrilla');
			} catch (Exception $e) {
		}
	}
	}
