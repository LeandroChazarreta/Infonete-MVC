<?php

class PublicacionController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){
        $listas["secciones"] = $this->model["seccionModel"]->getSecciones();
        $listas["tipoPublicacion"] = $this->model["publicacionModel"]->getTipoPublicaciones();
        $listas['menu'] = $_SESSION['menu'];

        echo $this->renderer->render( "view/crearPublicacionView.php", $listas);
    }

    public function creacionExitosa(){
        echo $this->renderer->render( "view/publicacionCreadaView.php");
    }

    public function validarPublicacion(){

        $idTipoPublicacion = $_POST["tipoPublicacion"];
        $idSeccion = $_POST["seccion"];
        $titulo = $_POST["titulo"];
        $bajada = $_POST["bajada"];
        $idImagen = null;
        $epigrafeImagen = $_POST["epigrafeImagen"];
        $cuerpo = $_POST["cuerpo"];

        $mail = $_SESSION['usuario'];

        $idUsuario = $this->model->consultarIdUsuarioPorMail($mail);

        $respuesta = $this->model->guardarPublicacion($titulo, $bajada, $idImagen, $epigrafeImagen,$cuerpo, $idTipoPublicacion, $idSeccion, $idUsuario);

                if ($respuesta == true){
                   echo $this->creacionExitosa();
                } else {
                    echo $this->index();
                }
        }


}