<?php


class AdministradorController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
    $this->renderer = $renderer;
    $this->model = $model;
}

    public function index(){
        echo $this->renderer->render( "view/AdministradorView.php");
    }

    public function Noticias(){
        $data["Noticias"] = $this->model->GetNoticias();
           echo $this->renderer->render( "view/Noticia-adminView.php", $data);
    }

    public function Usuarios(){
        $data["Usuario"] = $this->model->GetUsuarios();
        echo $this->renderer->render( "view/Usuario-adminView.php", $data);
    }

    public function Secciones(){
        $data["Secciones"] = $this->model->GetUsuarios();
        echo $this->renderer->render( "view/Secciones-adminView.php", $data);
    }



    public function Volver(){
        header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/home");
    }


}