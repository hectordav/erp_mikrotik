<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente extends CI_Controller {
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
		redirect('cliente/grilla');
	}
	public function grilla(){
			try {
		if ($this->session->userdata('logueado')) {
			$data = array('id_usuario' =>$this->session->userdata('id'),
				'usuario'=>$this->session->userdata('usuario'),
				'id_nivel'=>$this->session->userdata('id_nivel'),
				'puntaje'=>$this->session->userdata('puntaje'),
				'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
			$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_cliente');
				$crud->set_relation('id_genero','t_genero','descripcion');
				$crud->set_subject('Cliente');
				$crud->set_language('spanish');
				$crud->order_by('id','desc');
				$crud->display_as('id','#');
				$crud->display_as('email', 'Correo');
				$crud->display_as('nombre','Nombre');
				$crud->display_as('edad','Edad');
				$crud->display_as('id_genero','Sexo');
				$crud->required_fields('email', 'nombre', 'edad', 'id_genero');
				$crud->columns('email', 'nombre', 'edad', 'id_genero');
				/*$crud->unset_delete();*/
				$output = $crud->render();
		if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('cliente/cliente',$output);
			$this->load->view('../../assets/inc/menu_lateral_derecho');
			$this->load->view('../../assets/inc/footer_common');
			}elseif($data['id_nivel']==3 ||$data['id_nivel']==4){
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral_lvl_3',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('acceso_restringido/acceso_restringido');
			$this->load->view('../../assets/inc/menu_lateral_derecho');
			$this->load->view('../../assets/inc/footer_common',$output);
			}elseif($data['id_nivel']==5){
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral_lvl_5',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('acceso_restringido/acceso_restringido',$output);
			$this->load->view('../../assets/inc/menu_lateral_derecho');
			$this->load->view('../../assets/inc/footer_common',$output);
		}
		}else{
			redirect('acceso_usuario','refresh');
		}
		}catch (Exception $e) {
		}
	}
}
