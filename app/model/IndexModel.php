<?php


class IndexModel{

    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }
    public function getPublicacionesAutorizadas(){

        return $this->conexion->query(" SELECT * 
                                        FROM Publicacion pub
					                    JOIN Seccion sec ON pub.id_seccion = sec.id_seccion
                                        WHERE pub.autorizada = true ");
    }
    public function ArmaMenu(){
        $menu = array('Coronavirus' => 'Coronavirus', 'Policiales' => 'Policiales', 'Politica' => 'Politica', 'Mundo' => 'Mundo',
            'Sociedad' => 'Sociedad', 'Ciencia' => 'Ciencia',
            'Economia'=>'Economia' , 'Deportes'=>'Deportes', 'Espectaculos'=>'Espectaculos', 'Opinion'=>'Opinion', 'Revista'=>'Revista',
            'Login'=>'LOGIN', 'Registrar'=>'REGISTRARTE', 'linkreg'=>'registrar', 'linklog'=>'login');
        return $menu;
    }
}