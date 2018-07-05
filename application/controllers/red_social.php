<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Red_social extends CI_Controller {
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
		redirect('red_social/grilla');
	}
	public function grilla(){
			try {
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_tipo_api');
				$crud->set_subject('Red Social');
				$crud->set_language('spanish');
				$crud->display_as('tipo','Tipo');
				$crud->required_fields('tipo');
				$crud->columns('tipo');
				/*$crud->unset_delete();*/
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('tipo_api/tipo_api',$output);
				$this->load->view('../../assets/inc/menu_lateral_derecho');
				$this->load->view('../../assets/inc/footer_common');
		}catch (Exception $e) {
		}
	}
}
