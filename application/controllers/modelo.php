<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modelo extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('tipo_model');
			$this->load->model('modelo_model');
			$this->load->model('establecimiento_model');
			$this->load->model('usuario_model');
	}
	public function index()
	{
			redirect('modelo/grilla');
	}
	public function grilla()
	{
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
		$crud->set_table('t_modelo');
		$crud->set_subject('modelo	');
		$crud->set_relation('id_marca','t_marca','descripcion');
		$crud->set_language('spanish');
		$crud->display_as('id_marca','Marca');
		$crud->display_as('descripcion','Modelo');
		$crud->columns('id_marca','descripcion');
		$crud->required_fields('id_marca','descripcion');
		$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'id_primaria'));
		$crud->unset_edit();
		$output = $crud->render();
		$state = $crud->getState();
		if($state == 'add')
		{
			 redirect('modelo/add');
		}
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('modelo/modelo',$output );
				$this->load->view('../../assets/inc/footer_common',$output);
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
	#***************llena el combo de la marca****************
	public function fill_marca() {
         $id_tipo = $this->input->post('id_tipo');
        if($id_tipo){
            $marca = $this->tipo_model->get_marca($id_tipo);
            echo '<option value="0">Seleccione Marca</option>';
            foreach($marca as $fila){
                echo '<option value="'. $fila->id .'">'. $fila->descripcion.'</option>';
            }
        }  else {
            echo 'sin nada';
        }
    }
  /***************************llena el combo de modelo************************************/
    public function fill_modelo() {
         $id_marca = $this->input->post('id_marca');
        if($id_marca){
            $modelo = $this->tipo_model->get_modelo($id_marca);
            echo '<option value="0">Seleccione Modelo</option>';
            foreach($modelo as $fila){
                echo '<option value="'. $fila->id .'">'. $fila->descripcion.'</option>';
            }
        }  else {
            echo '<option value="0">Sin Resultados</option>';
        }
    }
    /**********************************************************************************/
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
				$crud->set_table('t_marca');
				$crud->set_subject('Marca');
				$output = $crud->render();
				$data_tipo['tipo']=$this->tipo_model->get_tipo();
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('modelo/add',$data_tipo);
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
	 public function id_primaria($primary_key , $row){
			return site_url('modelo/edit').'/'.$row->id;
		}
		public function edit(){
		try {
		$id_modelo = $this->uri->segment(3);
		if (!$id_modelo) {
			redirect('principal','refresh');
		}
		if ($this->session->userdata('logueado')) {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
		$data_modelo = array('modelo' =>$this->modelo_model->get_modelo($id_modelo),
		 'tipo'=>$this->tipo_model->get_tipo());
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_marca');
				$crud->set_subject('Marca');
				$output = $crud->render();
		if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('modelo/edit',$data_modelo);
				$this->load->view('../../assets/script/script_combo');
				$this->load->view('../../assets/inc/footer_common_add',$output);
			}elseif($data['id_nivel']==3 ||$data['id_nivel']==4){
			redirect('principal','refresh');
			}elseif($data['id_nivel']==5){
				redirect('principal','refresh');
			}
			}else{
				redirect('acceso_usuario','refresh');

			}
		} catch (Exception $e) {
		}
	}
	public function guardar_modelo(){
			if ($this->session->userdata('logueado')) {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
			$id_marca=$this->input->post('id_marca');
			$modelo=$this->input->post('txt_modelo');
			$this->modelo_model->guardar_modelo($id_marca, $modelo);
			$this->session->set_flashdata('alerta', 'Registro Guardado Correctamente');
			redirect('modelo/grilla','refresh');
			}elseif($data['id_nivel']==3 ||$data['id_nivel']==4){
			redirect('principal','refresh');
			}elseif($data['id_nivel']==5){
				redirect('principal','refresh');
			}
			}else{
				redirect('acceso_usuario','refresh');
			}
	}
	public function actualizar_modelo(){
		if ($this->session->userdata('logueado')) {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
		$id_modelo=$this->input->post('txt_id_modelo');
		$id_marca=$this->input->post('id_marca');
		$modelo=$this->input->post('txt_modelo');
		$this->modelo_model->actualizar_modelo($id_modelo,$id_marca, $modelo);
		$this->session->set_flashdata('alerta', 'Registro Actualizado Correctamente');
			redirect('modelo/grilla','refresh');
			}elseif($data['id_nivel']==3 ||$data['id_nivel']==4){
			redirect('principal','refresh');
			}elseif($data['id_nivel']==5){
				redirect('principal','refresh');
			}
		}
	}
}
