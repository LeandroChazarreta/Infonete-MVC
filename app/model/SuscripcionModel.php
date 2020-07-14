<?php


class SuscripcionModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function promociones(){
        return $this->conexion->query("SELECT * 
                                        FROM tipo_suscripcion;");
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
            return date("Y-m-d H:i:s",strtotime($fechaActual."+ 1 month"));
        } else {
            return date("Y-m-d H:i:s",strtotime($fechaActual."+ 1 year"));
        }
    }


    public function ActualizaSuscripcion($fechaActual, $FechaSub, $id_tipo_suscripcion){
        $id = $_SESSION['id'];

        return $this->conexion->insert("INSERT INTO suscripcion (fecha_adquirida, fecha_expiracion, id_estado_suscripcion, id_tipo_suscripcion, id_usuario)
                                                VALUES ('$fechaActual','$FechaSub','2','$id_tipo_suscripcion','$id')");
    }


    public function GetSuscripciones(){
        $id = $_SESSION['id'];
        return $this->conexion->query("SELECT * 
                                       FROM suscripcion s JOIN tipo_suscripcion t ON s.id_tipo_suscripcion = t.id_tipo_suscripcion 
                                                            JOIN Estado_suscripcion e ON e.id_estado_suscripcion = s.id_estado_suscripcion
                                        WHERE s.id_usuario = '$id' ORDER BY fecha_adquirida DESC;");
    }


    public function ExpiraSuscripcion(){

        if ($_SESSION['permiso']==2){

            $id = $_SESSION['id'];
            $res = $this->conexion->query("SELECT s.fecha_expiracion
                                                    FROM suscripcion s
                                            WHERE s.id_usuario = '$id' AND s.id_estado_suscripcion='2'");

            foreach ($res as $res) {
                if (date('Y-m-d H:i:s') > $res['fecha_expiracion'] ){
                    echo $_SESSION['permiso']='1';
                    $this->conexion->insert("UPDATE suscripcion
                                                SET id_estado_suscripcion = '1'
                                                WHERE id_usuario = '7'");
                }
            }
        }

    }

}