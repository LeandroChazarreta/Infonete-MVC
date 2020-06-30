<?php

class HomeController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        echo $_SESSION['usuario'], $_SESSION['permiso'];
        if (isset($_SESSION['usuario']) and isset($_SESSION['permiso'])) {

            //Arma el menu segun el permiso
            $data['menu'] = $this->model->ArmaMenu($_SESSION['permiso']);

            //publicaciones
            $data['publicacionesAutorizadas'] = $this->model->getPublicacionesAutorizadas();

           echo $this->renderer->render( "view/homeView.php", $data);
        } else {
            header("location: http://".$_SERVER['SERVER_NAME']."/Infonete-MVC/app/index");
        }
    }

}