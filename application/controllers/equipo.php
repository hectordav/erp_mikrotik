<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Equipo extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('tipo_model');
			$this->load->model('establecimiento_model');
			$this->load->model('equipo_model');
			$this->load->model('zona_model');
			$this->load->model('opcion_model');
			$this->load->model('usuario_model');
	}
	public function index(){
		redirect('equipo/grilla');
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
			$crud = new grocery_crud();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_equipo');
				$crud->order_by('id','asc');
				$crud->set_subject('Equipo');
				$crud->set_language('spanish');
				$crud->set_relation('id_modelo','t_modelo','descripcion');
				$crud->set_relation('id_establecimiento','t_establecimiento','nombre');
				$crud->set_relation('id_zona','t_zona','descripcion');
				$crud->set_relation('id_opcion_equipo','t_opcion_equipo','descripcion');
				$crud->display_as('id','#');
				$crud->display_as('id_modelo','Modelo');
				$crud->display_as('id_establecimiento','Est');
				$crud->display_as('id_opcion_equipo','Estado.');
				$crud->display_as('id_zona','Zona.');
				$crud->display_as('descripcion','Desc');
				$crud->display_as('mac','Mac');
				$crud->display_as('num_serie','SN');
				$crud->display_as('direccion','Ubicacion');
				$crud->display_as('lat','Lat');
				$crud->display_as('long','Long');
				$crud->display_as('ssid','SSID');
				$crud->display_as('cloud','Cloud');
				$crud->display_as('subida','Subida');
				$crud->display_as('bajada','Bajada');
				$crud->display_as('fecha_creacion','F. Montaje');
				$crud->columns('id','id_establecimiento','mac','descripcion','direccion','lat','long','ssid','fecha_creacion','id_opcion_equipo');
				$crud->required_fields('id','id_establecimiento','mac','num_serie','direccion','lat','long','ssid','cloud','fecha_creacion');
				$crud->add_action('Desact/Act equipo', '', '','fa fa-check-circle',array($this,'des_prim'));
				$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'id_primaria'));
				$crud->unset_edit();
				$output = $crud->render();
				$state = $crud->getState();
				if($state == 'add'){
					 redirect('equipo/add');
				}

			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('equipo/equipo');
			$this->load->view('../../assets/inc/menu_lateral_derecho');
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
/********************/
			}
			}else{
				redirect('acceso_usuario','refresh');
			}

		}catch (Exception $e) {
		}
	}
	function id_primaria($primary_key , $row){
		return site_url('equipo/edit').'/'.$row->id;
	}
	function des_prim($primary_key , $row){
		return site_url('equipo/desactivar_activar_equipo').'/'.$row->id;
	}
	public function add(){
			if ($this->session->userdata('logueado')) {
				$data_u = array('id_usuario' =>$this->session->userdata('id'),
				'usuario'=>$this->session->userdata('usuario'),
				'id_nivel'=>$this->session->userdata('id_nivel'),
				'puntaje'=>$this->session->userdata('puntaje'),
				'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_cliente');
				$crud->set_subject('equipo');
				$output = $crud->render();
				$data = array('tipo' =>$this->tipo_model->get_tipo(),
				'establecimiento'=>$this->establecimiento_model->get_establecimiento(),
				'zona'=>$this->zona_model->get_zona());

			if ($data_u['id_nivel']==1 ||$data_u['id_nivel']==2 ) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('equipo/add',$data);
			$this->load->view('../../assets/script/script_combo');
			$this->load->view('../../assets/inc/footer_common_add',$output);
			}elseif($data_u['id_nivel']==3 ||$data_u['id_nivel']==4){
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral_lvl_3',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('acceso_restringido/acceso_restringido');
			$this->load->view('../../assets/inc/menu_lateral_derecho');
			$this->load->view('../../assets/inc/footer_common',$output);
			}elseif($data_u['id_nivel']==5){
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
	}
	public function guardar_equipo(){
		if ($this->session->userdata('logueado')) {
		$data_u = array('id_usuario' =>$this->session->userdata('id'),
				'usuario'=>$this->session->userdata('usuario'),
				'id_nivel'=>$this->session->userdata('id_nivel'),
				'puntaje'=>$this->session->userdata('puntaje'),
				'imagen'=>$this->session->userdata('imagen'));


		$id_tipo=$this->input->post('id_tipo', TRUE);
		$id_marca=$this->input->post('id_marca', TRUE);
		$id_modelo=$this->input->post('id_modelo', TRUE);
		$id_establecimiento=$this->input->post('id_establecimiento', TRUE);
		$id_zona=$this->input->post('id_zona', TRUE);
		$descripcion=$this->input->post('txt_descripcion', TRUE);
		$mac=$this->input->post('txt_mac', TRUE);
		$serial=$this->input->post('txt_serial', TRUE);
		$direccion=$this->input->post('txt_direccion', TRUE);
		$lat=$this->input->post('txt_lat', TRUE);
		$lng=$this->input->post('txt_lng', TRUE);
		$ssid=$this->input->post('txt_ssid', TRUE);
		$cloud=$this->input->post('txt_cloud', TRUE);
		$subida=$this->input->post('txt_subida', TRUE);
		$bajada=$this->input->post('txt_bajada', TRUE);
		$fecha=$this->input->post('dt_fecha', TRUE);
		$id_opcion=1;
		if ($data_u['id_nivel']==1 ||$data_u['id_nivel']==2 ) {
			$this->equipo_model->guardar_equipo($id_opcion,$id_tipo, $id_marca, $id_modelo, $id_establecimiento, $id_zona, $descripcion, $mac,  $serial, $direccion, $lat, $lng, $ssid, $cloud, $subida, $bajada, $fecha);
				redirect('equipo','refresh');
		}elseif($data_u['id_nivel']==3 ||$data_u['id_nivel']==4){
		redirect('principal','refresh');
		}elseif($data_u['id_nivel']==5){
			redirect('principal','refresh');
			}
		}else{
			redirect('acceso_usuario','refresh');
		}

	}
	public function edit(){
		try {
			if ($this->session->userdata('logueado')) {
		$data_u = array('id_usuario' =>$this->session->userdata('id'),
				'usuario'=>$this->session->userdata('usuario'),
				'id_nivel'=>$this->session->userdata('id_nivel'),
				'puntaje'=>$this->session->userdata('puntaje'),
				'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data_u['id_usuario']);
		$id_equipo=$this->uri->segment(3);
		if (!$id_equipo) {
			redirect('principal','refresh');
		}
		$equipo=$this->equipo_model->get_equipo($id_equipo);
		foreach ($equipo->result() as $data) {
			$data_equipo = array(
				'id_equipo'=>$data->id,
				'id_modelo' =>$data->id_modelo,
				'id_establecimiento' =>$data->id_establecimiento,
				'mac' =>$data->mac,
				'descripcion' =>$data->descripcion,
				'num_serie' =>$data->num_serie,
				'direccion' =>$data->direccion,
				'lat' =>$data->lat,
				'long' =>$data->long,
				'ssid' =>$data->ssid,
				'cloud' =>$data->cloud,
				'subida' =>$data->subida,
				'bajada' =>$data->bajada,
				'fecha_creacion' =>$data->fecha_creacion,
				'tipo' =>$this->tipo_model->get_tipo(),
				'establecimiento'=>$this->establecimiento_model->get_establecimiento(),
				'zona'=>$this->zona_model->get_zona());
		}
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_cliente');
		$crud->set_subject('equipo');
		$output = $crud->render();
		$data = array('tipo' =>$this->tipo_model->get_tipo(),
		'establecimiento'=>$this->establecimiento_model->get_establecimiento());
			if ($data_u['id_nivel']==1 ||$data_u['id_nivel']==2 ) {
			$this->load->view('../../assets/inc/head_common_add', $output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('equipo/edit',$data_equipo);
			$this->load->view('../../assets/script/script_combo');
			$this->load->view('../../assets/inc/footer_common_add',$output);
		}elseif($data_u['id_nivel']==3 ||$data_u['id_nivel']==4){
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral_lvl_3',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('acceso_restringido/acceso_restringido');
			$this->load->view('../../assets/inc/menu_lateral_derecho');
			$this->load->view('../../assets/inc/footer_common',$output);
		}elseif($data_u['id_nivel']==5){
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
		} catch (Exception $e) {
			redirect('principal','refresh');
		}
	}
	public function editar_equipo(){
		if ($this->session->userdata('logueado')) {
		$data_u = array('id_usuario' =>$this->session->userdata('id'),
				'usuario'=>$this->session->userdata('usuario'),
				'id_nivel'=>$this->session->userdata('id_nivel'),
				'puntaje'=>$this->session->userdata('puntaje'),
				'imagen'=>$this->session->userdata('imagen'));
		$id_equipo=$this->input->post('txt_id_equipo');
		$id_tipo=$this->input->post('id_tipo');
		$id_marca=$this->input->post('id_marca');
		$id_modelo=$this->input->post('id_modelo');
		$id_establecimiento=$this->input->post('id_establecimiento');
		$id_zona=$this->input->post('id_zona');
		$descripcion=$this->input->post('txt_descripcion');
		$mac=$this->input->post('txt_mac');
		$serial=$this->input->post('txt_serial');
		$direccion=$this->input->post('txt_direccion');
		$lat=$this->input->post('txt_lat');
		$lng=$this->input->post('txt_lng');
		$ssid=$this->input->post('txt_ssid');
		$cloud=$this->input->post('txt_cloud');
		$subida=$this->input->post('txt_subida');
		$bajada=$this->input->post('txt_bajada');
		$fecha=$this->input->post('dt_fecha');
		if ($data_u['id_nivel']==1 ||$data_u['id_nivel']==2 ) {
				$this->equipo_model->update_equipo($id_equipo, $id_tipo, $id_marca, $id_modelo, $id_establecimiento, $id_zona, $descripcion, $mac, $serial, $direccion, $lat, $lng, $ssid, $cloud, $subida, $bajada, $fecha);
		redirect('equipo','refresh');
		}elseif($data_u['id_nivel']==3 ||$data_u['id_nivel']==4){
		redirect('principal','refresh');
		}elseif($data_u['id_nivel']==5){
		redirect('principal','refresh');
			}
	}else{
		redirect('acceso_usuario','refresh');
		}
	}
	public function desactivar_activar_equipo(){
		if ($this->session->userdata('logueado')) {
		$data_u = array('id_usuario' =>$this->session->userdata('id'),
				'usuario'=>$this->session->userdata('usuario'),
				'id_nivel'=>$this->session->userdata('id_nivel'),
				'puntaje'=>$this->session->userdata('puntaje'),
				'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data_u['id_usuario']);
		$id_equipo=$this->uri->segment(3);
		if (!$id_equipo) {
			redirect('principal','refresh');
		}
		$equipo['equipo']=$this->equipo_model->get_equipo($id_equipo);
		$equipo['opcion']=$this->opcion_model->get_opcion();
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_equipo');
		$crud->set_subject('equipo');
		$output = $crud->render();

		if ($data_u['id_nivel']==1 ||$data_u['id_nivel']==2 ) {
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
		$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
		$this->load->view('equipo/desactivar_activar_equipo',$equipo);
		$this->load->view('../../assets/inc/footer_common',$output);
		}elseif($data_u['id_nivel']==3 ||$data_u['id_nivel']==4){
			redirect('principal','refresh');
		}elseif($data_u['id_nivel']==5){
				redirect('principal','refresh');
			}
	}else{
		redirect('acceso_usuario','refresh');
	}
	}
	public function actualizar_desactivar_equipo(){
		if ($this->session->userdata('logueado')) {
		$data_u = array('id_usuario' =>$this->session->userdata('id'),
				'usuario'=>$this->session->userdata('usuario'),
				'id_nivel'=>$this->session->userdata('id_nivel'),
				'puntaje'=>$this->session->userdata('puntaje'),
				'imagen'=>$this->session->userdata('imagen'));
		$id_equipo=$this->input->post('txt_id_equipo');
		$id_opcion=$this->input->post('id_opcion');
		if ($data_u['id_nivel']==1 ||$data_u['id_nivel']==2 ) {

		$this->equipo_model->actualizar_opcion_equipo($id_equipo, $id_opcion);
		redirect('equipo','refresh');
		}elseif($data_u['id_nivel']==3 ||$data_u['id_nivel']==4){
			redirect('principal','refresh');
		}elseif($data_u['id_nivel']==5){
				redirect('principal','refresh');
			}
	}else{
		redirect('acceso_usuario','refresh');
	}
	}
}
