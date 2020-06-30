<?php


class AdministradorModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }


    public function GetNoticias(){
        return $this->conexion->query("SELECT * FROM publicacion p join usuario u on p.id_usuario = u.id_usuario join Seccion s on s.id_seccion = p.id_seccion;");
    }

    public function GetUsuarios(){
        return $this->conexion->query("SELECT * FROM usuario u join permiso p on p.id_permiso = u.id_permiso;");
    }

    public function GetSecciones(){
        return $this->conexion->query("SELECT * FROM Seccion;");
    }



}