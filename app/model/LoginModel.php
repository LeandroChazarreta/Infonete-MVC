<?php

class LoginModel{

    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function VerificarLogin ($usuario,$password){
        $password = md5($password);	// codifico contraseña

        $query = $this->conexion->query("SELECT * FROM USUARIO WHERE mail='$usuario'and contraseña='$password'");

            $res = count($query); // cuento registros

            if ($res == 1){ //verificar si encontro registro
                return 1;
          } else {
                return 0;
            }
    }

    public function ObtenerPermisos ($usuario){
        $query=  $this->conexion->query("SELECT id_permiso FROM USUARIO WHERE mail='$usuario'");

        foreach ($query as $fila) {
            return ($fila["id_permiso"]);
        }
    }

    public function ObtenerID ($usuario){
       $query=  $this->conexion->query("SELECT id_usuario FROM USUARIO WHERE mail='$usuario'");

        foreach ($query as $fila) {
            return ($fila["id_usuario"]);
        }
        }

}