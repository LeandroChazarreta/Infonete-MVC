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
        unset($_SESSION['botones']);
        session_destroy();
        switch ($permisos){
            //lector
            case 1: $datos1[] = array('link' => 'logout', 'palabra' => 'Cerrar Sesión');
                break;
            case 2: $datos1[] = array('link' => 'logout', 'palabra' => 'Cerrar Sesión');
                break;
            case 3: $datos1[] = array('link' => 'logout', 'palabra' => 'Cerrar Sesión');
                    $datos1[] = array('link' => 'publicacion', 'palabra' => 'Crear Noticia');
                break;
            case 4: $datos1[] = array('link' => 'logout', 'palabra' => 'Cerrar Sesión');
                    $datos1[] = array('link' => 'publicacion', 'palabra' => 'Crear Noticia');
                    $datos1[] = array('link' => 'administrador', 'palabra' => 'Administrar');
                break;

        }
        $datos[] = array('link' => 'login', 'palabra' => 'Login');
        $datos[] = array('link' => 'registrar', 'palabra' => 'Registrarte');

        return $datos1;
    }

    public function getPublicacionesAutorizadas(){

        return $this->conexion->query(" SELECT * 
                                        FROM Publicacion pub
					                    JOIN Seccion sec ON pub.id_seccion = sec.id_seccion
                                        WHERE pub.autorizada = true ");
    }

}

