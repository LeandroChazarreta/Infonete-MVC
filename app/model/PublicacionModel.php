<?php


class PublicacionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function guardarPublicacion($titulo, $bajada, $imagen, $epigrafeImagen, $cuerpo,
                                       $idTipoPublicacion, $idSeccion, $idUsuario, $fecha){

        return $this->conexion->insert("INSERT INTO Publicacion (titulo, bajada, imagen, epigrafe_imagen, cuerpo, 
                                                                id_tipo_publicacion, id_seccion, id_usuario, fecha) 
                                       VALUES ('$titulo', '$bajada', '$imagen', '$epigrafeImagen','$cuerpo', 
                                                '$idTipoPublicacion','$idSeccion',
                                                '$idUsuario', '$fecha')");

    }

    public function actualizarPublicacion($titulo, $bajada, $imagen, $epigrafeImagen, $cuerpo,
                                          $idTipoPublicacion, $idSeccion, $idUsuario, $fecha, $idPublicacion)
    {
        $query = $this->conexion->query("UPDATE Publicacion
                                        SET titulo = '$titulo', bajada = '$bajada', imagen ='$imagen', 
                                        epigrafe_imagen ='$epigrafeImagen', cuerpo ='$cuerpo', 
                                        id_tipo_publicacion = '$idTipoPublicacion', id_seccion = '$idSeccion', 
                                        id_usuario = '$idUsuario', fecha = '$fecha'
                                        WHERE id_publicacion = '$idPublicacion'");

        $res = count($query);
        if ($res == 0){
            return 1;
        } else {
            return 0;
        }

    }

    public function getPublicacionPorId($idPublicacion){
        return $this->conexion->query("SELECT *
                                        FROM Publicacion p
                                        WHERE p.id_publicacion = '$idPublicacion'");
    }

    public function getPublicacionesDelContenedista($idContenedista){

        return $this->conexion->query("SELECT *
                                        FROM Publicacion p
                                        WHERE p.id_usuario = '$idContenedista'");

    }

    public function consultarIdPublicacion($titulo, $bajada, $epigrafeImagen){
        return $this->conexion->query("SELECT p.id_publicacion
                                        FROM Publicacion p
                                        WHERE p.titulo = '$titulo'
                                        AND p.bajada = '$bajada'
                                        AND p.epigrafe_imagen = '$epigrafeImagen'");
    }

    public function validarPublicacion($publicacion){

        $error = null;

        if($publicacion["tipoPublicacion"] == null){
            $error = "No ha elejido un tipo de publicación.";
        }
        if($publicacion["seccion"] == null){
            $error .= ' No ha elejido una sección.';
        }
        if(strlen($publicacion["titulo"]) < 5){
            $error .= " Titulo de menos de 5 letras.";
        }
        if(strlen($publicacion["bajada"]) < 8){
            $error .= " Bajada de menos de 8 letras. ";
        }
        if(strlen($publicacion["epigrafeImagen"]) < 8){
            $error .= " Epigrafe de menos de 8 letras.";
        }
        if( strlen($publicacion["cuerpo"]) < 8){
            $error .= " Cuerpo de menos de 8 letras.";
        }

        return $error;
    }

    public function validarImagenPublicacion($nombre, $file){

        $_FILES = $file;
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
            return false;
        } else {
            $_FILES["file"]["name"] = $nombre . "." . pathinfo($_FILES["file"]["name"], 4);
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Stored in: " . $_FILES["file"]["tmp_name"];
            if (file_exists("view/img/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " ya existe. ";
                return false;
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "view/img/" . $_FILES["file"]["name"]);
                echo "Almacenado en: " . "view/img/" . $_FILES["file"]["name"];
                return $_FILES["file"]["name"];
            }
        }
    }

    public function getTipoPublicaciones(){

        return $this->conexion->query("SELECT * FROM Tipo_Publicacion");
    }

    public function armarNombreImagen($titulo, $fecha)
    {
     return $nombreImagen =   $titulo . "-" . $fecha;
    }

    public function armarFormatoFecha($fecha)
    {
        return $fecha =   $fecha["year"] . "-" . $fecha["mon"] . "-"
            . $fecha["wday"] . "-" . $fecha["hours"] . "-" . $fecha["minutes"] . "-"
            . $fecha["seconds"];
    }

    public function armarFormatoFechaBD($fecha)
    {
        return $fecha =   $fecha["year"] . "-" . $fecha["mon"] . "-"
            . $fecha["wday"] . " " . $fecha["hours"] . ":" . $fecha["minutes"] . ":"
            . $fecha["seconds"];
    }
}