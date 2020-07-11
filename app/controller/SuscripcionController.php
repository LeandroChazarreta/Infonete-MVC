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

        $cantCodigo = strlen($cod);
        $cantNumero = strlen($cardnumber);


        if ($cantCodigo==3 AND $cantNumero==12){
            $this->model->ActualizaSuscripcion();
            header("location: http://".$_SERVER['SERVER_NAME']."/Infonete-MVC/app/home");
        } else {
            echo "no";
        }

    }

}