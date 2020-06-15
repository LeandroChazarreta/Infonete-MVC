<?php

class LoginModel{

    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function VerificarLogin ($usuario,$password){
        $password = md5($password);	// codifico contraseña
        echo $password;

        If ($res = $this->conexion->query("SELECT * FROM USUARIO WHERE mail='$usuario'and contraseña='$password'")) {

                $row_cnt = $res->num_rows;

                printf("Result set has %d rows.\n", $row_cnt);
        }
        if ($row_cnt == 1){
            echo 1;		// si afecto una linea
        }
        else{
            echo 0;       // si no afecto ninguna linea
        }

    }



}