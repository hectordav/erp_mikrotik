<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Conexion extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->library('grocery_crud');
			$this->load->model('usuario_model');
	}
	public function index(){
		redirect('conexion/grilla');
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
			$crud->set_table('t_conexion');
			$crud->order_by('id','desc');
			$crud->set_subject('Conexion');
			$crud->set_language('spanish');
			$crud->set_relation('id_cliente','t_cliente','nombre');
			$crud->set_relation('id_establecimiento','t_establecimiento','nombre');
			$crud->set_relation('id_tipo_conexion','t_tipo_conexion','descripcion');
			$crud->set_relation('id_equipo','t_equipo','descripcion');
			$crud->display_as('id','#');
			$crud->display_as('id_cliente','Usuario');
			$crud->display_as('id_establecimiento','Establ');
			$crud->display_as('id_tipo_conexion','Tipo de Conexion');
			$crud->display_as('id_equipo','Equipo');
			$crud->display_as('fecha','Fecha');
			$crud->display_as('hora','Hora');
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$output = $crud->render();
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('conexion/conexion',$output);
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
/********************/
			}
		}else{
			redirect('acceso_usuario','refresh');
		}
		}catch (Exception $e) {
		}
	}
}
