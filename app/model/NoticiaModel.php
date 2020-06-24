<?php


class NoticiaModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function guardarNoticia($titulo, $bajada, $idImagen, $epigrafeImagen,$cuerpo, $idTipoNoticia, $idSeccion, $idUsuario)
    {
        return $this->conexion->insert("INSERT INTO Noticia(titulo, bajada, id_imagen, epigrafe_imagen, cuerpo, id_tipo_noticia, id_seccion, id_usuario) 
                                       VALUES ('$titulo', '$bajada', '$idImagen', '$epigrafeImagen','$cuerpo', '$idTipoNoticia','$idSeccion','$idUsuario')");
    }

    public function getSecciones(){

        return $this->conexion->query("SELECT * FROM Seccion");
    }

    public function getTipoNoticias(){

        return $this->conexion->query("SELECT * FROM Tipo_Noticia");
    }
}