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
                $menu = array( 'Coronavirus' => 'Coronavirus', 'Policiales' => 'Policiales', 'Politica' => 'Politica',
                            'Mundo' => 'Mundo', 'Ciencia' => 'Ciencia', 'noticia' => 'Crear Noticia');
                break;
            case '4':
                $menu = array( 'Coronavirus' => 'Coronavirus', 'Policiales' => 'Policiales', 'Politica' => 'Politica', 'Mundo' => 'Mundo',
                    'Sociedad' => 'Sociedad', 'Ciencia' => 'Ciencia', 'noticia' => 'Crear Noticia', 'administrador' => 'Administrar Usuario');
                break;
            default:
                $menu = array( 'Coronavirus' => 'Coronavirus', 'Policiales' => 'Policiales', 'Politica' => 'Politica', 'Mundo' => 'Mundo',
                            'Sociedad' => 'Sociedad', 'Ciencia' => 'Ciencia');
        }

        return $menu;
    }

}

