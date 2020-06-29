<?php

class HomeController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        if (isset($_SESSION['usuario']) /*and isset($_SESSION['permiso'])*/) {

            //echo $_SESSION['permiso'];

            //Arma el menu segun el permiso
            $menu = $this->model->ArmaMenu($_SESSION['permiso']);

           echo $this->renderer->render( "view/homeView.php", array('menu' => $menu));
        } else {
            header("location: http://".$_SERVER['SERVER_NAME']."/Infonete-MVC/app/index");
        }
    }

}