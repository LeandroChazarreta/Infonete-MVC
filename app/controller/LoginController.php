<?php

class   LoginController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        if (isset($_SESSION['permiso'])){
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/");
            exit();
       }else {
            $this->renderer = $renderer;
            $this->model = $model;
        }
    }

    public function index(){
        $data['menu'] = $_SESSION['menu'];
        $data['botones'] = $_SESSION['botones'];
        echo $this->renderer->render( "view/LoginView.php", $data );
    }


    public function login(){
            $usuario = $_POST["user"];
            $clave = $_POST["clave"];
            $respuesta = $this->model->VerificarLogin($usuario,$clave);


       if ($respuesta == 1){

            $permiso = $this->model->ObtenerPermisos($usuario);
            $id = $this->model->ObtenerID($usuario);
            $_SESSION["usuario"] = "$usuario";
            $_SESSION["id"] = "$id";
            $_SESSION["permiso"] = $permiso[0];

            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/home");
            exit();
        } else {
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/login");
            exit();
        }

    }

}

