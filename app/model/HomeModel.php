<?php


class HomeModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function ArmaMenu(){
        return $this->conexion->query("select * FROM seccion;");
    }

    public function Botones($permisos){
        switch ($permisos){
            //lector
            case 1: $datos[] = array('link' => 'logout', 'palabra' => 'Cerrar Sesión');
                    $datos[] = array('link' => 'Suscripcion', 'palabra' => 'Suscribirse');
                break;
            case 2: $datos[] = array('link' => 'logout', 'palabra' => 'Cerrar Sesión');
                break;
                //Contenedista
            case 3: $datos[] = array('link' => 'logout', 'palabra' => ('Cerrar Sesión'));
                    $datos[] = array('link' => 'publicacion', 'palabra' => 'Crear Publicacion');
                break;
            case 4: $datos[] = array('link' => 'logout', 'palabra' => 'Cerrar Sesión');
                    $datos[] = array('link' => 'publicacion', 'palabra' => 'Crear Noticia');
                    $datos[] = array('link' => 'administrador', 'palabra' => 'Administrar');
                break;
        }

        return $datos;
    }

    public function getPublicacionesAutorizadas(){

        return $this->conexion->query(" SELECT * 
                                        FROM Publicacion pub
					                    JOIN Seccion sec ON pub.id_seccion = sec.id_seccion
                                        WHERE pub.autorizada = true ");
    }

}

