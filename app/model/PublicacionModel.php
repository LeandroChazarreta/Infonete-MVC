<?php


class PublicacionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function guardarPublicacion($titulo, $bajada, $epigrafeImagen, $cuerpo,
                                       $idTipoPublicacion, $idSeccion, $idUsuario){

        return $this->conexion->insert("INSERT INTO Publicacion (titulo, bajada, id_imagen, epigrafe_imagen, cuerpo, 
                                                                id_tipo_publicacion, id_seccion, id_usuario) 
                                       VALUES ('$titulo', '$bajada', null, '$epigrafeImagen','$cuerpo', 
                                                '$idTipoPublicacion','$idSeccion',
                                                '$idUsuario')");

    }

    public function consultarIdPublicacion($titulo, $bajada, $epigrafeImagen){
        return $this->conexion->query("SELECT p.id_publicacion
                                        FROM Publicacion p
                                        WHERE p.titulo = '$titulo'
                                        AND p.bajada = '$bajada'
                                        AND p.epigrafe_imagen = '$epigrafeImagen'");
    }

    public function guardarIdImagen($idImagen)
    {
        $query = $this->conexion->query("UPDATE Publicacion
                                        SET id_imagen = '$idImagen'
                                        WHERE id_publicacion = '$idImagen'");

        return $query;
    }

    public function validarPublicacion($publicacion){

        $error=0;

        if($publicacion["tipoPublicacion"] == null){
            $error++;
        }
        if($publicacion["seccion"] == null){
          $error++;
        }
        if(count($publicacion["titulo"]) < 5){
           $error ++;
        }
        if($publicacion["bajada"] < 5){
            $error++;
        }
        if ($this->validarImagenPublicacion($publicacion["imagenNombre"])){
            $error++;
        }
        if($publicacion["epigrafeImagen"]){
            $error++;
        }
        if( $publicacion["cuerpo"] < 50){
            $error++;
        }

        if ($error == 0){
            return true;
        }
        return false;
    }

    public function validarImagenPublicacion($nombre){

        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } else {
            $_FILES["file"]["name"] = $nombre . "." . pathinfo($_FILES["file"]["name"], 4);
            echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            echo "Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            echo "Stored in: " . $_FILES["file"]["tmp_name"];
            if (file_exists("img/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " ya existe. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "img/" . $_FILES["file"]["name"]);
                echo "Almacenado en: " . "img/" . $_FILES["file"]["name"];
            }
        }
    }

    public function getTipoPublicaciones(){

        return $this->conexion->query("SELECT * FROM Tipo_Publicacion");
    }

}