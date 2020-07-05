<?php


class SuscripcionController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){
        $data['menu'] = $_SESSION['menu'];
        echo $this->renderer->render( "view/SuscripcionView.php", $data );

    }


}