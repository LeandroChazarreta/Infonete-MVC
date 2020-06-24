<?php


class SeccionController
{   private $renderer;

    public function __construct($renderer){
        $this->renderer = $renderer;
    }

    public function index(){
        echo $this->renderer->render( "view/seccionView.php");
    }
}