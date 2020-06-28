<?php


class LogoutController
{

    public function __construct(){
        session_unset();
        session_destroy();
    }

    public function index(){
        header("location: http://localhost/Infonete-MVC/app/");
    }

}