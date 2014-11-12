<?php

if (!function_exists("fecha_anio")) {
    
    function fecha_anio($fecha) {
        
        $anio = "";
        if (strlen($fecha)==6) {
            $anio = substr($fecha,0,4);
        }
        return $anio;

    } 
    
}

if (!function_exists("mes_letra")) {
    
    function mes_letra($mes) {
        
        $salida = "";
       if($mes==1){
           $salida="Enero";
       } if($mes==2){
           $salida="Febrero";
       } if($mes==3){
           $salida="Marzo";
       } if($mes==4){
           $salida="Abril";
       } if($mes==5){
           $salida="Mayo";
       } if($mes==6){
           $salida="Junio";
       } if($mes==7){
           $salida="Julio";
       } if($mes==8){
           $salida="Agosto";
       } if($mes==9){
           $salida="Setiembre";
       } if($mes==10){
           $salida="Octubre";
       } if($mes==11){
           $salida="Noviembre";
       } if($mes==12){
           $salida="Diciembre";
       }
        return $salida;

    } 
    
}