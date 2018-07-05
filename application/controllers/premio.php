<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Premio extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->helper('security');
			$this->load->library('security');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('anunciante_model');
			$this->load->model('premio_model');
			$this->load->model('usuario_model');
	}
	public function index()
	{
		redirect('premio/grilla');
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
				$crud->set_table('t_premio');
				$crud->order_by('id','asc');
				$crud->set_subject('Premio');
				$crud->set_language('spanish');
				$crud->set_relation('id_anunciante','t_anunciante','nombre');
				$crud->display_as('id_anunciante','Anunciante');
				$crud->display_as('codigo','Codigo');
				$crud->display_as('nombre','Nombre');
				$crud->display_as('puntaje','Puntaje');
				$crud->display_as('cantidad','Cantidad');
				$crud->columns('id_anunciante','codigo','nombre','puntaje','cantidad');
				$crud->add_action('ver', '', '','fa fa-eye',array($this,'id_primaria'));
				$crud->add_action('Editar', '', '','fa fa-pencil',array($this,'para_editar'));
				$crud->unset_read();
				$crud->unset_edit();
				$output = $crud->render();

				$state = $crud->getState();
				if($state == 'add'){
					 redirect('premio/add');
				}
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('premio/premio',$output);
				$this->load->view('../../assets/inc/menu_lateral_derecho');
				$this->load->view('../../assets/inc/footer_common');
		}else{
			redirect('acceso_usuario','refresh');
		}

		}catch (Exception $e) {
		}
	}
	function id_primaria($primary_key , $row){
		return site_url('premio/ver').'/'.$row->id;
	}
	function para_editar($primary_key , $row){
		return site_url('premio/editar').'/'.$row->id;
	}
	public function ver(){
		$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
		$id_premio=$this->uri->segment(3);
		if (!$id_premio) {
			redirect('principal','refresh');
		}
		$buscar_premio=$this->premio_model->get_premio_id($id_premio);
		foreach ($buscar_premio->result() as $data) {
			$id_anunciante=$data->id_anunciante;
		}
		$premio = array('premio' =>$this->premio_model->get_premio_id($id_premio),
		'anunciante'=>$this->anunciante_model->get_anunciante_id($id_anunciante));
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_anunciante');
		$crud->set_subject('anunciante');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
		$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
		$this->load->view('premio/ver',$premio);
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	public function editar(){
		$id_premio=$this->uri->segment(3);
		if (!$id_premio) {
			redirect('principal','refresh');
		}
		$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
		$premio = array('premio' =>$this->premio_model->get_premio_id($id_premio),
		'anunciante'=>$this->anunciante_model->get_anunciante());
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_anunciante');
		$crud->set_subject('anunciante');
		$output = $crud->render();
		$this->load->view('../../assets/inc/head_common', $output);
		$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
		$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
		$this->load->view('premio/editar',$premio);
		$this->load->view('../../assets/inc/footer_common',$output);
	}
	public function add(){
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_premio');
			$output = $crud->render();
			$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
			$anunciante['anunciante']=$this->anunciante_model->get_anunciante();
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('premio/add',$anunciante);
			$this->load->view('../../assets/inc/menu_lateral_derecho');
			$this->load->view('../../assets/inc/footer_common');
	}
	public function guardar_premio(){
		$id_anunciante=$this->input->post('id_anunciante', TRUE);
		if (!$id_anunciante) {
			redirect('principal','refresh');
		}
		$codigo=$this->input->post('txt_codigo', TRUE);
		$nombre=$this->input->post('txt_nombre', TRUE);
		$descripcion=$this->input->post('txt_descripcion', TRUE);
		$puntaje=$this->input->post('txt_puntaje', TRUE);
		$cantidad=$this->input->post('txt_cantidad', TRUE);
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
			$this->premio_model->guardar_premio($id_anunciante,$codigo, $nombre, $descripcion,$puntaje,$cantidad,$archivo);
			redirect('premio','refresh');
	}
		public function actualizar_premio(){
		$id_premio=$this->input->post('txt_id_premio', TRUE);
		$id_anunciante=$this->input->post('id_anunciante', TRUE);
		$codigo=$this->input->post('txt_codigo', TRUE);
		$nombre=$this->input->post('txt_nombre', TRUE);
		$descripcion=$this->input->post('txt_descripcion', TRUE);
		$puntaje=$this->input->post('txt_puntaje', TRUE);
		$cantidad=$this->input->post('txt_cantidad', TRUE);
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
			$this->premio_model->actualizar_premio($id_premio, $id_anunciante, $codigo, $nombre, $descripcion, $puntaje, $cantidad, $archivo);
			redirect('premio','refresh');
	}

	public function catalogo(){
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('t_premio');
			$output = $crud->render();
			$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
			$premio['premio']=$this->premio_model->get_todos_premios();
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral_lvl_5',datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',datos_usuario);
			$this->load->view('premio/catalogo',$premio);
			$this->load->view('../../assets/inc/menu_lateral_derecho');
			$this->load->view('../../assets/inc/footer_common');
	}
	public function ver_premio(){
			$id_premio=$this->uri->segment(3);
			if ($id_premio) {
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_premio');
				$output = $crud->render();
				$id_usuario=$this->session->userdata('id');
				$usuario=$this->session->userdata('usuario');
				$puntaje=$this->session->userdata('puntaje');
				$data_usuario = array('id' =>$id_usuario,
				'puntaje'=>$puntaje);
				$this->session->set_userdata($data_usuario);
				/*************************/
				$premio['premio']=$this->premio_model->get_premio_id($id_premio);
				$premio['puntaje']=$puntaje;
				$premio['id_usuario']=$id_usuario;
		$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/inc/menu_lateral_lvl_5',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('modal/modal_canje_premio',$premio);
				$this->load->view('premio/ver_premio',$premio);
				$this->load->view('../../assets/inc/menu_lateral_derecho');
				$this->load->view('../../assets/inc/footer_common');
			}else{
				redirect('premio/catalogo','refresh');
			}
	}
	public function canje_premio(){
		/* los datos del usuario */
		$id_premio=$this->input->post('txt_id_premio', TRUE);
		$id_usuario=$this->input->post('txt_id_usuario', TRUE);
		$direccion=$this->input->post('txt_direccion', TRUE);
		$cantidad=$this->input->post('txt_cantidad', TRUE);
		$cantidad_premio=$this->input->post('txt_cantidad_premio', TRUE);
		$puntaje_premio=$this->input->post('txt_puntaje_premio', TRUE);
		$puntaje_usuario=$this->input->post('txt_puntaje_usuario', TRUE);
		$cantidad_nueva=$cantidad_premio-$cantidad;
		$cantidad_punto_restar=$cantidad*$puntaje_premio;
		$nuevo_puntaje_usuario=$puntaje_usuario-$cantidad_punto_restar;
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_premio');
		$output = $crud->render();
		$cero=0;
		$data = array('id_usuario' =>$this->session->userdata('id'),
					'usuario'=>$this->session->userdata('usuario'),
					'id_nivel'=>$this->session->userdata('id_nivel'),
					'puntaje'=>$this->session->userdata('puntaje'),
					'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data['id_usuario']);
		if ($nuevo_puntaje_usuario <= $cero || $cantidad_nueva<= $cero ) {
		$this->load->view('../../assets/inc/head_common',$output);
		$this->load->view('../../assets/inc/menu_lateral_lvl_5',$datos_usuario);
		$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
		$this->load->view('modal/modal_canje_premio');
		$this->load->view('premio/premio_cancelado');
		$this->load->view('../../assets/inc/menu_lateral_derecho');
		$this->load->view('../../assets/inc/footer_common');
		}else{
		$this->premio_model->actualizar_cantidad_premio($id_premio,$cantidad_nueva);
		$this->usuario_model->actualizar_puntaje_usuario($id_usuario,$nuevo_puntaje_usuario);
		$this->load->view('../../assets/inc/head_common',$output);
		$this->load->view('../../assets/inc/menu_lateral_lvl_5'$datos_usuario);
		$this->load->view('../../assets/inc/menu_superior'$datos_usuario);
		$this->load->view('premio/premio_enviado');
		$this->load->view('../../assets/inc/menu_lateral_derecho');
		$this->load->view('../../assets/inc/footer_common');
		}
		}

}
