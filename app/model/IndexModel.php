<?php


class IndexModel{

    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }
    public function getPublicacionesAutorizadas(){

        return $this->conexion->query(" SELECT * 
                                        FROM Publicacion pub
					                    JOIN Seccion sec ON pub.id_seccion = sec.id_seccion
                                        WHERE pub.autorizada = true ");
    }
}