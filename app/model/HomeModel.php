<?php


class HomeModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }
}