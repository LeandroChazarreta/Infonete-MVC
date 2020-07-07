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
    public function getTipoPublicaciones(){

        return $this->conexion->query("SELECT * FROM Tipo_Publicacion");
    }

// FAALTA
    public function GetReporte(){
        $tipoNoticia = $_POST["tipoPublicacion"];
        $tipoSeccion = $_POST["seccion"];
        return $this->conexion->query("SELECT DISTINCT tp.descripcion as tipo, sc.descripcion seccion, pb.titulo,pb.cuerpo
                                       FROM publicacion pb JOIN 
                                       seccion sc ON
                                       sc.id_seccion=pb.id_seccion
                                       JOIN tipo_publicacion tp ON
                                       tp.id_tipo_publicacion = pb.id_tipo_publicacion
                                       WHERE 
                                           1 = 1
                                           AND tp.id_tipo_publicacion = '$tipoNoticia'
                                           AND sc.id_seccion = '$tipoSeccion'");

    }


}