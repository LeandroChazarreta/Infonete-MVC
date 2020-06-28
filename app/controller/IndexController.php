<?php

class IndexController{
    private $renderer;

    public function __construct($renderer){
        $this->renderer = $renderer;
    }

    public function index(){


        if (isset($_SESSION['usuario'])) {
              echo $_SESSION['usuario'];
        echo $this->renderer->render( "view/homeView.php" );
        } else {
        echo $this->renderer->render( "view/IndexView.php" );
    }
    }

}