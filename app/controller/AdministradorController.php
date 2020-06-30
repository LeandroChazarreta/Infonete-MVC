<?php


class AdministradorController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
    $this->renderer = $renderer;
    $this->model = $model;
}

    public function index(){
        echo $this->renderer->render( "view/AdministradorView.php");
    }


}