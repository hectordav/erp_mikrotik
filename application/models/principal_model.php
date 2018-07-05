<?php
    class Principal_model extends CI_Model {

    function __construct()
    {
         parent::__construct();
    }

        public function contar_reservaciones_entre_fechas($fecha_i, $fecha_f){
			$this->db->select('inicio as fecha, COUNT(id) as total');
			$this->db->group_by('fecha');
            $this->db->where('inicio >=',$fecha_i);
            $this->db->where('inicio <=',$fecha_f);
            $query=$this->db->get('t_reservacion');
           if ($query->num_rows()>0) {
                    return $query;
                    }else{
                    return false;
                    }
        }
        public function contar_reservaciones_entre_fechas_status_nuevo($fecha_i, $fecha_f){
        	$status=1;
			$this->db->select('COUNT(id) as total');
            $this->db->where('id_status',$status);
            $this->db->where('inicio >=',$fecha_i);
            $this->db->where('inicio <=',$fecha_f);
            $query=$this->db->get('t_reservacion');
           if ($query->num_rows()>0) {
                    return $query;
                    }else{
                    return false;
                    }
        }
         public function contar_reservaciones_entre_fechas_status_confirmado($fecha_i, $fecha_f){
			$status=2;
			$this->db->select('COUNT(id) as total');
            $this->db->where('id_status',$status);
            $this->db->where('inicio >=',$fecha_i);
            $this->db->where('inicio <=',$fecha_f);
            $query=$this->db->get('t_reservacion');
           if ($query->num_rows()>0) {
                    return $query;
                    }else{
                    return false;
                    }
        }
         public function contar_reservaciones_entre_fechas_status_auditado($fecha_i, $fecha_f){
			$status=3;
			$this->db->select('COUNT(id) as total');
            $this->db->where('id_status',$status);
            $this->db->where('inicio >=',$fecha_i);
            $this->db->where('inicio <=',$fecha_f);
            $query=$this->db->get('t_reservacion');
           if ($query->num_rows()>0) {
                    return $query;
                    }else{
                    return false;
                    }
        }
         public function contar_cta_corriente_status_sin_procesar(){
			$status=1;
			$this->db->select('COUNT(ID) as total');
            $this->db->where('ID_STATUS_CTA_CORRIENTE',$status);
            $query=$this->db->get('t_cuenta_corriente');
           if ($query->num_rows()>0) {
                    return $query;
                    }else{
                    return false;
                    }
        }
          public function contar_clientes(){
            $this->db->from('t_cliente');
            return $this->db->count_all_results();
        }
         public function contar_habitacion_ocupadas(){
            $status=2;
            $this->db->from('t_habitacion');
            $this->db->where('id_status_hab',$status);
            return $this->db->count_all_results();
        }
         public function contar_reservacion_salida($fecha_hoy){
            $status=4;
            $this->db->from('t_reservacion');
            $this->db->where('id_status', $status);
            $this->db->where('fin',$fecha_hoy);
            return $this->db->count_all_results();
        }
        public function contar_productos(){
            $this->db->from('t_inventario_prod');
            return $this->db->count_all_results();
        }
        public function contar_cta_corriente_status_procesado(){
			$status=2;
			$this->db->select('COUNT(ID) as total');
            $this->db->where('ID_STATUS_CTA_CORRIENTE',$status);
            $query=$this->db->get('t_cuenta_corriente');
           if ($query->num_rows()>0) {
                    return $query;
                    }else{
                    return false;
                    }
        }

        public function contar_facturas_entre_fechas($fecha_i, $fecha_f){
			$this->db->select('FECHA as fecha, SUM(TOTAL) as total');
			$this->db->group_by('fecha');
            $this->db->where('FECHA >=',$fecha_i);
            $this->db->where('FECHA <=',$fecha_f);
            $query=$this->db->get('t_factura');
           if ($query->num_rows()>0) {
                    return $query;
                    }else{
                    return false;
                    }
        }
         public function contar_cta_corriente_status_sin_procesar_panel(){
            $status=1;
            $this->db->select('COUNT(ID) as total');
            $this->db->where('ID_STATUS_CTA_CORRIENTE',$status);
            $this->db->get('t_cuenta_corriente');
             return $this->db->count_all_results();
        }

}

?>