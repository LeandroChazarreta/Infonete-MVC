<?php


class SeccionController
{  private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){
        $nombreSeccion = $_GET["action"];

        $listaSeccion["seccion"] = $this->model->getSeccion($nombreSeccion);

        echo $this->renderer->render("view/seccionView.php", $listaSeccion);
    }
}