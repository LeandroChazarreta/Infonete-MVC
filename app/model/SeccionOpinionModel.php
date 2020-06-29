<?php


class SeccionOpinionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function getSeccionOpinion(){

        return $this->conexion->query("SELECT * 
                                       FROM Publicacion pub 
                                       JOIN Tipo_Publicacion tipo_pub ON pub.id_tipo_publicacion = tipo_pub.id_tipo_publicacion
					                   JOIN Seccion sec ON pub.id_seccion = sec.id_seccion
                                       WHERE sec.descripcion = 'Opinion' ");
    }

}