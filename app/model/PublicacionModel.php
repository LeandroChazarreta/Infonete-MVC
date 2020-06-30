<?php


class PublicacionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function guardarPublicacion($titulo, $bajada, $idImagen, $epigrafeImagen, $cuerpo, $idTipoPublicacion, $idSeccion, $idUsuario)
    {
        return $this->conexion->insert("INSERT INTO Publicacion (titulo, bajada, id_imagen, epigrafe_imagen, cuerpo, id_tipo_publicacion, id_seccion, id_usuario) 
                                       VALUES ('$titulo', '$bajada', '$idImagen', '$epigrafeImagen','$cuerpo', '$idTipoPublicacion','$idSeccion','$idUsuario')");
    }

    public function getSecciones(){

        return $this->conexion->query("SELECT * FROM Seccion");
    }

    public function getTipoPublicaciones(){

        return $this->conexion->query("SELECT * FROM Tipo_Publicacion");
    }

}