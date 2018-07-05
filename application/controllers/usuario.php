<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('usuario_model');
			$this->load->model('conexion_model');
			$this->load->model('cliente_model');
			$this->load->helper('security');
			$this->load->library('security');
			$this->load->model('nivel_model');
	}
	public function index(){
		redirect('usuario/grilla');
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
				$crud->set_table('t_usuario');
				$crud->set_subject('Usuario');
				$crud->set_language('spanish');
				$crud->set_relation('id_nivel','t_nivel','descripcion');
				$crud->set_relation('id_cliente','t_cliente','nombre');
				$crud->display_as('id_nivel','Nivel');
				$crud->display_as('usuario','Usuario');
				$crud->display_as('login','Login');
				$crud->display_as('clave','Password');
				/*$crud->display_as('img','Imagen');*/
				$crud->columns('id_nivel','usuario','login');
				$crud->required_fields('id_nivel','usuario','login');
				$crud->unset_read();
				$output = $crud->render();
				$state = $crud->getState();
				if($state == 'add'){
					 redirect('usuario/add');
				}
				//las vistas
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('usuario/usuario',$output );
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
		$crud->set_table('t_usuario');
		$crud->set_subject('Usuario');
		$output = $crud->render();
		$data['nivel_usuario']=$this->nivel_model->get_nivel();
if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
		$this->load->view('../../assets/inc/head_common',$output);
		$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
		$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
		$this->load->view('usuario/add',$data );
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
	public function guardar_usuario(){
		if ($this->session->userdata('logueado')) {
				$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
		$nombre=$this->input->post('txt_nombre', TRUE);
		$id_nivel=$this->input->post('id_nivel', TRUE);
		$login=$this->input->post('txt_login', TRUE);
		$clave=$this->input->post('txt_clave', TRUE);
		$descripcion=$this->input->post('txt_descripcion', TRUE);
		$sobre_mi=$this->input->post('txt_sobre_mi', TRUE);
		$imagen="mi_imagen";
		$config['upload_path'] = "./uploads/img/";
		$config['allowed_types'] = '*';
		$config['remove_spaces']=TRUE;
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($imagen)) {
			$data= $this->upload->data();
			$archivo=$data['file_name'];
		}else{
			$archivo=null;
		}
		$clave_2=do_hash($clave);
		$this->usuario_model->guardar_usuario_1($id_nivel,$nombre,$login,$clave_2);
		$data_usuario=$this->usuario_model->buscar_ultimo_usuario();
		foreach ($data_usuario->result() as $data) {
			$id_usuario_3=$data->id;
		}
			$contar_puntos=0;
		$this->usuario_model->guardar_perfil_usuario($id_usuario_3,$descripcion,$sobre_mi,$archivo,$contar_puntos);

		redirect('usuario','refresh');
		$this->load->view('../../assets/inc/footer_common',$output);
		}elseif($data['id_nivel']==3 ||$data['id_nivel']==4){
			redirect('principal','refresh');
		}elseif($data['id_nivel']==5){
			redirect('principal','refresh');
		}
			}else{
			redirect('acceso_usuario','refresh');
			}


	}
	public function perfil(){
			if ($this->session->userdata('logueado')){
			$id_usuario=$this->session->userdata('id');
			$buscar_id_cliente=$this->usuario_model->id_cliente_usuario($id_usuario);
		$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);

			foreach ($buscar_id_cliente->result() as $data) {
				$id_cliente=$data->id_cliente;
			}
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->where('id_cliente',$id_cliente);
			$crud->set_table('t_conexion');
			$crud->set_subject('Conexion');
			$crud->set_language('spanish');
			$crud->set_language('spanish');
			$crud->set_relation('id_cliente','t_cliente','nombre');
			$crud->set_relation('id_establecimiento','t_establecimiento','nombre');
			$crud->set_relation('id_tipo_conexion','t_tipo_conexion','descripcion');
			$crud->set_relation('id_equipo','t_equipo','descripcion');
			$crud->display_as('id','#');
			$crud->display_as('id_cliente','Usuario');
			$crud->display_as('id_equipo','Equipo');
			$crud->display_as('fecha','Fecha');
			$crud->display_as('hora','Hora');
			$crud->columns('fecha','hora');
			$crud->unset_jquery_ui();
			$crud->unset_operations();

			$output = $crud->render();
			$data = array('id_usuario' =>$this->session->userdata('id'),
					  'nombre_usuario'=>$this->session->userdata('usuario'),
					  'dato_usuario'=>$this->usuario_model->buscar_datos_usuario($this->session->userdata('id')),
					  'datos_conexion'=>$this->conexion_model->buscar_conexion_cliente($id_cliente));
			}
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('usuario/perfil',$data );
			$this->load->view('usuario/conexion',$output );
			$this->load->view('../../assets/inc/footer_common',$output);
	}
	public function verificar_email(){
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_usuario');
			$crud->set_subject('Usuario');
			$output = $crud->render();
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('usuario/verificar');
	}
	public function enviar_cliente_mail(){
		$correo=$this->input->post('txt_correo');
		$buscar_email=$this->cliente_model->buscar_cliente_mail($correo);
		if ($buscar_email) {
			foreach ($buscar_email->result() as $data) {
				$id_login=$data->id;

			}
			/* configuracion del correo*/
			$config = Array(
			'IsSMTP'=>true,
			'useragent'=>'Codeigniter',
	    'protocol' => 'sendmail',
	    'smtp_host' => 'ssl://smtp.gmail.com',
	    'smtp_port' =>  '465',
	    'smtp_timeout'=>'10',
	    'smtp_user' => 'correobluecarrotfreewifi@gmail.com',
	    'smtp_pass' => 'OpenWifi22',
	    'mailtype'  => 'html',
	    'charset'   => 'utf-8',
	    'smtp_crypto'=>'tls',
	    'wordwrap'=>true,
	    'wrapchars'=>76,
	    'validate'=>true,
	    'crlf'=>'\r\n',
	    'newline'=>'\r\n',
	    'bcc_batch_mode'=>false,
	    'bcc_batch_size'=>200,
	    'smtp_secure'=>'tls'
	);

			/************************/
			$id_login_hash= do_hash($id_login);
			$destinatario=$correo;
			$mensaje_español="Hemos validado tu correo electronico, haz clic en el siguiente botón, <strong>consigue puntos</strong> y cambialos por <strong>regalos</strong>.";
			$mensaje_cata="Hem validat el teu mail , fes clic al següent botó , <strong>aconsegueix punts</strong> i canvia'ls per <strong>regals</strong>.";
			$mensaje_ingles="We have validated your mail , click the next button , <strong>earn points</strong> and exchange them for <strong>gifts</strong>.";
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->load->library('email');
			$this->email->from('correobluecarrotfreewifi@gmail.com');
			$this->email->to($destinatario);
			$this->email->subject('Registro');
			$direccion=base_url();
			$this->email->message('<div align="center"><img src="https://pthysg-ch3302.files.1drv.com/y3mpLO0F8Fh7Bucg1bkH-j3wH2_7bNEtQpA5fWkYL_Uw1yC5NPkONpyD7hb3PwJEwaDQkeDxeP6p6OxyFSvXHme9uGW26-fBaTlEGUdoLjTe9d_A8uhcRXyjcZPLdAyOeO_V4L_o_ODeHqbj5KG_GSLaJz5J2TGeHJKk5-RVGZvJks?width=2500&height=625&cropmode=none" width="250" height="63" /></div><br><h3 align="left">'.$mensaje_español.'<div align="left"></h3><br><h3 align="left">'.$mensaje_cata.'<div align="left"></h3><br><h3 align="left">'.$mensaje_ingles.'</h3><br><div align="center"><a href="'.base_url().'usuario/registro_usuario/'.$id_login_hash.'"><img src="https://ojhysg-ch3302.files.1drv.com/y3mfhS3Gx9RUOKNkrZa7w-hh84EvPA9iO7Dtvx6HNNWfpw4qDiZilbFHiGViL7c7x1NxrcYwy9lnsK5Epqqd8Zjq9raDnRgvNi6Gx_FuTzuSVmPHUjHk0lGPqTAK5MVgY5hPKGZrfr1wJzww5ZuxGJSdNCOA7-dCMU3xP1msGvnUP4?width=352&height=345&cropmode=none" width="115" height="115" /></a>');
				$result = $this->email->send();
				$this->load->view('usuario/verificado');

		}else{
			$this->load->view('usuario/verificado');

		}
	}
	public function registro_usuario(){
		/* Recibo el id de usuario y lo paso a una variable Hidden en el view*/
		$id_usuario['id_usuario']=$this->uri->segment(3);
		$this->load->view('usuario/registro_usuario',$id_usuario);
	}
	public function guardar_usuario_final(){
		$id_usuario=$this->input->post('txt_id_usuario');
		$nombre=$this->input->post('txt_nombre');
		$login=$this->input->post('txt_login');
		$clave=$this->input->post('txt_clave');
		$clave_hash=do_hash($clave);
		$descripcion=$this->input->post('txt_descripcion');
		$sobre_mi=$this->input->post('txt_sobre_mi');
		$imagen="mi_imagen";
		$config['upload_path'] = "./uploads/img/";
		$config['allowed_types'] = '*';
		$config['remove_spaces']=TRUE;
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($imagen)) {
			$data= $this->upload->data();
			$archivo=$data['file_name'];
		}else{
			$archivo=null;
		}
		$buscar_id_usuario=$this->cliente_model->buscar_id_cliente();
		foreach ($buscar_id_usuario->result() as $data) {
			$id_usuario_hash=do_hash($data->id);
			if ($id_usuario==$id_usuario_hash){
				$id_usuario_2=$data->id;
			}
		}
		$contar_puntos=0;
		$id_nivel=5;
		$this->usuario_model->guardar_usuario_final($id_usuario_2,$id_nivel,$nombre,$login,$clave_hash);
		$data_usuario=$this->usuario_model->buscar_ultimo_usuario();
		foreach ($data_usuario->result() as $data) {
			$id_usuario_3=$data->id;
		}
		$this->usuario_model->guardar_perfil_usuario($id_usuario_3,$descripcion,$sobre_mi,$archivo,$contar_puntos);
		redirect('acceso_usuario');
	}

}

/* End of file tipo_cliente.php */
/* Location: ./application/controllers/tipo_cliente.php */