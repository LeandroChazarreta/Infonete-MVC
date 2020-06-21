<?php

class HomeController{
    private $renderer;

    public function __construct($renderer){
        $this->renderer = $renderer;
    }

    public function index(){
        if (isset($_SESSION)) {
            echo $_SESSION['usuario'];
            echo $this->renderer->render( "view/homeView.php" );
        } else {
            header("location: http://localhost/Infonete/app/index");
        }

    }

}