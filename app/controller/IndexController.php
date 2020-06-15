<?php

class IndexController{
    private $renderer;

    public function __construct($renderer){
        $this->renderer = $renderer;
    }

    public function index(){
        echo $this->renderer->render( "view/IndexView.php" );
    }

    public function home(){
        echo $this->renderer->render( "view/homeView.php" );
    }
}