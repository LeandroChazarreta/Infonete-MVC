<?php

class PublicacionController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){

        $listaSecciones["secciones"] = $this->model->getSecciones();
        $listaTipoPublicaciones["tipoPublicacion"] = $this->model->getTipoPublicaciones();

        $listas = $listaSecciones + $listaTipoPublicaciones;

        echo $this->renderer->render( "view/crearPublicacionView.php", $listas);
    }

    public function crearPublicacion(){

        $idTipoPublicacion = $_POST["tipoPublicacion"];
        $idSeccion = $_POST["seccion"];
        $titulo = $_POST["titulo"];
        $bajada = $_POST["bajada"];
        $idImagen =1;
        $epigrafeImagen = $_POST["epigrafeImagen"];
        $cuerpo = $_POST["cuerpo"];

        $idUsuario = 4;

        $respuesta = $this->model->guardarPublicacion($titulo, $bajada, $idImagen, $epigrafeImagen,$cuerpo, $idTipoPublicacion, $idSeccion, $idUsuario);

                if ($respuesta == true){
                    echo "Noticia creada con exito";
                } else {
                   echo "No se creó la noticia";
                }
        }
}