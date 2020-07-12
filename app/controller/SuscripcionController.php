<?php


class SuscripcionController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        if ($_SESSION['permiso']==1){
            $this->renderer = $renderer;
            $this->model = $model;
        } else {
            header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/");
            exit();
        }
    }

    public function index(){
        $data['menu'] = $_SESSION['menu'];
        $data['botones'] = $_SESSION['botones'];

       echo $this->renderer->render( "view/SuscripcionView.php", $data );
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



         IF ($cantCodigo==3 AND $cantNumero==12){
               $this->model->ActualizaPermiso();
               $this->model->ActualizaSuscripcion($fechaActual, $FechaSub, $promocion);

               header("location: http://".$_SERVER['SERVER_NAME']."/Infonete-MVC/app/home");
               exit();
           } else {
               header("location: http://".$_SERVER['SERVER_NAME']."/Infonete-MVC/app/Suscripcion");
               exit();
           }
    }

}