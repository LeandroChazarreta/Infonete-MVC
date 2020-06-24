<?php

class NoticiaController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){

        $listaSecciones["secciones"] = $this->model->getSecciones();
        $listaTipoNoticias["tipoNoticias"] = $this->model->getTipoNoticias();

        $listas = $listaSecciones + $listaTipoNoticias;

        echo $this->renderer->render( "view/noticiaView.php", $listas);
    }

    public function crearNoticia(){

        $idTipoNoticia = $_POST["tipoNoticia"];
        $idSeccion = $_POST["seccion"];
        $titulo = $_POST["titulo"];
        $bajada = $_POST["bajada"];
        $idImagen =1;
        $epigrafeImagen = $_POST["epigrafeImagen"];
        $cuerpo = $_POST["cuerpo"];

        $idUsuario = 4;

        $respuesta = $this->model->guardarNoticia($titulo, $bajada, $idImagen, $epigrafeImagen,$cuerpo, $idTipoNoticia, $idSeccion, $idUsuario);

                if ($respuesta == true){
                    echo "Noticia creada con exito";
                } else {
                   echo "No se creó la noticia";
                }
        }
}