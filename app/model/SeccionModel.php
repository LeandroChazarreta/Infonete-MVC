<?php


class SeccionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function getSecciones(){

        return $this->conexion->query("SELECT * FROM Seccion");
    }

}