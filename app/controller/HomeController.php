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
            $this->model['suscripcion']->ExpiraSuscripcion();

            //Arma el menu segun el permiso
            $_SESSION['menu']=$this->model['home']->ArmaMenu();
            $data['menu'] = $_SESSION['menu'];


            $_SESSION['botones']=$this->model['home']->Botones($_SESSION['permiso']);
            $data['botones'] = $_SESSION['botones'];

            //publicaciones
            $data['publicacionesAutorizadas'] = $this->model['home']->getPublicacionesAutorizadas();


           echo $this->renderer->render( "view/homeView.php", $data);
        } else {
            header("location: http://".$_SERVER['SERVER_NAME']."/Infonete-MVC/app/index");
        }
    }

}