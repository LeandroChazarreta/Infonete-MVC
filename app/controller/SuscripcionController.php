<?php


class SuscripcionController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
            $this->renderer = $renderer;
            $this->model = $model;
    }

    public function index(){
        if ($_SESSION['permiso']==1){
            $data['menu'] = $_SESSION['menu'];
            $data['botones'] = $_SESSION['botones'];
            $data['promocion'] = $this->model->promociones();

            echo $this->renderer->render( "view/SuscripcionView.php", $data );
        } else {
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/");
            exit();
        }
    }

    public function ProcesaPago(){
        $nombre = $_POST["firstname"];
        $cardnumber = $_POST["cardnumber"];
        $mes = $_POST["mes"];
        $año = $_POST["year"];
        $cod = $_POST["cvv"];
        $promocion = $_POST["promocion"];

        $cantCodigo = strlen($cod);
        $cantNumero = strlen($cardnumber);


        // Obteniendo la fecha actual del sistema con PHP
         $fechaActual = date('Y-m-d H:i:s');
         $FechaSub = $this->model->ObtenerFechaActualizacion($promocion,$fechaActual);



         IF ($cantCodigo==3){
               $this->model->ActualizaPermiso();
               $this->model->ActualizaSuscripcion($fechaActual, $FechaSub, $promocion);
               header("location: http://".$_SERVER['SERVER_NAME']."/Infonete-MVC/app/home");
               exit();
           } else {
               header("location: http://".$_SERVER['SERVER_NAME']."/Infonete-MVC/app/Suscripcion");
               exit();
           }
    }

    public function Activas(){
        if ($_SESSION['permiso']==2){
            $data['menu'] = $_SESSION['menu'];
            $data['botones'] = $_SESSION['botones'];
            $data['Suscripciones'] = $this->model->GetSuscripciones();

            echo $this->renderer->render( "view/SuscripcionesActivasView.php", $data);
        } else if ($_SESSION['permiso']==1){
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/suscripcion");
            exit();
        }
    }


}