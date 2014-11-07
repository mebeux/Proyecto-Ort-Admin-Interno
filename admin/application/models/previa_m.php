<?php

class Previa_m extends CI_Model {
    
    var $id;
    var $id_asignatura;
    var $id_plan;
 	var $nombre;
    
    // arreglo que contiene las ID asignaturas de las previas
    var $previas = array();
    
    /*
     * desc devuelve los datos de previas para una asignatura dentro de un
     * determinado plan 
     */
    
    public function get_por_asignatura($idAsignatura,$idPlan) {

        $this->db->select("id_previa, asignatura.nombre_asignatura");
        $this->db->where("id_asignatura",$idAsignatura);
        $this->db->where("id_plan",$idPlan);
 $this->db->join('asignaturas', 'asignaturas.id_asignatura = plan_asignaturas.id_asignatura');
        $cmd=$this->db->get("plan_asignaturas");
        
        if ($cmd->num_rows>0) {
            return $this->get($cmd->row()->id_previa);
        }
        return NULL;
    }

    
    public function get($id) {
    
        $sql = "SELECT p.id_previa AS id, p.id_asignatura,
                    id_asignatura_previa AS id_previa,
                    asig.nombre_asignatura as nombre_previa
                    FROM previas p
                    INNER JOIN previas_asignaturas a
                    ON p.id_previa = a.id_previa
                    INNER JOIN asignaturas asig
                    ON a.id_asignatura_previa = asig.id_asignatura
                    WHERE p.id_previa = ?";
        
        $param = array($id);
        
        $cmd = $this->db->query($sql,$param);

        if ($cmd->num_rows>0) {

            $flag = TRUE;
            
            $salida = new Previa_m();
            $aux = array();
            
            foreach($cmd->result() as $fila) {
            
                if ($flag) {
                    $salida->id = $fila->id;
                    $salida->id_asignatura = $fila->id_asignatura;
					$salida->nombre=$fila->nombre_previa;
                    $flag = FALSE;
                }
              
                $aux[] = array("id"=>$fila->id_previa, "nombre"=>$fila->nombre_previa);
            
            }
            
            $salida->previas = $aux;
            
            return $salida;
        }       
        
        return NULL;
        
    }
    
    public function get_previas() {
        return $this->previas;
    }
    
    
    public function get_por_asignatura_edicion($idAsignatura,$idPlan,$anioEdicion) {

        $this->db->select("id_previa");
        $this->db->where("id_asignatura",$idAsignatura);
        $this->db->where("id_plan",$idPlan);
        $this->db->where("anio_edicion",$anioEdicion);
        $cmd=$this->db->get("edicion");
        
        if ($cmd->num_rows>0) {
            return $this->get($cmd->row()->id_previa);
        }
        return NULL;
    }
    
    public function get_previas_completas() {

        $salida = array();
        
        foreach($this->previas as $previa) {

            $salida[] = $previa;
            
            $this->load->model("previa_m");
            
            $aux = $this->previa_m->get($previa);
            
            if (!empty($aux)) {
                $salida = array_merge($salida,$aux->get_previas_completas());
            }    
        }
        
        return $salida;
    }
    
    public function get_todo() {
        
        $sql = "SELECT idPlan FROM planes";
        
    }

    /*
     * Desc determina si una asignatura ya está en la lista de previas 
     */
    public function es_previa($idAsignatura) {
        $previas = $this->get_previas_completas();
        return in_array($idAsignatura,$previas);
    }
    
    public function to_array() {
        return $this->get_previas();
    }
    
    
}
