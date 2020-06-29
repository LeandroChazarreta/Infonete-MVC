<?php

class IndexController{
    private $renderer;

    public function __construct($renderer){
        $this->renderer = $renderer;
    }

    public function index(){

        if (isset($_SESSION['usuario'])) {
              header("location: http://".$_SERVER['SERVER_NAME']. "/Infonete-MVC/app/home");
        } else {
              echo $this->renderer->render( "view/IndexView.php" );
    }
    }

}