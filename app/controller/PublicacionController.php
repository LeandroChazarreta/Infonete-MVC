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
        $listas['menu'] = $_SESSION['menu'];
        $listas['botones'] = $_SESSION['botones'];

        echo $this->renderer->render( "view/publicacionView.php", $listas);
    }

    public function crearPublicacion(){

        $array["secciones"] = $this->model["seccionModel"]->getSecciones();
        $array["tipoPublicacion"] = $this->model["publicacionModel"]->getTipoPublicaciones();
        $array['menu'] = $_SESSION['menu'];
        $array['botones'] = $_SESSION['botones'];

        if (isset($_GET["error"])){
            $array["error"] = $_GET["error"];
        }

        echo $this->renderer->render( "view/crearPublicacionView.php", $array);
    }

    public function publicacionCreada(){
        echo $this->renderer->render( "view/publicacionCreadaView.php");
    }

    public function validarPublicacion(){

        $publicacion = $_POST;
        $fecha = getdate();

        /* ---- ARMAR NOMBRE IMAGEN ----- */
        $fechaFormateada = $this->model["publicacionModel"]->armarFormatoFecha($fecha);
        $titulo = $publicacion["titulo"];
        $publicacion["imagenNombre"] = $this->model["publicacionModel"]->armarNombreImagen($titulo, $fechaFormateada);

        /* ---- VALIDAR PUBLICACION ----- */
        $validarPublicacion =  $this->model["publicacionModel"]->validarPublicacion($publicacion);
        if ($validarPublicacion != null) {
            header("location: http://".$_SERVER['SERVER_NAME'].
                    "/Infonete-MVC/app/publicacion/crearPublicacion?error=$validarPublicacion");
            exit();
        }

        /* ---- VALIDAR IMAGEN ----- */
        $imagen =  $this->model["publicacionModel"]->validarImagenPublicacion($publicacion["imagenNombre"], $_FILES);
        if ($imagen == false) {
            header("location: http://".$_SERVER['SERVER_NAME'].
                    "/Infonete-MVC/app/publicacion/crearPublicacion?error=Imagen incorrecta");
            exit();
        }

        /* ---- RESTO DEL FORMULARIO ----- */
        $idTipoPublicacion = $_POST["tipoPublicacion"];
        $idSeccion = $_POST["seccion"];
        $bajada = $_POST["bajada"];
        $epigrafeImagen = $_POST["epigrafeImagen"];
        $cuerpo = $_POST["cuerpo"];

        /* ---- OBTENER ID USUARIO ----- */
        $mail = $_SESSION['usuario'];
        $idUsuario = $this->model["usuarioModel"]->consultarIdUsuarioPorMail($mail);
        $idUsuario = $idUsuario[0];
        $idUsuario = $idUsuario["id_usuario"];

        /* ---- GUARDAR PUBLICACION ----- */
        $fechaFormateadaBD = $this->model["publicacionModel"]->armarFormatoFechaBD($fecha);
        $guardarPublicacion = $this->model["publicacionModel"]->guardarPublicacion($titulo, $bajada, $imagen, $epigrafeImagen,
                                                                $cuerpo, $idTipoPublicacion, $idSeccion, $idUsuario, $fechaFormateadaBD);

        /* ---- REDIRECCIONAR SEGÚN EL CASO ----- */
        if ($guardarPublicacion == true){
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/publicacion/publicacionCreada");
            exit();
        } else {
            $error = "No se pudo guardar la publicación";
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/publicacion/crearPublicacion?error=$error");
            exit();
        }
    }


}