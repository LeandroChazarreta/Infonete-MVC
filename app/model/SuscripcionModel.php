<?php


class SuscripcionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function ObtenerFecha()
    {
        for ($i=1; $i<=12; $i++) {
           $datos[$i]=$i;
        }
       return $datos;
    }

    public function ObtenerAño(){
        for($i = 1950 ; $i < date('Y'); $i++){
            $datos=array('mes' => $i);
        }
        return $datos;
    }
}