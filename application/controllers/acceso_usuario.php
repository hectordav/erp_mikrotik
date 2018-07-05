<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso_usuario extends CI_Controller
	{
	public function __construct()
	    {
	        parent::__construct();
			$this->load->library('grocery_crud');
			$this->load->model('usuario_model');
			$this->load->helper('url');
			$this->load->helper('security');
			$this->load->library('security');
	    }
		public function index()
		{

		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$crud->set_subject('Usuario');
		$crud->set_language('spanish');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common',$output);
		$this->load->view('acceso_usuario/acceso_usuario');
		$this->load->view('modal/modal_login');
		$this->load->view('../../assets/inc/footer_common');

		}
	 public function iniciar_sesion_post(){
			if ($this->input->post()) {
				$nombre = $this->input->post('txt_login');
				$contrasena = $this->input->post('txt_pass');
				$con_hash= do_hash($contrasena);
				$usuario = $this->usuario_model->login($nombre, $con_hash);
		         if ($usuario) {

		     /*busca el puntaje pa que lo guarde en la variable de sesion usuario_data*/
		         $puntaje_usuario=$this->usuario_model->buscar_datos_usuario($usuario->id);
		         if ($puntaje_usuario) {
		         foreach ($puntaje_usuario->result() as $data) {
		         	$puntaje=$data->puntaje;
		         }
		         }else{
		         	$puntaje=0;
		         }

		     /**********************************************/
		            $usuario_data = array(
		               'id' => $usuario->id,
		               'usuario' => $usuario->usuario,
		               'id_nivel' => $usuario->id_nivel,
		               'puntaje'=>$puntaje,
		               'logueado' => TRUE
		            );
		            $this->session->set_userdata($usuario_data);
		            redirect('acceso_usuario/logueado');
	        	 	}else{

	           		 redirect('acceso_usuario');
	       		  	}
		      }else{
		         $this->index();
     	 	  }
  	 }
  	   public function logueado() {
			if($this->session->userdata('logueado')){
				if ($this->session->userdata('id_nivel')==1) {
					redirect('principal/index','refresh');
				}
				if ($this->session->userdata('id_nivel')==2) {
					/*por ahora lo dejo asi luego debo cambiarlo*/
					redirect('principal/index','refresh');
				}
				if ($this->session->userdata('id_nivel')==3) {
					/*por ahora lo dejo asi luego debo cambiarlo*/
					redirect('principal/index','refresh');
				}
				if ($this->session->userdata('id_nivel')==4) {
					/*por ahora lo dejo asi luego debo cambiarlo*/
					redirect('principal/index','refresh');
				}
				if ($this->session->userdata('id_nivel')==5) {
					redirect('principal/p_u_f','refresh');
				}
				redirect('principal/index','refresh');
			}else{
				redirect('acceso_usuario/acceso_usuario');
			}
  		}
   	 public function cerrar_sesion() {
      $usuario_data = array(
         'logueado' => FALSE
      );
     $this->session->sess_destroy();
      redirect('acceso_usuario');
   }

	}

/* End of file login.php */
/* Location: ./application/controllers/login.php */

?>