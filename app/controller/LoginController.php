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
            echo "$usuario $clave";
            $data["user"] = $respuesta[0];
            $this->renderer->render("view/homeView.php", $data);
        } else {
           echo "no enctro";
            //$this->renderer->render("view/LoginView.php");
        }


    }

}

