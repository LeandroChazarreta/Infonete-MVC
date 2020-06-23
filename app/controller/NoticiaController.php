<?php

class NoticiaController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){
        echo $this->renderer->render( "view/noticiaView.php");
    }


    public function crearNoticia(){

        $descripcion = $_POST["descripcion"];
        $id_tipo_noticia = $_POST["idTipoNoticia"];
        $id_seccion = $_POST["idSeccion"];

        //$idUsuario = $_POST["idUsuario"];


        if (count($descripcion) > 20) {
            $respuesta = $this->model->crearNoticia();

                if ($respuesta != 0){
                    echo "noticia creada con exito";
                } else {
                   echo "no se creó la noticia";
                }
                }






        }
}