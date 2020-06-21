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

            if ($res == 1){
                return 1;
          } else {
                return 0;
            }

    }



}