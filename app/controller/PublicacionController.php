<?php

class PublicacionController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){
        $array["secciones"] = $this->model["seccionModel"]->getSecciones();
        $array["tipoPublicacion"] = $this->model["publicacionModel"]->getTipoPublicaciones();
        $array['menu'] = $_SESSION['menu'];

        echo $this->renderer->render( "view/publicacionView.php", $array);
    }

    public function crearPublicacion(){

        $array["secciones"] = $this->model["seccionModel"]->getSecciones();
        $array["tipoPublicacion"] = $this->model["publicacionModel"]->getTipoPublicaciones();
        $array['menu'] = $_SESSION['menu'];

        if (isset($_GET["error"])){
            $array["error"] = $_GET["error"];
        }

        echo $this->renderer->render( "view/crearPublicacionView.php", $array);
    }

    public function publicacionCreada(){
        echo $this->renderer->render( "view/publicacionCreadaView.php");
    }

    public function validarPublicacion(){

        $publicacion = $_POST;
        $publicacion["imagenNombre"] = "50";
        $validarPublicacion =  $this->model["publicacionModel"]->validarPublicacion($publicacion);
        if ($validarPublicacion != true) {
            $error = "Publicacion Inválida";
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/publicacion/crearPublicacion?error=$error");
            exit();
        }

        $idTipoPublicacion = $_POST["tipoPublicacion"];
        $idSeccion = $_POST["seccion"];
        $titulo = $_POST["titulo"];
        $bajada = $_POST["bajada"];
        $epigrafeImagen = $_POST["epigrafeImagen"];
        $cuerpo = $_POST["cuerpo"];

        $mail = $_SESSION['usuario'];
        $idUsuario = $this->model["usuarioModel"]->consultarIdUsuarioPorMail($mail);
        $idUsuario = $idUsuario[0];
        $idUsuario = $idUsuario["id_usuario"];

        $guardarPublicacion = $this->model["publicacionModel"]->guardarPublicacion($titulo, $bajada, $epigrafeImagen,
                                                                $cuerpo, $idTipoPublicacion, $idSeccion, $idUsuario);

        if ($guardarPublicacion == true){
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/publicacion/publicacionCreada");
            exit();
        } else {
            $error = "No se pudo guardar la publicación";
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/publicacion/crearPublicacion?error=$error");
            exit();
        }
    }


}