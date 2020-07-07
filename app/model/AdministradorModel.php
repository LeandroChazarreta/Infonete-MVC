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
    public function updateAutorizar($id,$valor){

        $query = $this->conexion->query("UPDATE publicacion
                                        SET autorizada = '$valor'
                                        WHERE id_publicacion = '$id'");

        $res = count($query);
        if ($res == 1){
            return 1;
        } else {
            return 0;
        }
    }

    public function actualizar($seccion,$id)
    {
        $query=0;
        if ($seccion!="") {
            $query = $this->conexion->query("UPDATE seccion
                                        SET descripcion = '$seccion'
                                        WHERE id_seccion = '$id'");
        }
        $res = count($query);
        if ($res == 1){
            return 1;
        } else {
            return 0;
        }

    }

    public function borrar($id)
    {
            return $this->conexion->query("DELETE FROM  seccion
                                           WHERE id_seccion = '$id'");
    }


   public function borrarUs($id)
    {
        return $this->conexion->query("DELETE FROM  usuario
                                           WHERE id_usuario = '$id'");
    }
}