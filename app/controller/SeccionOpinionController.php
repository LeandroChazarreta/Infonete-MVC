<?php


class SeccionOpinionController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){

        $listaSeccionOpinion["seccionOpinion"] = $this->model->getSeccionOpinion();

        echo $this->renderer->render( "view/seccionOpinionView.php", $listaSeccionOpinion);
    }
}