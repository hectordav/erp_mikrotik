<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Establecimiento extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('establecimiento_model');
			$this->load->model('usuario_model');
	}
	public function index()
	{
		redirect('establecimiento/grilla');
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
				$crud->set_table('t_establecimiento');
				$crud->set_subject('Establecimiento');
				$crud->set_language('spanish');
				$crud->display_as('id','#');
				$crud->display_as('nombre', 'Nombre');
				$crud->display_as('direccion','Direccion');
				$crud->display_as('persona_contacto','Contacto');
				$crud->display_as('telf','Telf');
				$crud->display_as('comentario','Comentario');
				$crud->required_fields('nombre','direccion','persona_contacto','telf','comentario');
				$crud->columns('nombre','direccion','persona_contacto','telf','comentario');
				/*$crud->unset_delete();*/
				$output = $crud->render();
				$state = $crud->getState();
				if($state == 'add'){
					 redirect('establecimiento/add');
				}
		if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('establecimiento/establecimiento',$output);
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
		public function add(){
			if ($this->session->userdata('logueado')) {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_establecimiento');
			$crud->set_subject('Establecimiento');
			$output = $crud->render();
if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('establecimiento/add');
			$this->load->view('../../assets/script/script_combo');
			$this->load->view('../../assets/inc/footer_common_add',$output);
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
	}
	public function guardar_establecimiento(){
		if ($this->session->userdata('logueado')) {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$nombre=$this->input->post('txt_nombre');
		$direccion=$this->input->post('txt_direccion');
		$persona_contacto=$this->input->post('txt_persona_contacto');
		$telf=$this->input->post('txt_telf');
		$comentario=$this->input->post('txt_observaciones');
		$mi_archivo = 'mi_archivo';
		$config['upload_path'] = "./uploads/";
		$config['allowed_types'] = '*';
		$config['remove_spaces']=TRUE;
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($mi_archivo)) {

			$data= $this->upload->data();
			$archivo=$data['file_name'];
		}else{
			$archivo=null;
		}
			$this->establecimiento_model->guardar_establecimiento($nombre,$direccion,$persona_contacto,$telf,$comentario,$archivo);
		redirect('establecimiento/grilla');
/********************/

			}else{
				redirect('acceso_usuario','refresh');
			}
	}
}
