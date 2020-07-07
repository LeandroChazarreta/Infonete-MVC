<?php

class UsuarioModel{

    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function consultarIdUsuarioPorMail($mail){

        return $query = $this->conexion->query("SELECT us.id_usuario FROM USUARIO us WHERE us.mail='$mail'");
    }
}