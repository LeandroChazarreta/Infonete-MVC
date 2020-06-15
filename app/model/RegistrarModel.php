<?php

class RegistrarModel{

    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function registrarUsuario($email,$clave,$nombre,$apellido,$nacimiento)
    {
        $password = md5($clave);
        $res = $this->conexion->query("INSERT INTO Usuario(mail, contraseña, nombre, apellido, fecha_nac) VALUES ('$email','$password','$nombre','$apellido','$nacimiento')");


        if ($res == 1){
            return 1;		// si afecto una linea
        }
        else{
            return 0;       // si no afecto ninguna linea
        }
    }

    }