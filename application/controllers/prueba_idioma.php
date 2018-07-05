<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Prueba_idioma extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
	}
	public function index()
	{
		redirect('prueba_idioma/grilla');
	}
	public function grilla(){
			try {
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_api');
				$crud->set_relation('id_tipo_api','t_tipo_api','tipo');
				$crud->set_relation('id_establecimiento','t_establecimiento','nombre');
				$crud->set_subject('Api');
				$crud->set_language('spanish');
				$crud->display_as('id_tipo_api','Api');
				$crud->display_as('id_establecimiento','Est.');
				$crud->display_as('appid','AppId');
				$crud->display_as('secret','Secret');
				$crud->required_fields('id_tipo_api','id_establecimiento', 'id_establecimiento', 'appid', 'secret');
				$crud->columns('id_establecimiento', 'appid', 'secret');
				/*$crud->unset_delete();*/
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral');
				$this->load->view('../../assets/inc/menu_superior');
				$this->load->view('prueba_idioma/prueba_idioma');
				$this->load->view('../../assets/inc/menu_lateral_derecho');
				$this->load->view('../../assets/inc/footer_common');
		}catch (Exception $e) {
		}
	}
}
