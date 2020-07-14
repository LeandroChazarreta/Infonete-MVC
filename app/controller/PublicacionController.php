<?php

class PublicacionController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){

        $listas["secciones"] = $this->model["seccionModel"]->getSecciones();
        $listas["tipoPublicacion"] = $this->model["publicacionModel"]->getTipoPublicaciones();
        $listas['botones'] = $_SESSION['botones'];
        $mail = $_SESSION['usuario'];
        $idUsuario = $this->model["usuarioModel"]->consultarIdUsuarioPorMail($mail);
        $idUsuario = $idUsuario[0];
        $idUsuario = $idUsuario["id_usuario"];
        $listas["publicaciones"] = $this->model["publicacionModel"]->getPublicacionesDelContenedista($idUsuario);

        echo $this->renderer->render( "view/publicacionView.php", $listas);
    }

    public function crearPublicacion(){

        $array["secciones"] = $this->model["seccionModel"]->getSecciones();
        $array["tipoPublicacion"] = $this->model["publicacionModel"]->getTipoPublicaciones();
        $array['botones'] = $_SESSION['botones'];


        if (isset($_GET["error"])){
            $array["error"] = $_GET["error"];
        }

        echo $this->renderer->render( "view/crearPublicacionView.php", $array);
    }

    public function editarPublicacion(){

        $array['menu'] = $_SESSION['menu'];
        $array['botones'] = $_SESSION['botones'];
        $array['publicacionAEditar'] = $this->model["publicacionModel"]->getPublicacionPorId($_GET['id_publicacion']);

        $publicacion = $this->model["publicacionModel"]->getPublicacionPorId($_GET['id_publicacion']);
        $publicacion = $publicacion[0];
        $idSeccion = $publicacion["id_seccion"];
        $idTipoPublicacion = $publicacion["id_tipo_publicacion"];

        $array['tipoPublicaciones'] = $this->model["publicacionModel"]->getTipoPublicacionesConSeleccionada($idTipoPublicacion);
        $array['secciones'] = $this->model["seccionModel"]->getSeccionesConSeleccionada($idSeccion);

        $_SESSION["id_publicacion"] = $_GET['id_publicacion'];

        if (isset($_GET["error"])){
            $array["error"] = $_GET["error"];
        }

        echo $this->renderer->render( "view/editarPublicacionView.php", $array);
    }

    public function publicacionCreada(){
        echo $this->renderer->render( "view/publicacionCreadaView.php");
    }

    public function validarPublicacion(){

        $this->model["publicacionModel"]->armarNombreImagen();

        $validarPublicacion =  $this->model["publicacionModel"]->validarPublicacion($_POST);
        if ($validarPublicacion != null) {
            header("location: http://".$_SERVER['SERVER_NAME'].
                    "/Infonete-MVC/app/publicacion/crearPublicacion?error=$validarPublicacion");
            exit();
        }

        $imagen = $this->validarImagenPublicacion();

        $this->guardarPublicacion($imagen);
    }

    public function validarImagenPublicacion()
    {
        $imagen =  $this->model["publicacionModel"]->validarImagenPublicacion($_POST["imagenNombre"], $_FILES);
        if ($imagen == false) {
            header("location: http://".$_SERVER['SERVER_NAME'].
                "/Infonete-MVC/app/publicacion/crearPublicacion?error=Imagen incorrecta");
            exit();
        }
        return $imagen;
    }

    public function guardarPublicacion($imagen)
    {
        $titulo = $_POST["titulo"];
        $idTipoPublicacion = $_POST["tipoPublicacion"];
        $idSeccion = $_POST["seccion"];
        $bajada = $_POST["bajada"];
        $epigrafeImagen = $_POST["epigrafeImagen"];
        $cuerpo = $_POST["cuerpo"];
        $idUsuario = $_SESSION['id'];

        $guardarPublicacion = $this->model["publicacionModel"]->guardarPublicacion($titulo, $bajada, $imagen, $epigrafeImagen,
            $cuerpo, $idTipoPublicacion, $idSeccion, $idUsuario);

        if ($guardarPublicacion == true){
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/publicacion/publicacionCreada");
            exit();
        } else {
            $error = "No se pudo guardar la publicación";
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/publicacion/crearPublicacion?error=$error");
            exit();
        };
    }

    public function actualizarPublicacion($imagen)
    {
        $titulo = $_POST["titulo"];
        $idTipoPublicacion = $_POST["tipoPublicacion"];
        $idSeccion = $_POST["seccion"];
        $bajada = $_POST["bajada"];
        $epigrafeImagen = $_POST["epigrafeImagen"];
        $cuerpo = $_POST["cuerpo"];
        $idUsuario = $_SESSION['id'];

        $guardarPublicacion = $this->model["publicacionModel"]->guardarPublicacion($titulo, $bajada, $imagen, $epigrafeImagen,
            $cuerpo, $idTipoPublicacion, $idSeccion, $idUsuario);

        if ($guardarPublicacion == true){
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/publicacion/publicacionCreada");
            exit();
        } else {
            $error = "No se pudo guardar la publicación";
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/publicacion/crearPublicacion?error=$error");
            exit();
        };
    }

    public function validarPublicacionParaActualizar(){

        $this->model["publicacionModel"]->armarNombreImagen();

        $validarPublicacion =  $this->model["publicacionModel"]->validarPublicacion($_POST);
        if ($validarPublicacion != null) {
            header("location: http://".$_SERVER['SERVER_NAME'].
                "/Infonete-MVC/app/publicacion/crearPublicacion?error=$validarPublicacion");
            exit();
        }

        $imagen = $this->validarImagenPublicacion();

        $this->actualizarPublicacion($imagen);
    }

    public function generarPublicacionPDF(){
        $this->model["publicacionModel"]->generarPublicacionPDF();
    }
}