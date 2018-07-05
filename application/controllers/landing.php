<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Landing extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
	}
	public function index()
	{
		redirect('landing/grilla');
	}
	public function grilla(){
			try {
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_marca');
				$crud->order_by('descripcion','asc');
				$crud->set_relation('id_tipo','t_tipo','descripcion');
				$crud->set_subject('Marca');
				$crud->set_language('spanish');
				$crud->display_as('id','#');
				$crud->display_as('id_tipo', 'Tipo');
				$crud->display_as('descripcion','Marca');
				$crud->required_fields('id','id_tipo','descripcion');
				$crud->columns('id','id_tipo','descripcion');
				/*$crud->unset_delete();*/
				$output = $crud->render();
				$this->load->view('acceso_usuario/landing_page');
		}catch (Exception $e) {
		}
	}
}
