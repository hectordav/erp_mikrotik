<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ciudad extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_crud');
			$this->load->model('zona_model');
			$this->load->model('equipo_model');
			$this->load->model('usuario_model');
	}
	public function index()
	{
		redirect('ciudad/grilla');
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
			$crud->set_table('t_ciudad');
			$crud->set_subject('Ciudad');
			$crud->set_language('spanish');
			$crud->display_as('id','#');
			$crud->display_as('ciudad','Ciudad');
			$crud->required_fields('ciudad');
			$crud->columns('ciudad');
			$output = $crud->render();
			if ($data['id_nivel']==1 ||$data['id_nivel']==2 ) {
			$this->load->view('../../assets/inc/head_common',$output);
			$this->load->view('../../assets/inc/menu_lateral',$datos_usuario);
			$this->load->view('../../assets/inc/menu_superior',$datos_usuario);
			$this->load->view('ciudad/ciudad',$output);
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
	public function fill_zona(){
         $id_ciudad = $this->input->post('id_ciudad');
        if($id_ciudad){
            $zona = $this->zona_model->get_zona_id($id_ciudad);
           if ($zona) {
           /*haciendo pruebas con el java_script*/

        	foreach($zona as $fila){
        	echo '<script type="text/javascript">';
        /*toma el valor */
        	echo 'function check'. $fila->id.'(){';
        	echo 'if(document.getElementById("todos'. $fila->id.'").checked==true){';
        	echo '$("input[id=algo'. $fila->id.']").each(function(){';
					echo 'this.checked=true;';
					echo '});';/*el del input*/
					echo '}';
			echo 'if(document.getElementById("todos'. $fila->id.'").checked==false){';
        	echo '$("input[id=algo'. $fila->id.']").each(function(){';
					echo 'this.checked=false;';
					echo '});';/*el del input*/
					echo '}';
        	echo '}'; /*el de la funcion*/
        	echo '</script>';
        	echo '<input name="Todos" type="checkbox" value="1" id="todos'. $fila->id.'" onclick="check'. $fila->id.'();"/>&nbsp; &nbsp; <strong>'. $fila->descripcion.'</strong>';
            $id_zona=$fila->id;
            $equipo = $this->equipo_model->get_equipo_id($id_zona);
                foreach ($equipo as $fila_2) {
	                	         /*el nombre debe tener corchetes*/
				echo '<dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="ck" name="equipo[]" id="algo'. $fila->id.'" value="'. $fila_2->equipo_id. '">&nbsp; &nbsp;'. $fila_2->equipo_descripcion. ', Direccion'. $fila_2->equipo_direccion.'</dd>';
	        			}
            	}
           	}else{
           		 echo '<option value="0">Sin Resultados</option>';
           	}
        }else{
            echo '<option value="0">Sin Resultados</option>';
        }
    }
}
