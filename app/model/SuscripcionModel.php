<?php


class SuscripcionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function ActualizaSuscripcion(){
        $user = $_SESSION['usuario'];

        return $this->conexion->insert("UPDATE usuario
                                        SET id_permiso = '2'
                                        WHERE mail = '$user'");
    }

}