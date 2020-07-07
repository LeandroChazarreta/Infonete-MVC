<?php


class AdministradorController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        if ($_SESSION['permisos']==4){
    $this->renderer = $renderer;
    $this->model = $model;
        } else {
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/");
            exit();
        }
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
        $data["Secciones"] = $this->model->GetSecciones();
        echo $this->renderer->render( "view/Secciones-adminView.php", $data);
    }

    public function Reporte(){
        $listas["tipoPublicacion"] = $this->model->getTipoPublicaciones();
        $listas["secciones"] = $this->model->getSecciones();
        echo $this->renderer->render( "view/Reporte-adminView.php",$listas);
    }

    public function ListadoReporte(){
        $data["Reporte"] = $this->model->GetReporte();
        echo $this->renderer->render( "view/ReporteListado-adminView.php", $data);
    }

    public function validarAutorizacion(){
        $id=$_GET["id_publicacion"];
        $valor=1;
        $this->model->updateAutorizar($id,$valor);
        $data["Noticias"] = $this->model->GetNoticias();
        echo $this->renderer->render( "view/Noticia-adminView.php",$data);
   }

    public function validarDesAutorizacion(){
        $id=$_GET["id_publicacion"];
        $valor=0;
        $this->model->updateAutorizar($id,$valor);
        $data["Noticias"] = $this->model->GetNoticias();
        echo $this->renderer->render( "view/Noticia-adminView.php",$data);
    }

    public function editarSeccion(){
        $id=$_POST["id_seccion"];
        $seccion=$_POST["seccion"];
        $this->model->actualizar($seccion,$id);
        header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/Administrador/Secciones");
        exit();
    }
    public function borrarSeccion(){
        $id=$_GET["id_seccion"];
        $this->model->borrar($id);
        header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/Administrador/Secciones");
        exit();
    }


    public function borrarUser(){
        $id=$_GET["id_usuario"];
        $this->model->borrarUs($id);
        $data["Usuario"] = $this->model->getUsuarios();
        echo $this->renderer->render( "view/Usuario-adminView.php",$data);
    }

    public function Volver(){
        header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/home");
        exit();
    }


}