<?php


class HomeModel
{
    private $conexion;

    public function __construct($database){
        $this->conexion = $database;
    }

    public function ArmaMenu($permiso){
        $menu = array();

        // Arma el menu
        Switch ($permiso) {
            case '3':
                $menu = array('Coronavirus' => 'Coronavirus', 'Policiales' => 'Policiales',
                    'Politica' => 'Politica', 'Mundo' => 'Mundo', 'Sociedad' => 'Sociedad',
                    'Economia'=>'Economia' , 'Deportes'=>'Deportes', 'Espectaculos'=>'Espectaculos', 'Opinion'=>'Opinion', 'Revista'=>'Revista',
                    'Ciencia' => 'Ciencia', 'link1' => 'crearPublicacion', 'noticia' => 'Crear Noticia');
                break;
            case '4':
                $menu = array('Coronavirus' => 'Coronavirus', 'Policiales' => 'Policiales', 'Politica' => 'Politica', 'Mundo' => 'Mundo',
                    'Sociedad' => 'Sociedad', 'Ciencia' => 'Ciencia', 'link1' => 'publicacion',
                    'Economia'=>'Economia' , 'Deportes'=>'Deportes', 'Espectaculos'=>'Espectaculos', 'Opinion'=>'Opinion', 'Revista'=>'Revista',
                    'noticia' => 'Crear Noticia', 'link2' => 'administrador', 'administrador' => 'Administrar');
                break;
            default:
                $menu = array('Coronavirus' => 'Coronavirus', 'Policiales' => 'Policiales', 'Politica' => 'Politica', 'Mundo' => 'Mundo',
                            'Sociedad' => 'Sociedad', 'Ciencia' => 'Ciencia',
                    'Economia'=>'Economia' , 'Deportes'=>'Deportes', 'Espectaculos'=>'Espectaculos', 'Opinion'=>'Opinion', 'Revista'=>'Revista');
        }


        return $menu;
    }

    public function getPublicacionesAutorizadas(){

        return $this->conexion->query(" SELECT * 
                                        FROM Publicacion pub
					                    JOIN Seccion sec ON pub.id_seccion = sec.id_seccion
                                        WHERE pub.autorizada = true ");
    }

}

