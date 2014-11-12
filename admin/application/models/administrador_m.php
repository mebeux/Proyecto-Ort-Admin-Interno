<?php

class Administrador_m extends CI_Model {
    
 
    
    
    
    function validarUsuario($nombre,$clave) {
        $param=array($nombre,  $clave);
        $sql = "SELECT count(nombre_operador) AS cant FROM operadores WHERE nombre_operador=? AND clave_operador=md5(?)"; 
        
        $fila = $this->db->query($sql,$param)->row();
       
     if ($fila->cant>0) return true;
     else return false;
}

function traerUsuario($usuario){
    
    
}
    
    
    
}
