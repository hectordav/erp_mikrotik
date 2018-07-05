<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->library(array('twconnect'));
        $this->load->model('equipo_model');
        $this->load->model('usuario_final_model');
        $this->load->model('usuario_model');
	}
	public function index()
	{
		if($this->session->userdata('login') == true){
			redirect('twitter/profile');
		}

		$this->load->view('welcome_message');
	}

	public function redirect() {

		if($this->session->userdata('login') == true){
			redirect('twitter/profile');
		}

		$ok = $this->twconnect->twredirect('twitter/callback');

		if (!$ok) {
			echo 'Could not connect to Twitter. Refresh the page or try again later.';
		}

	}


	public function callback() {

		if($this->session->userdata('login') == true){
			redirect('twitter/profile');
		}

		$ok = $this->twconnect->twprocess_callback();

		if ( $ok ) { redirect('twitter/success'); }
			else redirect ('twitter/failure');

	}


	public function success() {

		if($this->session->userdata('login') == true){
			redirect('twitter/profile');
		}

		$this->twconnect->twaccount_verify_credentials();


		$user_profile = $this->twconnect->tw_user_info;

		$this->session->set_userdata('login',true);


		$arr = array(
			'id' => $user_profile->id,
			'name' => $user_profile->name,
			'screen_name' => $user_profile->screen_name,
			'location' => $user_profile->location,
			'description' => $user_profile->description,
			'profile_image_url' => $user_profile->profile_image_url,
		);

		$this->session->set_userdata('user_profile',$arr);
		redirect('twitter/profile');
	}

	public function failure() {
		if($this->session->userdata('login') == true){
			redirect('twitter/profile');
		}
		echo '<p>Twitter connect failed</p>';
		echo '<p><a href="' . base_url() . 'twitter/logout">Try again!</a></p>';
	}

	public function profile(){
		if($this->session->userdata('login') != true){
			redirect('');
		}
		$contents['user_profile'] = $this->session->userdata('user_profile');


		/******************los datos del Mikrotik*******************************/
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

 		$mac_2=$this->equipo_model->get_equipo_mac($mac);
	 		if ($mac_2) {
	 			/*echo "mac_2";
	 			exit();*/
	 			/*si existe la mac registrada en el sistema*/
	 			foreach ($mac_2->result() as $data) {
	 				$id_equipo=$data->id;
	 				$id_organizacion=$data->id_establecimiento;
	 			}
	 			}else{
	 			/*si no existe la mac en el sistema lo saca y no permite loguearse*/
	 				$this->load->view('login/acceso_restringido');
	 			}

 	/***********************************************************************/
 			$contents = $this->session->userdata('user_profile');

 			$data = array(
			'id' => $contents['id'],
			'name' => $contents['name'],
			'screen_name' => $contents['screen_name'],
			'location' => $contents['location'],
			'description' => $contents['description'],
			'profile_image_url' => $contents['profile_image_url']
		);

	 		$login="@".$data['screen_name'];
	 		$nombre_apellido=$data['name'];
	 		$id_tipo_conexion=2; /*2  para twitter*/
	 		$fecha=date('Y-m-d');
	 		$hora=date("G:i");
	 		$cliente = $this->usuario_final_model->get_login_twitter($login);
	 		if ($cliente){
	 			/*echo "si cliente existe";
	 			exit();*/
	 		foreach ($cliente->result() as $data) {
	 		$usuario_data = array(
             'id' => $data->id,
             'nombre' => $data->nombre,
             'email' => $data->email);
	 		}
	 		$busca_seguir_twitter=$this->usuario_final_model->get_follow_twitter($usuario_data['id'],$id_tipo_conexion,$id_organizacion);
	 		if ($busca_seguir_twitter){
	 			$this->usuario_final_model->guardar_conexion_usuario($usuario_data['id'],$id_organizacion,$id_tipo_conexion,$id_equipo,$fecha,$hora);
	/*verifica si el usuario lo sigue en twitter*/
	redirect('login/funcion_busca_parrilla_1','refresh');
	 		}else{
	 			$this->usuario_final_model->guardar_conexion_usuario($usuario_data['id'],$id_organizacion,$id_tipo_conexion,$id_equipo,$fecha,$hora);
	 			redirect('login/follow_tw');
	 		}
	 		}else{
	 		#si no existe lo crea
	 		$nombre=$nombre_apellido;

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
			redirect('login/follow_tw');
	 		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
}
