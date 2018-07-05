<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Politica extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('usuario_model');
	}
	public function index()
	{
		redirect('politica/grilla');
	}
	public function grilla(){
			try {
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_horario');
				$crud->order_by('id','asc');
				$crud->set_subject('Horario');
				$crud->set_language('spanish');
				$crud->display_as('id','#');
				$crud->display_as('hora_i','Hora Inicio');
				$crud->display_as('hora_f','Hora Fin');
				$crud->columns('hora_i','hora_f');
				$crud->required_fields('id','hora_i','hora_f');
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('politica/politica');
				$this->load->view('../../assets/inc/menu_lateral_derecho');
				$this->load->view('../../assets/inc/footer_common',$output);
		}catch (Exception $e) {
		}

	}
}
