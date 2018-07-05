<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
	 public $user=null;
	public function __construct(){
        parent::__construct();
       /* $this->load->helper('url');*/
		$this->load->helper('security');
		$this->load->library('grocery_crud');
		$this->load->model('usuario_final_model');
		$this->load->model('equipo_model');
		$this->load->model('api_facebook_model');
		parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
		$this->load->model('establecimiento_model');
		$this->load->model('parrilla_model');
		$this->load->model('seguir_model');
		$this->load->model('landing_model');
		$this->load->model('comparte_model');
		$this->load->model('pregunta_model');
		$this->load->model('horario_model');
		$this->load->model('video_model');
		 $this->load->library('facebook', $array = array('appId' =>'538679186318463
','secret'=>'da116a618ac1f9b0c1028ab313f81482' ));
        $this->user=$this->facebook->getUser();
	    }

		public function index(){
		/*los datos del mikrotik*/
		$mac['mac']=$this->input->post('mac_mikro');
		/*******************************************/
		$app_id="538679186318463";
		$secret="da116a618ac1f9b0c1028ab313f81482";
	/*	$mac['mac']="4C:5E:0C:15:AB:C9";*/
		$ip=$this->input->post('ip');
		$username=$this->input->post('username');
		$link_login=$this->input->post('link-login');
		$link_orig=$this->input->post('link_orig');
		$error=$this->input->post('error');
		$chap_id=$this->input->post('chap-id');
		$chap_challenge=$this->input->post('chap-challenge');
		$link_login_only=$this->input->post('link-login-only');
		$link_orig_esc=$this->input->post('link-orig-esc');
		$mac_esc=$this->input->post('mac-esc');
		$data = array('mac' =>$mac['mac'],
					  'ip'=>$ip,
					  'username'=>$username,
					  'link_login'=>$link_login,
					  'link_orig'=>	$link_orig,
					  'error'=>$error,
					  'chap_id'=>$chap_id,
					  'chap_challenge'=>$chap_challenge,
					  'link_login_only'=> $link_login_only,
					  'link_orig_esc'=>$link_orig_esc,
					  'mac_esc'=>$mac_esc,
					  'app_id'=>$app_id,
					  'secret'=>$secret);
		$this->session->set_userdata($data);
		$fecha=date('Y-m-d');
		$tiempo = time();
		$hora=date("H:i:s", $tiempo);
		/*******************************/

		if ($mac) {

			/*esto es la prueba eliminar $mac['mac'] y colocar $data['mac'] */
			$mac_2=$this->equipo_model->get_equipo_mac($mac['mac']);
			if ($mac_2==true) {

				foreach ($mac_2->result() as $key) {
					$id_equipo= $key->id;
				}
			$this->load->view('login/login',$data);
			}else{
				$this->load->view('login/acceso_restringido');
			}
		}else{
			$this->load->view('login/acceso_restringido');
		}

		}

	public function select_int(){
		/*$mac="4C:5E:0C:15:AB:C9";*/
/********************los datos del equipo*****************************/
 		/*esto es por prueba, ojo quitar comentario y borrar el de abajo*/
 		$mac=$this->session->userdata('mac');
 	/*******************************************/
		$ip=$this->session->userdata('ip');
		$username=$this->session->userdata('username');
		$link_login=$this->session->userdata('link_login');
		$link_orig=$this->session->userdata('link_orig');
		$error=$this->session->userdata('error');
		$chap_id=$this->session->userdata('chap_id');
		$chap_challenge=$this->session->userdata('chap_challenge');
		$link_login_only=$this->session->userdata('link_login_only');
		$link_orig_esc=$this->session->userdata('link_orig_esc');
		$mac_esc=$this->session->userdata('mac_esc');
		$imagen=$this->session->userdata('imagen');
		$appId=$this->session->userdata('app_id');
		$secret=$this->session->userdata('secret');

		/************************************************************************/
		$mac_2=$this->equipo_model->get_equipo_mac($mac);
		foreach ($mac_2->result() as $data) {
			$id_equipo=$data->id;
		}
 		$this->appId = $appId;
        $this->secret =$secret;
		 $fb_config = array(
            'appId' => $this->appId,
            'secret' => $this->secret
        );
        $this->load->library('facebook', $fb_config);
 				$this->user=$this->facebook->getUser();
 				$user_twitter=$this->session->userdata('login');
	#La sesion de facebook.
	if ($this->user) {
            try {
                $user_profile= $this->facebook->api('/me');
            } catch (Exception $e) {
            }
        }
	if ($this->user) {
		redirect('login/iniciar_sesion_facebook_1');
	}else{
	$data_login['login']=$this->facebook->getLoginUrl(array("scope"=>'email'));
	$this->load->view('login/selec_login',$data_login);
		}
	}
	 public function iniciar_sesion_facebook_1(){
	 	try {
	 /**************************************************************************/
	 	$mac=$this->session->userdata('mac');
		$ip=$this->session->userdata('ip');
		$username=$this->session->userdata('username');
		$link_login=$this->session->userdata('link_login');
		$link_orig=$this->session->userdata('link_orig');
		$error=$this->session->userdata('error');
		$chap_id=$this->session->userdata('chap_id');
		$chap_challenge=$this->session->userdata('chap_challenge');
		$link_login_only=$this->session->userdata('link_login_only');
		$link_orig_esc=$this->session->userdata('link_orig_esc');
		$mac_esc=$this->session->userdata('mac_esc');
 		$data = array('mac'=>$mac,
					'ip'=>$ip,
					'username'=>$username,
					'link_login'=>$link_login,
					'link_orig'=>$link_orig,
					'error'=>$error,
					'chap_id'=>$chap_id,
					'chap_challenge'=>$chap_challenge,
					'link_login_only'=>$link_login_only,
					'link_orig_esc'=>$link_orig_esc,
					'mac_esc'=>$mac_esc);
	 		/**************************************************************************/
	 		$mac_2=$this->equipo_model->get_equipo_mac($mac);
	 		if ($mac_2) {

	 			/*si existe la mac registrada en el sistema*/
	 			foreach ($mac_2->result() as $data) {
	 				$id_equipo=$data->id;
	 				$id_organizacion=$data->id_establecimiento;
	 			}
	 			}else{

	 /*si no existe la mac en el sistema lo saca y no permite loguearse*/
	 				$this->load->view('login/acceso_restringido');
	 			}
	 		$user_profile= $this->facebook->api('/me?fields=picture.width(100).height(100),first_name,last_name,email,gender');
	 		$login=$user_profile['email'];
	 		$clave=do_hash($user_profile['id']);
	 		$genero=$user_profile['gender'];
	 		$nombre_apellido=$user_profile['first_name']." ".$user_profile['last_name'];
	 		$id_tipo_conexion=1; /*1 para facebook*/
	 		$fecha=date('Y-m-d');
	 		$hora=date("G:i");
	 		$cliente = $this->usuario_final_model->get_login_facebook($login);
	 		if ($cliente){
	 			/*echo "si cliente existe";
	 			exit();*/
	 		foreach ($cliente->result() as $data) {
	 		$usuario_data = array(
             'id' => $data->id,
             'nombre' => $data->nombre,
             'email' => $data->email);
	 		}


	 	/*busca el puntaje de los usuarios registrados*/
	 		/*$busca_puntaje=$this->usuario_model->buscar_datos_usuario($usuario_data['id']);*/


	 	/*si existe el puntaje de usuario o si existe el usuario*/
	 		/*if ($busca_puntaje) {
	 			foreach ($busca_puntaje->result() as $data) {
	 				$id_det_usuario=$data->id_det_usuario;
	 				$puntaje_det_usuario=$data->puntaje;
	 			}

	 		$puntaje_nuevo=$puntaje_det_usuario+10;

	 		$this->usuario_model->actualizar_puntaje_usuario($id_det_usuario,$puntaje_nuevo);
	 		$busca_like=$this->usuario_final_model->get_like_facebook($usuario_data['id'],$id_tipo_conexion,$id_organizacion);
	 		if ($busca_like){
	 			$this->usuario_final_model->guardar_conexion_usuario($usuario_data['id'],$id_organizacion,$id_tipo_conexion,$id_equipo,$fecha,$hora);



	 			redirect('login/funcion_busca_parrilla_1','refresh');
	 		}else{
	 			$this->usuario_final_model->guardar_conexion_usuario($usuario_data['id'],$id_organizacion,$id_tipo_conexion,$id_equipo,$fecha,$hora);

	 			redirect('login/funcion_busca_parrilla_2','refresh');
	 		}
	 		}*//*else{*/
	 			$busca_like=$this->usuario_final_model->get_like_facebook($usuario_data['id'],$id_tipo_conexion,$id_organizacion);
	 		if ($busca_like){
	 			$this->usuario_final_model->guardar_conexion_usuario($usuario_data['id'],$id_organizacion,$id_tipo_conexion,$id_equipo,$fecha,$hora);

/*aqui se coloca la funcion busca parrilla, esta te verifica si hiciste like*/

	 			redirect('login/funcion_busca_parrilla_1','refresh');
	 		}else{
	 			$this->usuario_final_model->guardar_conexion_usuario($usuario_data['id'],$id_organizacion,$id_tipo_conexion,$id_equipo,$fecha,$hora);
/*funcion_busca_parrilla_2 , esta te verifica si NO hiciste like*/
	 			redirect('login/funcion_busca_parrilla_2','refresh');
	 		}
	 		/*}*/
	 /***********cierra el busca puntaje */
	 		}else{
	 		#si no existe lo crea
	 		$nombre=$nombre_apellido;
	 		$login=$user_profile['email'];
	 		if ($genero=="male") {
	 			$id_genero=1;

	 		}else{

	 			$id_genero=2;
	 		}
			$this->usuario_final_model->guardar_usuario_final($id_genero,$login,$nombre_apellido);
			$cliente = $this->usuario_final_model->get_login_facebook($login);
			foreach ($cliente->result() as $data) {
	 		$usuario_data = array(
             'id' => $data->id,
             'nombre' => $data->nombre,
             'email' => $data->email);
	 		}
	 		$this->usuario_final_model->guardar_conexion_usuario($usuario_data['id'],$id_organizacion,$id_tipo_conexion,$id_equipo,$fecha,$hora);
			redirect('login/like_fb');

	 		}
	 	} catch (FacebookApiException $e) {
	 		redirect('login/select_int','refresh');
	 	}
	 }

/*carga  la funcion si no existe el like de facebook si no existe una parrilla contratada lo envia a el like directamente*/


public function funcion_busca_parrilla_2(){
	 	$fecha=date('Y-m-d');
		$tiempo = time();
		$hora=date("H:i:s", $tiempo);
		/*******************************/
			$mac['mac']=$this->session->userdata('mac');
/*esto es la prueba eliminar $mac['mac'] y colocar $data['mac'] */
/*$mac['mac']="4C:5E:0C:15:AB:C9";*/
$mac_2=$this->equipo_model->get_equipo_mac($mac['mac']);
		foreach ($mac_2->result() as $key) {
					$id_equipo= $key->id;
				}
/*************************************************************/
/****************consulta el id_horario***********************/
/*************************************************************/
			$consulta_id=$this->horario_model->get_horario_id_hora($hora);
			if ($consulta_id){
			foreach ($consulta_id->result() as $data) {
				$id_horario=$data->id;
				}
/*************************************************************/
/***************busca el anuncio******************************/
/*************************************************************/
			$buscar_anuncio_parrilla_fecha=$this->parrilla_model->buscar_parrilla_fecha($id_equipo,$id_horario,$fecha);
			if ($buscar_anuncio_parrilla_fecha) {
				foreach ($buscar_anuncio_parrilla_fecha->result() as $key) {
					$data_det_parrilla = array(
			'id_det_parrilla'=>$key->id_det_parrilla,
			'id_parrilla'=>$key->id_parrilla,
			'id_anunciante'=>$key->id_anunciante,
			'tipo_anuncio'=>$key->tipo_anuncio,
			'id_equipo'=>$key->id_equipo,
			'nombre_anunciante'=>$key->nombre_anunciante,
			'direccion_anunciante'=>$key->direccion_anunciante,
			'imagen_anunciante'=>$key->imagen_anunciante,
			'id_horario'=>$key->id_horario_det_parrilla,
			'fecha_i_det_parrilla'=>$key->fecha_i_det_parrilla,
			'fecha_f_det_parrilla'=>$key->fecha_f_det_parrilla
			);
				}
			}else{
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/entrar');
			}
			/*busca el video*/
			if ($data_det_parrilla['tipo_anuncio']==1) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/video');
			}
			/*busca si es comparte*/
			if ($data_det_parrilla['tipo_anuncio']==2) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/ver_comparte');
			}
			/* buscar si es seguir*/
			if ($data_det_parrilla['tipo_anuncio']==3) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/seguir_redes');
			}
			/*busca si es pregunta*/
				if ($data_det_parrilla['tipo_anuncio']==4) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/pregunta');
			}
			/*busca si es landing*/
			if ($data_det_parrilla['tipo_anuncio']==5) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/entrar');
			}
			/************************************************************/
			/*******************termina el anuncio***********************/
			/************************************************************/
			}else{
			redirect('login/like_fb');
			}
			/*************************************************************/
			/*****************termina el id horario***********************/
			/*************************************************************/
	 }
/*esta es si no lo sigue en el twitter*/

public function funcion_busca_parrilla_3(){
	 	$fecha=date('Y-m-d');
		$tiempo = time();
		$hora=date("H:i:s", $tiempo);
		/*******************************/
$mac['mac']=$this->session->userdata('mac');
/*esto es la prueba eliminar $mac['mac'] y colocar $data['mac'] */
/*$mac['mac']="4C:5E:0C:15:AB:C9";*/
$mac_2=$this->equipo_model->get_equipo_mac($mac['mac']);
		foreach ($mac_2->result() as $key) {
					$id_equipo= $key->id;
				}
/*************************************************************/
/****************consulta el id_horario***********************/
/*************************************************************/
			$consulta_id=$this->horario_model->get_horario_id_hora($hora);
			if ($consulta_id){
			foreach ($consulta_id->result() as $data) {
				$id_horario=$data->id;
				}
/*************************************************************/
/***************busca el anuncio******************************/
/*************************************************************/
			$buscar_anuncio_parrilla_fecha=$this->parrilla_model->buscar_parrilla_fecha($id_equipo,$id_horario,$fecha);
			if ($buscar_anuncio_parrilla_fecha) {
				foreach ($buscar_anuncio_parrilla_fecha->result() as $key) {
					$data_det_parrilla = array(
			'id_det_parrilla'=>$key->id_det_parrilla,
			'id_parrilla'=>$key->id_parrilla,
			'id_anunciante'=>$key->id_anunciante,
			'tipo_anuncio'=>$key->tipo_anuncio,
			'id_equipo'=>$key->id_equipo,
			'nombre_anunciante'=>$key->nombre_anunciante,
			'direccion_anunciante'=>$key->direccion_anunciante,
			'imagen_anunciante'=>$key->imagen_anunciante,
			'id_horario'=>$key->id_horario_det_parrilla,
			'fecha_i_det_parrilla'=>$key->fecha_i_det_parrilla,
			'fecha_f_det_parrilla'=>$key->fecha_f_det_parrilla
			);
				}
			}else{
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/entrar');
			}
			/*busca el video*/
			if ($data_det_parrilla['tipo_anuncio']==1) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/video');
			}
			/*busca si es comparte*/
			if ($data_det_parrilla['tipo_anuncio']==2) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/compartir');
			}
			/* buscar si es seguir*/
			if ($data_det_parrilla['tipo_anuncio']==3) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/seguir_redes');
			}
			/*busca si es pregunta*/
				if ($data_det_parrilla['tipo_anuncio']==4) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/pregunta');
			}
			/*busca si es landing*/
			if ($data_det_parrilla['tipo_anuncio']==5) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/entrar');
			}
			/************************************************************/
			/*******************termina el anuncio***********************/
			/************************************************************/
			}else{
			redirect('login/follow_tw');
			}
			/*************************************************************/
			/*****************termina el id horario***********************/
			/*************************************************************/

	 }
/*carga  la funcion si existe el like de facebook si no existe una parrilla contratada lo envia a entrar*/
	 public function funcion_busca_parrilla_1(){
	 	$fecha=date('Y-m-d');
		$tiempo = time();
		$hora=date("H:i:s", $tiempo);

	$mac['mac']=$this->session->userdata('mac');

		/*******************************/
/*esto es la prueba eliminar $mac['mac'] y colocar $data['mac']
$mac['mac']="4C:5E:0C:15:AB:C9";*/
$mac_2=$this->equipo_model->get_equipo_mac($mac['mac']);
		foreach ($mac_2->result() as $key) {
					$id_equipo= $key->id;
				}

	/*************************************************************/
	/****************consulta el id_horario***********************/
	/*************************************************************/
			$consulta_id=$this->horario_model->get_horario_id_hora($hora);

			if ($consulta_id){
			foreach ($consulta_id->result() as $data) {
				$id_horario=$data->id;
				}

	/*************************************************************/
	/***************busca el anuncio******************************/
	/*************************************************************/
			$buscar_anuncio_parrilla_fecha=$this->parrilla_model->buscar_parrilla_fecha($id_equipo,$id_horario,$fecha);
			if ($buscar_anuncio_parrilla_fecha) {
				foreach ($buscar_anuncio_parrilla_fecha->result() as $key) {
					$data_det_parrilla = array(
			'id_det_parrilla'=>$key->id_det_parrilla,
			'id_parrilla'=>$key->id_parrilla,
			'id_anunciante'=>$key->id_anunciante,
			'tipo_anuncio'=>$key->tipo_anuncio,
			'id_equipo'=>$key->id_equipo,
			'nombre_anunciante'=>$key->nombre_anunciante,
			'direccion_anunciante'=>$key->direccion_anunciante,
			'imagen_anunciante'=>$key->imagen_anunciante,
			'id_horario'=>$key->id_horario_det_parrilla,
			'fecha_i_det_parrilla'=>$key->fecha_i_det_parrilla,
			'fecha_f_det_parrilla'=>$key->fecha_f_det_parrilla
			);
				}
			}else{
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/entrar');
			}

			/*busca el video*/
			if ($data_det_parrilla['tipo_anuncio']==1) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/video');
			}
			/*busca si es comparte*/
			if ($data_det_parrilla['tipo_anuncio']==2) {

				$this->session->set_userdata($data_det_parrilla);
				redirect('login/ver_comparte');
			}
			/* buscar si es seguir*/
			if ($data_det_parrilla['tipo_anuncio']==3) {


				$this->session->set_userdata($data_det_parrilla);
				redirect('login/seguir_redes');
			}
			/*busca si es pregunta*/
				if ($data_det_parrilla['tipo_anuncio']==4) {

				$this->session->set_userdata($data_det_parrilla);
				redirect('login/pregunta');
			}
			/*busca si es landing*/
			if ($data_det_parrilla['tipo_anuncio']==5) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/entrar');
			}
	/************************************************************/
	/*******************termina el anuncio***********************/
	/************************************************************/
			}else{
			redirect('login/entrar');
			}
	/*************************************************************/
	/*****************termina el id horario***********************/
	/*************************************************************/

	 }
	 public function like_fb(){
		$mac=$this->session->userdata('mac');
		$ip=$this->session->userdata('ip');
		$username=$this->session->userdata('username');
		$link_login=$this->session->userdata('link_login');
		$link_orig=$this->session->userdata('link_orig');
		$error=$this->session->userdata('error');
		$chap_id=$this->session->userdata('chap_id');
		$chap_challenge=$this->session->userdata('chap_challenge');
		$link_login_only=$this->session->userdata('link_login_only');
		$link_orig_esc=$this->session->userdata('link_orig_esc');
		$mac_esc=$this->session->userdata('mac_esc');
 		$data = array('mac'=>$mac,
					'ip'=>$ip,
					'username'=>$username,
					'link_login'=>$link_login,
					'link_orig'=>$link_orig,
					'error'=>$error,
					'chap_id'=>$chap_id,
					'chap_challenge'=>$chap_challenge,
					'link_login_only'=>$link_login_only,
					'link_orig_esc'=>$link_orig_esc,
					'mac_esc'=>$mac_esc);
	 	$this->load->view('login/like_fb',$data);
	 }

	public function video(){
	/******************los datos de la publicidad***********************/
			$id_det_parrilla=$this->session->userdata['id_det_parrilla'];
			$id_parrilla=$this->session->userdata['id_parrilla'];
			$id_anunciante=$this->session->userdata['id_anunciante'];
			$tipo_anuncio=$this->session->userdata['tipo_anuncio'];
			$id_equipo=$this->session->userdata['id_equipo'];
			$nombre_anunciante=$this->session->userdata['nombre_anunciante'];
			$direccion_anunciante=$this->session->userdata['direccion_anunciante'];
			$imagen_anunciante=$this->session->userdata['imagen_anunciante'];
			$id_horario=$this->session->userdata['id_horario'];
			$fecha_i_det_parrilla=$this->session->userdata['fecha_i_det_parrilla'];
			$fecha_f_det_parrilla=$this->session->userdata['fecha_f_det_parrilla'];
	/**********************************************************************/

			$buscar_video['video']=$this->video_model->get_video_id($id_parrilla);
			$this->load->view('login/video/video_2.html',$buscar_video);
	 }
	 public function busca_nueva_parrilla(){
	 	/*lo recibe del video_2.html*/
	 	$id_tipo_anuncio_segment=$this->uri->segment(3);
	 	if (!$id_tipo_anuncio_segment) {
	 		$id_tipo_anuncio_segment=$this->session->userdata['tipo_anuncio_seg'];
	 	}

	 	/******************los datos de la publicidad***********************/
			$id_det_parrilla=$this->session->userdata['id_det_parrilla'];
			$id_parrilla=$this->session->userdata['id_parrilla'];
			$id_anunciante=$this->session->userdata['id_anunciante'];
			$tipo_anuncio=$this->session->userdata['tipo_anuncio'];
			$id_equipo=$this->session->userdata['id_equipo'];
			$nombre_anunciante=$this->session->userdata['nombre_anunciante'];
			$direccion_anunciante=$this->session->userdata['direccion_anunciante'];
			$imagen_anunciante=$this->session->userdata['imagen_anunciante'];
			$id_horario=$this->session->userdata['id_horario'];
			$fecha_i_det_parrilla=$this->session->userdata['fecha_i_det_parrilla'];
			$fecha_f_det_parrilla=$this->session->userdata['fecha_f_det_parrilla'];
			$fecha=date('y-m-d');
		/*************************************************************/
		/*************************************************************/
		/******************busca el anuncio***************************/
		/*************************************************************/
			$buscar_anuncio_parrilla_fecha=$this->parrilla_model->buscar_parrilla_fecha_2($id_equipo,$id_horario,$fecha,$id_tipo_anuncio_segment);

			if ($buscar_anuncio_parrilla_fecha) {
				foreach ($buscar_anuncio_parrilla_fecha->result() as $key) {
					$data_det_parrilla = array(
			'id_det_parrilla'=>$key->id_det_parrilla,
			'id_parrilla'=>$key->id_parrilla,
			'id_anunciante'=>$key->id_anunciante,
			'tipo_anuncio'=>$key->tipo_anuncio,
			'id_equipo'=>$key->id_equipo,
			'nombre_anunciante'=>$key->nombre_anunciante,
			'direccion_anunciante'=>$key->direccion_anunciante,
			'imagen_anunciante'=>$key->imagen_anunciante,
			'id_horario'=>$key->id_horario_det_parrilla,
			'fecha_i_det_parrilla'=>$key->fecha_i_det_parrilla,
			'fecha_f_det_parrilla'=>$key->fecha_f_det_parrilla);
				}
			}else{
				redirect('login/entrar');
			}
			/*busca el video*/
			if ($data_det_parrilla['tipo_anuncio']==1) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/video');
			}
			/*busca si es comparte*/
			if ($data_det_parrilla['tipo_anuncio']==2) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/ver_comparte');
			}
			/* buscar si es seguir*/
			if ($data_det_parrilla['tipo_anuncio']==3) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/seguir_redes');
			}
			/*busca si es pregunta*/
				if ($data_det_parrilla['tipo_anuncio']==4) {
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/pregunta');
			}
			/*busca si es landing*/
			if ($data_det_parrilla['tipo_anuncio']==5) {
				$id_tipo_anuncio_segment['tipo_anuncio_seg']=5;
				$this->session->set_userdata($id_tipo_anuncio_segment);
				$this->session->set_userdata($data_det_parrilla);
				redirect('login/entrar');
			}
			/************************************************************/
			/*******************termina el anuncio***********************/
			/************************************************************/
	 }
	 public function seguir_redes(){
 		$id_det_parrilla=$this->session->userdata['id_det_parrilla'];
		$id_parrilla=$this->session->userdata['id_parrilla'];
		$id_anunciante=$this->session->userdata['id_anunciante'];
		$tipo_anuncio=$this->session->userdata['tipo_anuncio'];
		$id_equipo=$this->session->userdata['id_equipo'];
		$nombre_anunciante=$this->session->userdata['nombre_anunciante'];
		$direccion_anunciante=$this->session->userdata['direccion_anunciante'];
		$imagen_anunciante=$this->session->userdata['imagen_anunciante'];
		$id_horario=$this->session->userdata['id_horario'];
		$fecha_i_det_parrilla=$this->session->userdata['fecha_i_det_parrilla'];
		$fecha_f_det_parrilla=$this->session->userdata['fecha_f_det_parrilla'];
	 	$buscar_seguir['seguir']=$this->video_model->get_video_id($id_parrilla);
	 	$buscar_seguir['seguir']=$this->seguir_model->buscar_seguir_model($id_parrilla);
	 	$this->load->view('login/seguir/seguir',$buscar_seguir);
	 }
	 public function landing_page(){
	 	$id_tipo_anuncio_segment=$this->uri->segment(3);
 	if (!$id_tipo_anuncio_segment) {
 		$id_tipo_anuncio_segment=$this->session->userdata['tipo_anuncio_seg'];}
	 	/******************los datos de la publicidad***********************/
			$id_det_parrilla=$this->session->userdata['id_det_parrilla'];
			$id_parrilla=$this->session->userdata['id_parrilla'];
			$id_anunciante=$this->session->userdata['id_anunciante'];
			$tipo_anuncio=$this->session->userdata['tipo_anuncio'];
			$id_equipo=$this->session->userdata['id_equipo'];
			$nombre_anunciante=$this->session->userdata['nombre_anunciante'];
			$direccion_anunciante=$this->session->userdata['direccion_anunciante'];
			$imagen_anunciante=$this->session->userdata['imagen_anunciante'];
			$id_horario=$this->session->userdata['id_horario'];
			$fecha_i_det_parrilla=$this->session->userdata['fecha_i_det_parrilla'];
			$fecha_f_det_parrilla=$this->session->userdata['fecha_f_det_parrilla'];
			$fecha=date('y-m-d');
	/**********************************************************************/
	 	$buscar_landing['landing']=$this->landing_model->buscar_landing($id_parrilla);
	 	if ($buscar_landing['landing']) {
	 		$this->load->view('login/landing_page/landing_page_1',$buscar_landing);
	 	}else{
	 		$this->load->view('login/landing_page/landing_page_2');
	 	}
	 }
	 /*primero envia el id del comparte para luego publicarlo en las redes sociales*/
	 public function ver_comparte(){
	 		$id_det_parrilla=$this->session->userdata['id_det_parrilla'];
			$id_parrilla=$this->session->userdata['id_parrilla'];
			$id_anunciante=$this->session->userdata['id_anunciante'];
			$tipo_anuncio=$this->session->userdata['tipo_anuncio'];
			$id_equipo=$this->session->userdata['id_equipo'];
			$nombre_anunciante=$this->session->userdata['nombre_anunciante'];
			$direccion_anunciante=$this->session->userdata['direccion_anunciante'];
			$imagen_anunciante=$this->session->userdata['imagen_anunciante'];
			$id_horario=$this->session->userdata['id_horario'];
			$fecha_i_det_parrilla=$this->session->userdata['fecha_i_det_parrilla'];
			$fecha_f_det_parrilla=$this->session->userdata['fecha_f_det_parrilla'];
			$buscar_comparte['comparte']=$this->comparte_model->buscar_compartir($id_parrilla);
		 		$this->load->view('login/compartir/ver_comparte',$buscar_comparte);
	 }
	 /*aqui consigue el id para mostrarlo como imagen*/
	 public function compartir(){
	 	$id_compartir=$this->uri->segment(3);
	 	/*$id_anunciante=1;*/
	 	$buscar_comparte['comparte']=$this->comparte_model->buscar_comparte_id($id_compartir);
		 	$this->load->view('login/compartir/compartir',$buscar_comparte);
	 }
	 public function pregunta(){
	 		$id_det_parrilla=$this->session->userdata['id_det_parrilla'];
			$id_parrilla=$this->session->userdata['id_parrilla'];
			$id_anunciante=$this->session->userdata['id_anunciante'];
			$tipo_anuncio=$this->session->userdata['tipo_anuncio'];
			$id_equipo=$this->session->userdata['id_equipo'];
			$nombre_anunciante=$this->session->userdata['nombre_anunciante'];
			$direccion_anunciante=$this->session->userdata['direccion_anunciante'];
			$imagen_anunciante=$this->session->userdata['imagen_anunciante'];
			$id_horario=$this->session->userdata['id_horario'];
			$fecha_i_det_parrilla=$this->session->userdata['fecha_i_det_parrilla'];
			$fecha_f_det_parrilla=$this->session->userdata['fecha_f_det_parrilla'];
		$id_buscar_pregunta=$this->pregunta_model->id_buscar_pregunta($id_parrilla);
	 	foreach ($id_buscar_pregunta->result() as $key) {
	 		$id_pregunta=$key->id;
	 	}
	 	$buscar_opcion_pregunta=$this->pregunta_model->buscar_respuesta_id_pregunta($id_pregunta);
	 	/*foreach ($buscar_opcion_pregunta->result() as $data) {
	 		$id_pregunta=$data->id_pregunta;
	 		$id_opcion_pregunta=$data->id_opcion_pregunta;
	 	}*/
	 	/*************cuando la pregunta es de texto*****************/
	 	if ($id_opcion_pregunta==1) {
	 		$buscar_respuesta['pregunta_respuesta']=$this->pregunta_model->buscar_respuesta_id_pregunta($id_pregunta);
	 		$this->load->view('login/preguntas_respuestas/pregunta_respuesta_texto',$buscar_respuesta);
	 	}else{
	 	/****************cuando es imagen***************************/
	 			$buscar_respuesta['pregunta_respuesta']=$this->pregunta_model->buscar_respuesta_id_pregunta($id_pregunta);
	 		$this->load->view('login/preguntas_respuestas/pregunta_respuesta_imagen',$buscar_respuesta);
	 	}
	 }
	 public function follow_tw(){
	 	$mac=$this->session->userdata('mac');
		$ip=$this->session->userdata('ip');
		$username=$this->session->userdata('username');
		$link_login=$this->session->userdata('link_login');
		$link_orig=$this->session->userdata('link_orig');
		$error=$this->session->userdata('error');
		$chap_id=$this->session->userdata('chap_id');
		$chap_challenge=$this->session->userdata('chap_challenge');
		$link_login_only=$this->session->userdata('link_login_only');
		$link_orig_esc=$this->session->userdata('link_orig_esc');
		$mac_esc=$this->session->userdata('mac_esc');
 		$data = array('mac'=>$mac,
					'ip'=>$ip,
					'username'=>$username,
					'link_login'=>$link_login,
					'link_orig'=>$link_orig,
					'error'=>$error,
					'chap_id'=>$chap_id,
					'chap_challenge'=>$chap_challenge,
					'link_login_only'=>$link_login_only,
					'link_orig_esc'=>$link_orig_esc,
					'mac_esc'=>$mac_esc);

	 	$this->load->view('login/follow_tw',$data);
	 }
	  public function entrar(){
	  $mac=$this->session->userdata('mac');
		$ip=$this->session->userdata('ip');
		$username=$this->session->userdata('username');
		$link_login=$this->session->userdata('link_login');
		$link_orig=$this->session->userdata('link_orig');
		$error=$this->session->userdata('error');
		$chap_id=$this->session->userdata('chap_id');
		$chap_challenge=$this->session->userdata('chap_challenge');
		$link_login_only=$this->session->userdata('link_login_only');
		$link_orig_esc=$this->session->userdata('link_orig_esc');
		$mac_esc=$this->session->userdata('mac_esc');
 		$data = array('mac'=>$mac,
					'ip'=>$ip,
					'username'=>$username,
					'link_login'=>$link_login,
					'link_orig'=>$link_orig,
					'error'=>$error,
					'chap_id'=>$chap_id,
					'chap_challenge'=>$chap_challenge,
					'link_login_only'=>$link_login_only,
					'link_orig_esc'=>$link_orig_esc,
					'mac_esc'=>$mac_esc);
	 	$this->load->view('login/entrar',$data);
	 }
	 public function registro_sin_facebook(){
	 	/*los datos del equipo*/
	 	$mac=$this->session->userdata('mac');
		$ip=$this->session->userdata('ip');
		$username=$this->session->userdata('username');
		$link_login=$this->session->userdata('link_login');
		$link_orig=$this->session->userdata('link_orig');
		$error=$this->session->userdata('error');
		$chap_id=$this->session->userdata('chap_id');
		$chap_challenge=$this->session->userdata('chap_challenge');
		$link_login_only=$this->session->userdata('link_login_only');
		$link_orig_esc=$this->session->userdata('link_orig_esc');
		$mac_esc=$this->session->userdata('mac_esc');
 		$data = array('mac'=>$mac,
					'ip'=>$ip,
					'username'=>$username,
					'link_login'=>$link_login,
					'link_orig'=>$link_orig,
					'error'=>$error,
					'chap_id'=>$chap_id,
					'chap_challenge'=>$chap_challenge,
					'link_login_only'=>$link_login_only,
					'link_orig_esc'=>$link_orig_esc,
					'mac_esc'=>$mac_esc);
	 	/********************************************/
	 		$login=$this->input->post('txt_login');
			$nombre_apellido = $this->input->post('txt_nombre');
			$id_genero=$this->input->post('opcion');
			$fecha_nac=$this->input->post('dt_fecha');
			$cliente = $this->usuario_final_model->get_login_facebook($login);
			$id_tipo_conexion=3; /*3 para registro normal*/
			$fecha=date('Y-m-d');
	 		$hora=date("G:i");
	 		$mac_2=$this->equipo_model->get_equipo_mac($mac);
	 		foreach ($mac_2->result() as $data) {
	 				$id_equipo=$data->id;
	 				$id_organizacion=$data->id_establecimiento;
	 			}
       if ($cliente) {
       		foreach ($cliente->result() as $data) {
	 		$usuario_data = array(
             'id' => $data->id,
             'nombre' => $data->nombre,
             'email' => $data->email);
	 		}
	 		$this->usuario_final_model->guardar_conexion_usuario($usuario_data['id'],$id_organizacion,$id_tipo_conexion,$id_equipo,$fecha,$hora);
	 		redirect('login/funcion_busca_parrilla_1','refresh');
    	 	}else{
    	 	$this->usuario_final_model->guardar_usuario_final_registro($id_genero,$login,$nombre_apellido,$fecha_nac);
			$cliente = $this->usuario_final_model->get_login_facebook($login);
			foreach ($cliente->result() as $data) {
	 		$usuario_data = array(
             'id' => $data->id,
             'nombre' => $data->nombre,
             'email' => $data->email);
	 		}
   		  	}
   		  	$this->usuario_final_model->guardar_conexion_usuario($usuario_data['id'],$id_organizacion,$id_tipo_conexion,$id_equipo,$fecha,$hora);
	 redirect('login/funcion_busca_parrilla_1','refresh');
	 }
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */
?>