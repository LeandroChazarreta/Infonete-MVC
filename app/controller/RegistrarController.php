<?php

class RegistrarController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
            $this->renderer = $renderer;
            $this->model = $model;
    }

    public function index(){
        $data['menu'] = $_SESSION['menu'];
        $data['botones'] = $_SESSION['botones'];
        echo $this->renderer->render( "view/registarView.php", $data);
    }

    public function exitoso(){
       echo $this->renderer->render( "view/RegistrookView.php");
    }


    public function registrarUsuario(){
        $email = $_POST["email"];
        $clave = $_POST["psw"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $nacimiento = $_POST["nacimiento"];
        $clave2 = $_POST["psw-repeat"];


        if ($clave == $clave2) {
            $respuesta = $this->model->VerificarUsuario($email);

                if ($respuesta == 0){
                    $this->model->registrarUsuario($email,$clave,$nombre,$apellido,$nacimiento);
                    $this->exitoso();
                } else {
                   echo "no agrego al usuario";
            //    $this->renderer->render( "view/registarView.php");
                }
                }






        }
}