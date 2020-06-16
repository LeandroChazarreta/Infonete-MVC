<?php

class RegistrarModel{

    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function VerificarUsuario($email){
        $query = $this->conexion->query("SELECT * FROM USUARIO WHERE mail='$email'");

        $res = count($query);
        if ($res == 1){
            return 1;		// si afecto una linea
        }
        else{
            return 0;       // si no afecto ninguna linea
        }
    }


    public function registrarUsuario($email,$clave,$nombre,$apellido,$nacimiento)
    {
        $password = md5($clave);
        $this->conexion->insert("INSERT INTO Usuario(mail, contraseña, nombre, apellido, fecha_nac) VALUES ('$email','$password','$nombre','$apellido','$nacimiento')");
    }

    }