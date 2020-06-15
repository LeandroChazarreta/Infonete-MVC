<?php

class RegistrarController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){
        echo $this->renderer->render( "view/registarView.php");
    }


    public function registrarUsuario(){
        $email = $_POST["email"];
        $clave = $_POST["psw"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $nacimiento = $_POST["nacimiento"];
        $clave2 = $_POST["psw-repeat"];

        if ($clave == $clave2) {
        $respuesta =$this->model->registrarUsuario($email,$clave,$nombre,$apellido,$nacimiento);

            if ($respuesta == 1){
                $data["user"] = $respuesta[0];
                $this->renderer->render("view/LoginView.php");
            }
        } else {
            $this->renderer->render( "view/registarView.php");
        }

        }
}