<?php


class LogoutController
{

    public function __construct(){
        session_destroy();
    }

    public function index(){
        header("location: http://localhost/Infonete/app/");
    }

}