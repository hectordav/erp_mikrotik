<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Anunciante extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('anunciante_model');
			$this->load->model('usuario_model');
			$this->load->model('parrilla_model');
			$this->load->model('pregunta_model');
	}
	public function index()
	{
		redirect('anunciante/grilla');
	}
	public function grilla(){
		if ($this->session->userdata('logueado')) {
			try {
		$data = array('id_usuario' =>$this->session->userdata('id'),
					  'usuario'=>$this->session->userdata('usuario'),
					  'id_nivel'=>$this->session->userdata('id_nivel'),
					  'puntaje'=>$this->session->userdata('puntaje'),
					  'imagen'=>$this->session->userdata('imagen'));

	$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_anunciante');
				$crud->order_by('nombre','asc');
				$crud->set_subject('Anunciante');
				$crud->set_language('spanish');
				$crud->display_as('id','#');
				$crud->display_as('nombre','Anunciante');
				$crud->display_as('direccion','Direccion');
				$crud->columns('id','nombre','direccion');
				$crud->add_action('Ver Anunciante', '', '','fa fa-eye',array($this,'id_primaria'));
				$crud->add_action('Ver parrilla asignada', '', '','fa fa-eye',array($this,'id_anunciante_parrilla'));
				$crud->unset_read();
				$crud->unset_edit();

				$crud->required_fields('id','nombre','direccion');
				$output = $crud->render();
				$state = $crud->getState();
				if($state == 'add'){
					 redirect('anunciante/add');
				}
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('anunciante/anunciante',$output);
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

			}
		}catch (Exception $e) {
		}
			}else{

	redirect('acceso_usuario','refresh');
			}

	}
	function id_primaria($primary_key , $row){
		return site_url('anunciante/ver').'/'.$row->id;
	}
	function id_anunciante_parrilla($primary_key , $row){
		return site_url('anunciante/ver_parrilla_asignada').'/'.$row->id;
	}
	public function ver_parrilla_asignada(){
		$id_parrilla=$this->uri->segment(3);
		if (!$id_parrilla) {
			$id_parrilla_2=$this->session->userdata('id_parrilla');
		if (!$id_parrilla_2) {
				redirect('anunciante','refresh');
		}
		}
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
				$crud->set_table('t_det_parrilla');
				$crud->order_by('tipo_anuncio','asc');
				$crud->set_relation('id_anunciante','t_anunciante','nombre');
				$crud->set_relation('id_tipo_anuncio','t_tipo_anuncio','tipo_anuncio');
				$crud->set_relation('id_equipo','t_equipo','descripcion');
				$crud->set_relation('id_horario','t_horario','{hora_i}-{hora_f}');
				$crud->set_subject('Parrilla');
				$crud->set_language('spanish');
				$crud->display_as('id_tipo_anuncio','Tipo de Anuncio');
				$crud->display_as('id_equipo','Equipo');
				$crud->display_as('id_horario','Horario');
				$crud->display_as('fecha_inicio','F. Inicio');
				$crud->display_as('fecha_final','F. Fin');
				$crud->columns('id_tipo_anuncio','id_equipo','id_horario','fecha_inicio','fecha_final');
				$crud->add_action('Ver Estadisticas', '', '','fa fa-pencil',array($this,'id_ver_estadistica'));
				$crud->unset_read();
				$crud->unset_add();
				$crud->unset_edit();
				$crud->unset_delete();
				$output = $crud->render();
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('anunciante/anunciante_parrilla',$output);
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
	function id_ver_estadistica($primary_key , $row){
		return site_url('anunciante/ver_estadistica').'/'.$row->id;
	}
	public function ver_estadistica(){
			$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_det_parrilla');
				$crud->order_by('tipo_anuncio','asc');
				$crud->set_relation('id_anunciante','t_anunciante','nombre');
				$crud->set_relation('id_tipo_anuncio','t_tipo_anuncio','tipo_anuncio');
				$crud->set_relation('id_equipo','t_equipo','descripcion');
				$crud->set_relation('id_horario','t_horario','{hora_i}-{hora_f}');
				$crud->set_subject('Parrilla');
				$crud->set_language('spanish');
				$crud->display_as('id_tipo_anuncio','Tipo de Anuncio');
				$crud->display_as('id_equipo','Equipo');
				$crud->display_as('id_horario','Horario');
				$crud->display_as('fecha_inicio','F. Inicio');
				$crud->display_as('fecha_final','F. Fin');
				$crud->columns('id_tipo_anuncio','id_equipo','id_horario','fecha_inicio','fecha_final');
				$crud->add_action('Ver Estadisticas', '', '','fa fa-pencil',array($this,'id_ver_estadistica'));
				$crud->unset_read();
				$crud->unset_add();
				$crud->unset_edit();
				$crud->unset_delete();
				$output = $crud->render();
		$id_parrilla=$this->uri->segment(3);
		$id_parrilla_3['id_parrilla']=$id_parrilla;
		$this->session->set_userdata($id_parrilla_3);
		$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
		$buscar_tipo_parrilla=$this->parrilla_model->buscar_tipo_anuncio_parrilla($id_parrilla);
		if ($buscar_tipo_parrilla) {
			foreach ($buscar_tipo_parrilla->result() as $key) {
			$id_tipo_anuncio=$key->id_tipo_anuncio;
		}
		}

		if ($id_tipo_anuncio=4) {

		$buscar_id_parrilla=$this->parrilla_model->get_parrilla_det_parrilla($id_parrilla);

		if ($buscar_id_parrilla) {
			foreach ($buscar_id_parrilla->result() as $key) {
				$id_parrilla_2=$key->id_parrilla;
			}

		}
		$pregunta=$this->pregunta_model->id_buscar_pregunta($id_parrilla_2);
		if (!$pregunta) {
				$this->session->set_flashdata('alerta', 'No existen Estadisticas asociadas a este tipo de anuncio');
			redirect('anunciante/ver_parrilla_asignada');
		}
			foreach ($pregunta->result() as $key) {
				$id_pregunta=$key->id;
				$pregunta_pregunta=$key->pregunta_esp;
			}
		$respuesta=$this->pregunta_model->buscar_respuesta_id_pregunta($id_pregunta);
		foreach ($respuesta->result() as $key_2) {
			$id_respuesta=$key_2->id_respuesta;
			$respuesta_2[]=$key_2->respuesta;
			$buscar_respuesta[]=$this->pregunta_model->contar_respuesta($id_respuesta);

		}
		if ($respuesta) {

			$this->view_data['series_data1']=json_encode($respuesta_2);
			$this->view_data['series_data2']=json_encode($buscar_respuesta);
		}else{
			$respuesta_2[] =0;
			$buscar_respuesta[] =0;
			$this->view_data['series_data1']=json_encode($respuesta_2);
			$this->view_data['series_data2']=json_encode($buscar_respuesta);
		}
		$pregunta_respuesta = array('pregunta' =>$pregunta_pregunta,
		'respuestas'=>$respuesta_2,
		'resultado'=>$buscar_respuesta);
	/*	echo $pregunta_pregunta;
		echo $this->view_data['series_data1'];
		echo $this->view_data['series_data2'];*/

		if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/script/script_grafico_pregunta_respuesta',$this->view_data);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('anunciante/ver_estadistica',$pregunta_respuesta);
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
	/*****************************************************************/


		}else{
			$this->session->set_flashdata('alerta', 'No existen Estadisticas asociadas a este tipo de anuncio');
			redirect('anunciante/ver_parrilla_asignada');
		}

	}
	public function ver(){
		if ($this->session->userdata('logueado')) {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					  'usuario'=>$this->session->userdata('usuario'),
					  'id_nivel'=>$this->session->userdata('id_nivel'),
					  'puntaje'=>$this->session->userdata('puntaje'),
					  'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
				$id_anunciante=$this->uri->segment(3);
				$anunciante['anunciante']=$this->anunciante_model->get_anunciante_id($id_anunciante);
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_anunciante');
				$crud->set_subject('anunciante');
				$output = $crud->render();
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common', $output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('anunciante/ver',$anunciante);
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
			$crud->set_table('t_anunciante');
			$crud->set_subject('anunciante');
			$output = $crud->render();
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('anunciante/add');
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

	public function guardar_anunciante(){
			$nombre=$this->input->post('txt_nombre', TRUE);
			$direccion=$this->input->post('txt_direccion', TRUE);
			$archivo_logo = 'archivo_logo';
			$config['upload_path'] = "./uploads/";
			$config['allowed_types'] = '*';
			$config['remove_spaces']=TRUE;
			$config['overwrite'] = true;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload($archivo_logo)){
					$data= $this->upload->data();
					$logo=$data['file_name'];
					}else{
					$logo=null;
			}
			$this->anunciante_model->guardar_anunciante($nombre,$direccion,$logo);
			redirect('anunciante','refresh');
		}
}
