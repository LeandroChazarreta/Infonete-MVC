<?php

class LoginController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        echo $this->renderer->render( "view/LoginView.php" );
    }


    public function login(){
            $usuario = $_POST["user"];
            $clave = $_POST["clave"];
            $respuesta = $this->model->VerificarLogin($usuario,$clave);




       if ($respuesta == 1){
            $permiso = $this->model->ObtenerPermisos($usuario);
            $_SESSION["usuario"] = "$usuario";


           $_SESSION["permiso"] = $permiso[0];
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/home");
        } else {
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/login");
        }

    }

}

