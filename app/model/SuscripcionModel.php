<?php


class SuscripcionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function ActualizaPermiso(){
        $user = $_SESSION['usuario'];
        $_SESSION["permiso"]='2';
        return $this->conexion->insert("UPDATE usuario
                                        SET id_permiso = '2'
                                        WHERE mail = '$user'");
    }

    public function ObtenerFechaActualizacion($promocion, $fechaActual){
        if ($promocion == '1'){
            return date("Y-m-d H:i:s",strtotime($fechaActual."+ 30 days"));
        } else {
            return date("Y-m-d H:i:s",strtotime($fechaActual."+ 360 days"));
        }
    }


    public function ActualizaSuscripcion($fechaActual, $FechaSub, $id_tipo_suscripcion){
        $id = $_SESSION['id'];

        return $this->conexion->insert("INSERT INTO suscripcion (fecha_adquirida, fecha_expiracion, estado, id_tipo_suscripcion, id_usuario)
                                                VALUES ('$fechaActual','$FechaSub','1','$id_tipo_suscripcion','$id')");
    }


    public function GetSuscripciones(){
        $id = $_SESSION['id'];
        return $this->conexion->query("SELECT * FROM suscripcion s JOIN tipo_suscripcion t ON s.id_tipo_suscripcion = t.id_tipo_suscripcion 
                                        WHERE s.id_usuario = '$id' ORDER BY fecha_expiracion;");
    }

}