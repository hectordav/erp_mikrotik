<?php
class Conexion_model extends CI_Model{
    //put your code here

    public function contar_conexion_reg(){
            $this->db->from('t_conexion');
            return $this->db->count_all_results();
    }
    public function contar_conexion_entre_fechas($fecha_i, $fecha_f){
			$this->db->select('fecha as fecha, COUNT(id) as total');
			$this->db->group_by('fecha');
      $this->db->where('fecha >=',$fecha_i);
      $this->db->where('fecha <=',$fecha_f);
      $consulta=$this->db->get('t_conexion');
     if ($consulta->num_rows()>0) {
              return $consulta;
              }else{
              return false;
              }
        }
        public function contar_conexion_mes($fecha_i, $fecha_f){
      $this->db->where('fecha >=',$fecha_i);
      $this->db->where('fecha <=',$fecha_f);
      $this->db->from('t_conexion');
            return $this->db->count_all_results();
          }

     public function contar_conexion_equipo(){
			$this->db->select('t_equipo.descripcion as nombre_equipo, COUNT(t_conexion.id) as total');
			$this->db->join('t_equipo', 't_conexion.id_equipo = t_equipo.id', 'left');
			$this->db->group_by('t_conexion.id_equipo');
			$this->db->order_by('total', 'asc');
      $consulta=$this->db->get('t_conexion');
           if ($consulta->num_rows()>0) {
                    return $consulta;
                    }else{
                    return false;
                    }
        }
		public function contar_conexion_ano($fecha_i,$fecha_ano_anterior){
			$this->db->select('t_conexion.fecha as fecha, COUNT(t_conexion.id) as total');
			$this->db->join('t_equipo', 't_conexion.id_equipo = t_equipo.id', 'left');
			$this->db->group_by('month(t_conexion.fecha)');
			$this->db->order_by('total', 'desc');
			$this->db->where('fecha >=',$fecha_ano_anterior);
      $this->db->where('fecha <=',$fecha_i);
      $consulta=$this->db->get('t_conexion');
           if ($consulta->num_rows()>0) {
                    return $consulta;
                    }else{
                    return false;
                    }
        }
      public function contar_conexion_hora($fecha_i,$fecha_ano_anterior){
			$this->db->select('t_conexion.hora as hora, COUNT(t_conexion.id) as total', false);
			$this->db->join('t_equipo', 't_conexion.id_equipo = t_equipo.id', 'left');
			$this->db->group_by('t_conexion.hora');
			$this->db->order_by('t_conexion.hora', 'asc');
			$this->db->where('fecha >=',$fecha_ano_anterior);
      $this->db->where('fecha <=',$fecha_i);
      $consulta=$this->db->get('t_conexion');
           if ($consulta->num_rows()>0) {
                    return $consulta;
                    }else{
                    return false;
                    }
        }
       public function buscar_conexion_cliente($id_cliente){
          $this->db->select('t_equipo.descripcion as equipo, t_conexion.fecha as fecha,t_conexion.hora as hora');
          $this->db->join('t_equipo', 't_conexion.id_equipo = t_equipo.id', 'left');
          $this->db->group_by('t_conexion.hora');
          $this->db->order_by('t_conexion.fecha', 'desc');
          $this->db->where('t_conexion.id_cliente',$id_cliente);
          $consulta=$this->db->get('t_conexion');
               if ($consulta->num_rows()>0) {
                        return $consulta;
                        }else{
                        return false;
                        }
        }

}