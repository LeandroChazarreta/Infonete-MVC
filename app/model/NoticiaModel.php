<?php


class NoticiaModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function crearNoticia($descripcion, $id_tipo_noticia, $id_seccion, $idUsuario)
    {
        $this->conexion->insert("INSERT INTO Noticia(descripcion, id_tipo_noticia, id_seccion, id_usuario) 
                                 VALUES ('$descripcion','$id_tipo_noticia','$id_seccion','$idUsuario')");
    }
}