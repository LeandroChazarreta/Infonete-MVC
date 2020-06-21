<?php


class LogoutController
{
    private $renderer;

    public function __construct($renderer){
        session_destroy();
      //  $this->renderer = $renderer;
    }

    public function index(){
        header("location: http://localhost/Infonete/app/index");
    }

}