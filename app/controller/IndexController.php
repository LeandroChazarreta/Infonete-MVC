<?php

class IndexController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }


    public function index(){

         if (isset($_SESSION['usuario'])) {
              header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/home");
              exit();
        } else {
            $data['publicacionesAutorizadas'] = $this->model->getPublicacionesAutorizadas();
            $_SESSION['menu']=$this->model->ArmaMenu();
            $data['menu'] = $_SESSION['menu'];

            $_SESSION['botones']=$this->model->Botones();
            $data['botones'] = $_SESSION['botones'];

            echo $this->renderer->render( "view/IndexView.php", $data );
    }
    }

}