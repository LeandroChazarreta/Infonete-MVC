<?php


class SeccionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function getSeccion($nombreSeccion){

        return $this->conexion->query("SELECT * 
                                       FROM Publicacion pub 
                                       JOIN Tipo_Publicacion tipo_pub ON pub.id_tipo_publicacion = tipo_pub.id_tipo_publicacion
					                   JOIN Seccion sec ON pub.id_seccion = sec.id_seccion
                                       WHERE sec.descripcion = '$nombreSeccion' 
                                       AND pub.autorizada = true");
    }


    public function getSecciones(){

        return $this->conexion->query("SELECT * FROM Seccion");
    }

    public function getSeccionesConSeleccionada($idSeccion){

        $array = $this->conexion->query("SELECT * FROM Seccion");

        foreach ($array as $elemento){
            if ($elemento["id_seccion"] == $idSeccion){
                $datos[] = array('id_seccion' => $elemento["id_seccion"], 'descripcion' => $elemento["descripcion"], 'seleccionada' => true);
            }else{
                $datos[] = array('id_seccion' => $elemento["id_seccion"], 'descripcion' => $elemento["descripcion"], 'seleccionada' => null);
            }
        }

        return $datos;
    }

    public function getPublicacion($id){

        return $this->conexion->query(" SELECT * 
                                        FROM Publicacion p
                                        WHERE p.id_publicacion = $id ");
    }

}