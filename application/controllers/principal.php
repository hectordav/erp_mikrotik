<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
	public function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->library('googlemaps');
			$this->load->model('cliente_model');
			$this->load->model('conexion_model');
			$this->load->model('equipo_model');
			$this->load->model('anunciante_model');
			$this->load->model('premio_model');
			$this->load->config('map');
			$this->load->model('usuario_model');
			// latitud y longitud.
			$this->def_lat=$this->config->item('default_lat');
			$this->def_lng=$this->config->item('default_lng');

	}
	public function index(){
		if ($this->session->userdata('logueado')) {
			$data_u = array('id_usuario' =>$this->session->userdata('id'),
					  'usuario'=>$this->session->userdata('usuario'),
					  'id_nivel'=>$this->session->userdata('id_nivel'),
					  'puntaje'=>$this->session->userdata('puntaje'),
					  'imagen'=>$this->session->userdata('imagen'));
				$crud = new grocery_CRUD();
			$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data_u['id_usuario']);
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$output = $crud->render();
/************************la parte del GMaps*****************************************/
		$center=$this->def_lat.",".$this->def_lng;
		$cfg=array(
		'class'			=>'map-canvas',
		'map_div_id'	=>'map-canvas',
		'center'		=>$center,
		'zoom'			=>'10',
		'map_type'	    =>'ROADMAP',
		'map_width'=>'1070px',
		'map_height'=>'400px'		,
		'places'		=>TRUE,
		'placesAutocompleteInputID'	=>'cari',
		'placesAutocompleteBoundsMap'	=>TRUE,
		'placesAutocompleteOnChange'	=>'showmap();'
		);
		$this->googlemaps->initialize($cfg);
		$lat_long_equipo=$this->equipo_model->get_lat_long_equipo();
/***********toma la latitud y la longitud de los equipos para el mapa*******/
		foreach ($lat_long_equipo as $data) {
			$marker=array(
		'position'		=>$center,
		'draggable'		=>false,
		'title'			=>$data->direccion,
		'animation' => 'DROP',
		'infowindow_content'=>$data->direccion,
        'icon'=> base_url().'assets/img/bc_z.png',
        'position'=>$data->lat.','.$data->long
		);
		$this->googlemaps->add_marker($marker);
		}
/*********************************cierra el foreach*************************/
/*******************************cierra lo del Gmaps*************************/
		/***********tomamos el mes en curso y le sumamos un mes*********************/
		$mes=date('m');
		$ano=date('Y');
		$fecha_i= date('Y-m-d', mktime(0,0,0, $mes, 1, $ano));
		$fecha_f=date('Y-m-d', mktime(0,0,0, $mes+1, 0, $ano));
		$fecha_ano_anterior=date('Y-m-d', mktime(0,0,0, $mes-12, 0, $ano));

		$fecha_f_mes_aterior=date('Y-m-d', mktime(0,0,0, $mes-1, 0, $ano));
		/***************************************************************************/
		$fecha_hoy = date('Y-m-d');
		/**********************************lo del chart************************/
		$contar_conexion=$this->conexion_model->contar_conexion_entre_fechas($fecha_i, $fecha_f);
		$contar_conexion_mes['mes']=$this->conexion_model->contar_conexion_mes($fecha_i, $fecha_f);

		if ($contar_conexion) {

			foreach ($contar_conexion->result() as $data) {
			$fecha = date("d-m-Y", strtotime($data->fecha));
			$series_data1[] = $fecha;
			$series_data2[] =(real)$data->total;
			}
			$this->view_data['series_data1']=json_encode($series_data1);
			$this->view_data['series_data2']=json_encode($series_data2);
		}else{
			$series_data1[] =0;
			$series_data2[] =0;
			$this->view_data['series_data1']=json_encode($series_data1);
			$this->view_data['series_data2']=json_encode($series_data2);
		}
	/************************las conexiones por equipo***********************/
		$contar_conexion_por_equipo=$this->conexion_model->contar_conexion_equipo();
		if ($contar_conexion_por_equipo) {
			foreach ($contar_conexion_por_equipo->result() as $data) {
			$series_data3[] = $data->nombre_equipo;
			$series_data4[] =(real)$data->total;
			}

			$this->view_data['series_data3']=json_encode($series_data3);
			$this->view_data['series_data4']=json_encode($series_data4);
		}else{
			$series_data3[] =0;
			$series_data4[] =0;
			$this->view_data['series_data3']=json_encode($series_data3);
			$this->view_data['series_data4']=json_encode($series_data4);
		}


		/**********************************************************************/
		/************************las conexiones por año************************/
			$contar_conexion_por_ano=$this->conexion_model->contar_conexion_ano($fecha_i, $fecha_ano_anterior);

			if ($contar_conexion_por_ano) {
				foreach ($contar_conexion_por_ano->result() as $data) {
				$fecha = date("m-y", strtotime($data->fecha));

				$series_data5[] = $fecha;
				$series_data6[] =(real)$data->total;
				}


				$this->view_data['series_data5']=json_encode($series_data5);
				$this->view_data['series_data6']=json_encode($series_data6);
			}else{
				$series_data5[] =0;
				$series_data6[] =0;
				$this->view_data['series_data5']=json_encode($series_data5);
				$this->view_data['series_data6']=json_encode($series_data6);
			}

		/**********************************************************************/
		/************************las conexiones por hora***********************/
			$contar_conexion_por_hora=$this->conexion_model->contar_conexion_hora($fecha_i, $fecha_ano_anterior);

			if ($contar_conexion_por_hora) {
				foreach ($contar_conexion_por_hora->result() as $data) {
				$exploto=explode(":",$data->hora);
				$series_data7[] =$data->hora;
				$series_data8[] =(real)$data->total;
				}
				$this->view_data['series_data7']=json_encode($series_data7);
				$this->view_data['series_data8']=json_encode($series_data8);
			}else{
				$series_data7[] =0;
				$series_data8[] =0;
				$this->view_data['series_data7']=json_encode($series_data7);
				$this->view_data['series_data8']=json_encode($series_data8);
			}

		/**********************************************************************/
		/***********************************************************************/


		$data_panel = array('contar_cliente' =>$this->cliente_model->contar_cliente_reg(),
		'contar_conexion'=>$this->conexion_model->contar_conexion_reg(),
		'contar_equipo'=>$this->equipo_model->contar_equipo(),
		'contar_anunciante'=>$this->anunciante_model->contar_anunciante(),
		/******************crea el mapa************/
		'map' =>$this->googlemaps->create_map()
		/******************************************/
		);
/*las pantallas*/
	if ($data_u['id_nivel']==1 ||$data_u['id_nivel']==2 ) {
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/script/script_gmap',$data_panel);
				$this->load->view('../../assets/script/script_grafico_data',$this->view_data);
				$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
				$this->load->view('principal/principal',$contar_conexion_mes);
				$this->load->view('../../assets/inc/menu_lateral_derecho');
				$this->load->view('../../assets/inc/footer_common',$output);
			}elseif($data_u['id_nivel']==3 ||$data_u['id_nivel']==4){
				$this->load->view('../../assets/inc/head_common',$output);
				$this->load->view('../../assets/script/script_gmap',$data_panel);
				$this->load->view('../../assets/script/script_grafico_data',$this->view_data);
				$this->load->view('../../assets/inc/menu_lateral_lvl_3',$datos_usuario);
				$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
					$this->load->view('principal/principal_lvl_3',$contar_conexion_mes);
				$this->load->view('../../assets/inc/menu_lateral_derecho');
				$this->load->view('../../assets/inc/footer_common',$output);
			}elseif($data_u['id_nivel']==5){
				redirect('principal/p_u_f','refresh');
/********************/
			}
		}else{
			redirect('acceso_usuario','refresh');
		}
	}
	public function p_u_f(){
		$crud = new grocery_CRUD();
		$crud->set_theme('bootstrap');
		$crud->set_table('t_usuario');
		$output = $crud->render();
		$ultimo_premio_buscar=$this->premio_model->get_ultimo_premio();
		$data_u = array('id_usuario' =>$this->session->userdata('id'),
					  'usuario'=>$this->session->userdata('usuario'),
					  'id_nivel'=>$this->session->userdata('id_nivel'),
					  'puntaje'=>$this->session->userdata('puntaje'),
					  'imagen'=>$this->session->userdata('imagen'));
		$datos_usuario['datos_usuario_2']=$this->usuario_model->buscar_datos_usuario($data_u['id_usuario']);
		if ($ultimo_premio_buscar) {
			foreach ($ultimo_premio_buscar->result() as $key) {
				$id_ultimo_premio=$key->id;
			}
		$buscar_ultimo_premio=$this->premio_model->get_premio_id($id_ultimo_premio);
		$buscar_premio_diferente=$this->premio_model->get_premio_diferente($id_ultimo_premio);
		$data_panel = array('ultimo_premio' =>$this->premio_model->get_premio_id($id_ultimo_premio),
			'premio_diferente'=>$this->premio_model->get_premio_diferente($id_ultimo_premio));
		}else{
			$data_panel = array('ultimo_premio' =>null,
			'premio_diferente'=>null);
		}

		/******************crea el mapa************/
	/*	'map' =>$this->googlemaps->create_map();*/
		/******************************************/

		$this->load->view('../../assets/inc/head_common_principal_usuario_final',$output);
		$this->load->view('../../assets/inc/menu_lateral_lvl_5',$datos_usuario);
		$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
		$this->load->view('principal/principal_lvl_5',$data_panel);
		$this->load->view('../../assets/inc/menu_lateral_derecho');
		$this->load->view('../../assets/inc/footer_common',$output);
	}
}