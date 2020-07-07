<?php

class HomeController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){

        if (isset($_SESSION['usuario']) and isset($_SESSION['permiso'])) {
            echo $_SESSION['usuario'], $_SESSION['permiso'];
            //Arma el menu segun el permiso
            $_SESSION['menu']=$this->model->ArmaMenu();
            $data['menu'] = $_SESSION['menu'];


            $_SESSION['botones']=$this->model->Botones($_SESSION['permiso']);
            $data['botones'] = $_SESSION['botones'];

            //publicaciones
            $data['publicacionesAutorizadas'] = $this->model->getPublicacionesAutorizadas();

           echo $this->renderer->render( "view/homeView.php", $data);
        } else {
            header("location: http://".$_SERVER['SERVER_NAME']."/Infonete-MVC/app/index");
        }
    }

}