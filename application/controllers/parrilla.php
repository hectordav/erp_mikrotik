<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Parrilla extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
		/*	$this->load->helper('security');
			$this->load->libray('session');*/
			$this->load->model('anunciante_model');
			$this->load->model('tipo_anuncio_model');
			$this->load->model('equipo_model');
			$this->load->model('horario_model');
			$this->load->model('parrilla_model');
			$this->load->model('zona_model');
			$this->load->model('ciudad_model');
			$this->load->model('tipo_api_model');
			$this->load->model('video_model');
			$this->load->model('comparte_model');
			$this->load->model('seguir_model');
			$this->load->model('pregunta_model');
			$this->load->model('landing_model');
			$this->load->library('upload');
			$this->load->model('usuario_model');
	}
	public function index(){
		redirect('parrilla/grilla');
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
				$crud->set_table('t_det_parrilla');
				$crud->order_by('tipo_anuncio','asc');
				$crud->set_relation('id_anunciante','t_anunciante','nombre');
				$crud->set_relation('id_tipo_anuncio','t_tipo_anuncio','tipo_anuncio');
				$crud->set_relation('id_equipo','t_equipo','descripcion');
				$crud->set_relation('id_horario','t_horario','{hora_i}-{hora_f}');
				$crud->set_subject('Parrilla');
				$crud->set_language('spanish');
				$crud->display_as('id_anunciante', 'Anunciante');
				$crud->display_as('id_tipo_anuncio','Tipo de Anuncio');
				$crud->display_as('id_equipo','Equipo');
				$crud->display_as('id_horario','Horario');
				$crud->display_as('fecha_inicio','F. Inicio');
				$crud->display_as('fecha_final','F. Fin');
				$crud->columns('id_anunciante','id_tipo_anuncio','id_equipo','id_horario','fecha_inicio','fecha_final');
				$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'id_primaria'));
				$crud->unset_edit();
				$output = $crud->render();
				$state = $crud->getState();
				if($state == 'add'){
					 redirect('parrilla/add');
				}
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('parrilla/parrilla',$output);
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
	function id_primaria($primary_key , $row)
	{
		return site_url('parrilla/edit').'/'.$row->id;
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
		$crud->set_table('t_parrilla');
		$crud->set_subject('equipo');
		$output = $crud->render();
		$data = array('anunciante' =>$this->anunciante_model->get_anunciante(),
		'tipo_anuncio'=>$this->tipo_anuncio_model->get_tipo_anuncio(),
		'equipo'=>$this->equipo_model->get_equipo_2(),
		'ciudad' =>$this->ciudad_model->get_ciudad(),
		'zona'=>$this->zona_model->get_zona(),
		'horario'=>$this->horario_model->get_horario());

		if ($data['id_nivel']=1 || $data['id_nivel']=2) {

				$this->load->view('../../assets/inc/head_common_add', $output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('parrilla/add',$data);
				$this->load->view('../../assets/script/script_ciudad_zona_equipos');
				$this->load->view('../../assets/inc/footer_common_add',$output);
			}elseif($data['id_nivel']=3 || $data['id_nivel']=4){

				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral_lvl_3',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('acceso_restringido/acceso_restringido');
				$this->load->view('../../assets/inc/menu_lateral_derecho');
				$this->load->view('../../assets/inc/footer_common',$output);
			}elseif($data['id_nivel']=5){

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
	public function guardar_parrilla(){
		if ($this->session->userdata('logueado')) {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
		if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
			$id_anunciante=$this->input->post('id_anunciante');
		$fecha_inicio=$this->input->post('dt_fecha_i');
		$fecha_final=$this->input->post('dt_fecha_f');
		$horario_1=$this->input->post('horario', TRUE);
		$anuncio_1=$this->input->post('anuncio', TRUE);
		$equipo_1=$this->input->post('equipo', TRUE);
		if ($anuncio_1==null) {
		$this->session->set_flashdata('alerta', 'Debe seleccionar un tipo de anuncio');
			redirect('parrilla/add');
		}
		if ($equipo_1==null) {
		$this->session->set_flashdata('alerta', 'debe seleccionar un equipo en la zona');
			redirect('parrilla/add');
		}

		if ($horario_1==null) {
		$this->session->set_flashdata('alerta', 'Debe Seleccionar un horario');
			redirect('parrilla/add');
		}
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_parrilla');
		$crud->set_subject('parrilla');
		$output = $crud->render();
		/***************************/
		/*guarda el identificador de la parrilla*/

		$this->parrilla_model->guardar_parrilla($id_anunciante,$fecha_inicio,$fecha_final);
		/*busco la ultima parrilla*/
		$ultima_parrilla=$this->parrilla_model->get_ultima_parrilla();
		foreach ($ultima_parrilla->result() as $data) {
			$id_parrilla=$data->id;
		}
		$id_parrilla_2['id_pa']=$id_parrilla;
		$this->session->set_userdata($id_parrilla_2);

		/*esto lo toma de los chekbox (revisar el nombre del checkbox para poder llamarlo */
		foreach ($this->input->post('horario') as $horario){
			$busca_horario=$this->horario_model->get_horario_id($horario);
			foreach ($busca_horario->result() as $key) {
				$hora_i=$key->hora_i;
				$hora_f=$key->hora_f;

			foreach ($this->input->post('anuncio') as $anuncio){
				foreach($this->input->post('equipo') as $equipo){
					/*guarda el detalle de parrilla*/
				$buscar_parrilla_existente=$this->parrilla_model->buscar_parrilla_fecha_3($equipo,$anuncio,$horario,$fecha_inicio,$fecha_final);
				if ($buscar_parrilla_existente) {
				$this->parrilla_model->eliminar_parrilla($id_parrilla);
				$this->session->set_flashdata('alerta', 'Ya Existe una parrilla Asignada para la Fechas y horas seleccionadas verifique.');
				redirect('parrilla/add');
				}

    			$this->parrilla_model->guardar_det_parrilla($id_parrilla,$id_anunciante,$anuncio,$equipo,$horario,$fecha_inicio,$fecha_final,$hora_i,$hora_f);
					}/*cierra el equipo*/
			} /*cierra el anuncio*/
		} /*cierra la busqueda de los horarios*/
		}/*cierra los horarios*/
		$data_det_parrilla = array('det_parrilla' =>$this->parrilla_model->get_det_parrilla($id_parrilla),
				'red_social'=>$this->tipo_api_model->get_tipo_api());
		$this->load->view('../../assets/inc/head_common_add', $output);
		$this->load->view('../../assets/script/script_oculta_muestra_pregunta_parrilla');
		$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
		$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
		$this->load->view('parrilla/paso_2',$data_det_parrilla);
		}elseif($data['id_nivel']==3 ||$data['id_nivel']==4){
				redirect('principal','refresh');
		}elseif($data['id_nivel']==5){
					redirect('principal','refresh');
		}
			}else{
				redirect('acceso_usuario','refresh');
			}
	}

	 public function guardar_detalle_parrilla(){
	 	$id_pa_2=$this->session->userdata('id_pa');
	 	if (!$id_pa_2) {
	 		redirect('principal','refresh');
	 	}
		$id_parrilla=$id_pa_2;
		$data_det_parrilla = array('det_parrilla' =>$this->parrilla_model->get_det_parrilla($id_parrilla));
		foreach ($data_det_parrilla['det_parrilla']->result() as $key) {
			/*busca el tipo de anuncio que se cargó en el det parrilla*/
			$id_tipo_anuncio=$key->id_tipo_anuncio;
	/**********************si es blue video**************************************/
				if ($id_tipo_anuncio==1) {
				$mi_archivo_1_espa = 'mi_archivo_1_espa';
				$mi_archivo_2_espa='mi_archivo_2_espa';
				$mi_archivo_1_cata = 'mi_archivo_1_cata';
				$mi_archivo_2_cata='mi_archivo_2_cata';
				$mi_archivo_1_eng = 'mi_archivo_bota';
				$mi_archivo_2_eng='mi_archivo_2_ingles';
			if (!empty($_FILES['mi_archivo_1_espa']['name'])) {
				$config['upload_path'] = "./uploads/video";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('mi_archivo_1_espa')){
				$data= $this->upload->data();
				$video_1_espa=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$video_1_espa=null;
				}
			}

			if (!empty($_FILES['mi_archivo_2_espa']['name'])) {
				$config['upload_path'] = "./uploads/video";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);

			if ($this->upload->do_upload('mi_archivo_2_espa')){
				$data= $this->upload->data();
				$video_2_espa=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$video_2_espa=null;
				}
			}
			if (!empty($_FILES['mi_archivo_1_cata']['name'])) {
				$config['upload_path'] = "./uploads/video";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('mi_archivo_1_cata')){
				$data= $this->upload->data();
				$video_1_cata=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$video_1_cata=null;
				}

			}
			if (!empty($_FILES['mi_archivo_2_cata']['name'])) {


				$config['upload_path'] = "./uploads/video";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);

			if ($this->upload->do_upload('mi_archivo_2_cata')){
				$data= $this->upload->data();
				$video_2_cata=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$video_2_cata=null;
				}

			}
			if (!empty($_FILES['mi_archivo_bota']['name'])) {


				$config['upload_path'] = "./uploads/video";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);

			if ($this->upload->do_upload('mi_archivo_bota')){
				$data= $this->upload->data();
				$video_1_ingles=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$video_1_ingles=null;
				}

			}

			if (!empty($_FILES['mi_archivo_2_ingles']['name'])) {
				$config['upload_path'] = "./uploads/video";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('mi_archivo_2_ingles')){
				$data= $this->upload->data();
				$video_2_ingles=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$video_2_ingles=null;
				}
			}
			$this->video_model->guardar_video($id_parrilla,$video_1_espa,$video_2_espa,$video_1_cata,$video_2_cata,$video_1_ingles,$video_2_ingles);
	/*************************************************************************/
				}
				if ($id_tipo_anuncio==2) {
	/**********************si es Blue Sharing*****************************/
				$mi_archivo_comparte = 'imagen_compartir_esp';
				$mi_archivo_comparte_cata = 'imagen_compartir_cata';
				$mi_archivo_comparte_eng = 'imagen_compartir_eng';

				if (!empty($_FILES['imagen_compartir_esp']['name'])) {
				$config['upload_path'] = "./uploads/img";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('imagen_compartir_esp')){
				$data= $this->upload->data();
				$comparte_espa=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$comparte_espa=null;
				}
			}
			if (!empty($_FILES['imagen_compartir_cata']['name'])) {
				$config['upload_path'] = "./uploads/img";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('imagen_compartir_cata')){
				$data= $this->upload->data();
				$comparte_cata=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$comparte_cata=null;
				}
			}
			if (!empty($_FILES['imagen_compartir_eng']['name'])) {
				$config['upload_path'] = "./uploads/img";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('imagen_compartir_eng')){
				$data= $this->upload->data();
				$comparte_eng=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$comparte_eng=null;
				}
			}
				$this->comparte_model->guardar_comparte($id_parrilla,$comparte_espa,$comparte_cata,$comparte_eng);
				}
	/*********************************************************************/
				if ($id_tipo_anuncio==3) {
	/***********************si es Blue Follow*****************************/
				$url_facebook=$this->input->post('txt_url_facebook', TRUE);
				$url_twitter=$this->input->post('txt_url_twitter', TRUE);
				$url_instagram=$this->input->post('txt_url_instagram', TRUE);
				$this->seguir_model->guardar_seguir($id_parrilla);
				$buscar_ultimo_seguir=$this->seguir_model->buscar_ultimo_seguir();
				foreach ($buscar_ultimo_seguir->result() as $key) {
					$id_seguir= $key->id;
				}
					if ($url_facebook) {
				$red_social=1;
				$this->seguir_model->guardar_det_seguir($id_seguir,$red_social,$url_facebook);
				}
				if ($url_twitter) {
				$red_social=2;
				$this->seguir_model->guardar_det_seguir($id_seguir,$red_social,$url_twitter);
				}
				if ($url_instagram) {
					$red_social=3;
					$this->seguir_model->guardar_det_seguir($id_seguir,$red_social,$url_instagram);
				}
				}
	/*********************************************************************/
				if ($id_tipo_anuncio==4) {
	/****************si es Blue Question ********************************/
				$opcion=$this->input->post('opcion');

					/*SI ES EN TEXTO*/
				if ($opcion==1) {
				/*$pregunta=$this->input->post('txt_pregunta', TRUE);
				$respuesta_1=$this->input->post('txt_respuesta_1', TRUE);
				$respuesta_2=$this->input->post('txt_respuesta_2', TRUE);
				$respuesta_3=$this->input->post('txt_respuesta_3', TRUE);
				$respuesta_4=$this->input->post('txt_respuesta_4', TRUE);*/
	/*****************************************************************************************/
				$pregunta_esp=$this->input->post('txt_pregunta_esp', TRUE);
				$respuesta_1_esp=$this->input->post('txt_respuesta_1_esp', TRUE);
				$respuesta_2_esp=$this->input->post('txt_respuesta_2_esp', TRUE);
				$respuesta_3_esp=$this->input->post('txt_respuesta_3_esp', TRUE);
				$respuesta_4_esp=$this->input->post('txt_respuesta_4_esp', TRUE);
	/*****************************************************************************************/
				$pregunta_cata=$this->input->post('txt_pregunta_cata', TRUE);
				$respuesta_1_cata=$this->input->post('txt_respuesta_1_cata', TRUE);
				$respuesta_2_cata=$this->input->post('txt_respuesta_2_cata', TRUE);
				$respuesta_3_cata=$this->input->post('txt_respuesta_3_cata', TRUE);
				$respuesta_4_cata=$this->input->post('txt_respuesta_4_cata', TRUE);

	/****************************************************************************************/
				$pregunta_eng=$this->input->post('txt_pregunta_eng', TRUE);
				$respuesta_1_eng=$this->input->post('txt_respuesta_1_eng', TRUE);
				$respuesta_2_eng=$this->input->post('txt_respuesta_2_eng', TRUE);
				$respuesta_3_eng=$this->input->post('txt_respuesta_3_eng', TRUE);
				$respuesta_4_eng=$this->input->post('txt_respuesta_4_eng', TRUE);

	/***************************************************************************************/
				$this->pregunta_model->guardar_pregunta($opcion,$id_parrilla,$pregunta_esp,$pregunta_eng, $pregunta_cata);
				$buscar_pregunta=$this->pregunta_model->buscar_ultima_pregunta();
				foreach ($buscar_pregunta->result() as $key){
					$id_pregunta=$key->id;
				}
				if ($respuesta_1_esp && $respuesta_1_cata && $respuesta_1_eng) {
				$this->pregunta_model->guardar_respuesta($id_pregunta,$respuesta_1_esp,$respuesta_1_cata,$respuesta_1_eng);
				}
				if ($respuesta_2_esp && $respuesta_2_cata && $respuesta_2_eng) {
				$this->pregunta_model->guardar_respuesta($id_pregunta,$respuesta_2_esp,$respuesta_2_cata,$respuesta_2_eng);
				}
				if ($respuesta_3_esp && $respuesta_3_cata && $respuesta_3_eng) {
				$this->pregunta_model->guardar_respuesta($id_pregunta,$respuesta_3_esp,$respuesta_3_cata,$respuesta_3_eng);
				}
				if ($respuesta_4_esp && $respuesta_4_cata && $respuesta_4_eng) {
				$this->pregunta_model->guardar_respuesta($id_pregunta,$respuesta_4_esp,$respuesta_4_cata,$respuesta_4_eng);
				}
				}
				if ($opcion==2) {
				/*SI ES LA PREGUNTA EN IMAGENES*/

				$pregunta_img_esp=$this->input->post('txt_pregunta_img_esp', TRUE);
				$pregunta_img_eng=$this->input->post('txt_pregunta_img_eng', TRUE);
				$pregunta_img_cata=$this->input->post('txt_pregunta_img_cata', TRUE);
				$resp_1='respuesta_1';
				$resp_2='respuesta_2';
				$resp_3='respuesta_3';
				$resp_4='respuesta_4';

				$this->pregunta_model->guardar_pregunta($opcion,$id_parrilla,$pregunta_img_esp,$pregunta_img_eng, $pregunta_img_cata);
				$buscar_pregunta=$this->pregunta_model->buscar_ultima_pregunta();
				foreach ($buscar_pregunta->result() as $key){
					$id_pregunta=$key->id;
				}
				/*$config['upload_path'] = "./uploads/img";
				$config['allowed_types'] = '*';
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;*/

/************************+*/
				if (!empty($_FILES['respuesta_1']['name'])) {
				$config['upload_path'] = "./uploads/img";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('respuesta_1')){
				$data= $this->upload->data();
				$resp_1_1=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$resp_1_1=null;
				}

				$this->pregunta_model->guardar_respuesta($id_pregunta,$resp_1_1,$resp_1_1,$resp_1_1);

			}
			if (!empty($_FILES['respuesta_2']['name'])) {
				$config['upload_path'] = "./uploads/img";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('respuesta_2')){
				$data= $this->upload->data();
				$resp_2_1=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$resp_2_1=null;
				}

				$this->pregunta_model->guardar_respuesta($id_pregunta,$resp_2_1,$resp_2_1,$resp_2_1);

			}
			if (!empty($_FILES['respuesta_3']['name'])) {
				$config['upload_path'] = "./uploads/img";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('respuesta_3')){
				$data= $this->upload->data();
				$resp_3_1=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$resp_3_1=null;
				}

				$this->pregunta_model->guardar_respuesta($id_pregunta,$resp_3_1,$resp_3_1,$resp_3_1);

			}
			if (!empty($_FILES['respuesta_4']['name'])) {
				$config['upload_path'] = "./uploads/img";
				$config['allowed_types'] = "*";
				$config['max_size'] = "0";
				$config['max_width'] = "0";
				$config['max_height'] = "0";
				$config['remove_spaces']=TRUE;
				$config['overwrite'] = true;
				$this->upload->initialize($config);
			if ($this->upload->do_upload('respuesta_4')){
				$data= $this->upload->data();
				$resp_4_1=$data['file_name'];
				}else{
				echo $this->upload->display_errors();
				$resp_4_1=null;
				}

				$this->pregunta_model->guardar_respuesta($id_pregunta,$resp_4_1,$resp_4_1,$resp_4_1);

			}
				/*$this->load->library('upload', $config);
				if ($this->upload->do_upload($resp_1)){

				$data= $this->upload->data();
				$resp_1_1=$data['file_name'];


				}else{
					echo "no guarda";
					exit();
				$resp_1_1=null;
				}*/
				/*if ($this->upload->do_upload($resp_2)){
				$data= $this->upload->data();
				$resp_2_1=$data['file_name'];
				$this->pregunta_model->guardar_respuesta($id_pregunta,$resp_2_1,$resp_2_1,$resp_2_1);
				}else{
				$resp_2_1=null;
				}
				if ($this->upload->do_upload($resp_3)){
				$data= $this->upload->data();
				$resp_3_1=$data['file_name'];
				$this->pregunta_model->guardar_respuesta($id_pregunta,$resp_3_1,$resp_3_1,$resp_3_1);
				}else{
				$resp_3_1=null;
				}
				if ($this->upload->do_upload($resp_4)){
				$data= $this->upload->data();
				$resp_4_1=$data['file_name'];
				$this->pregunta_model->guardar_respuesta($id_pregunta,$resp_4_1,$resp_4_1,$resp_4_1);
				}else{
				$resp_4_1=null;
				}*/
				}
				}
	/****************************************************************************/
				if ($id_tipo_anuncio==5) {
	/*******************Blue Landing**************************************/
				$url_landing=$this->input->post('txt_landing', TRUE);
				$this->landing_model->guardar_landing($id_parrilla,$url_landing);
				}
	/*********************************************************************/
				}
				redirect('parrilla/grilla','refresh');
	}
	public function eliminar_parrilla(){
		$id_parrilla=$this->uri->segment(3);
		if (!$id_parrilla) {
			redirect('principal','refresh');
		}
		$this->parrilla_model->eliminar_parrilla($id_parrilla);
		redirect('parrilla','refresh');
	}
}
