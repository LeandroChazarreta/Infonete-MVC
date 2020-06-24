<?php
require_once("helper/Renderer.php");
include_once("helper/Database.php");
include_once("helper/Config.php");
require_once('third-party/mustache/src/Mustache/Autoloader.php');


class ModuleInitializer
{
    private $renderer;
    private $config;
    private $database;

    public function __construct()
    {
        $this->renderer = new Renderer('./view/partial');
        $this->config = new Config("./config/config.ini");
        $this->database = Database::createDatabaseFromConfig($this->config);
    }

    public function createRegistrarController()
    {
        include_once("model/RegistrarModel.php");
        include_once("controller/RegistrarController.php");

        $model = new RegistrarModel($this->database);
        return new RegistrarController($model, $this->renderer);
    }

    public function createLoginController()
    {
        include_once("model/LoginModel.php");
        include_once("controller/LoginController.php");

        $model = new LoginModel($this->database);
        return new LoginController($model, $this->renderer);
    }

    public function createHomeController()
    {
        include_once("model/HomeModel.php");
        include_once("controller/HomeController.php");

        return new HomeController($this->renderer);
    }

    public function createNoticiaController()
    {
        include_once("model/NoticiaModel.php");
        include_once("controller/NoticiaController.php");

        $model = new NoticiaModel($this->database);
        return new NoticiaController($model, $this->renderer);
    }

    public function createIndexController()
    {
        include_once("controller/IndexController.php");
        return new IndexController($this->renderer);
    }

    public function createLogoutController()
    {
        include_once("controller/LogoutController.php");
        return new LogoutController($this->renderer);
    }

    public function createDefaultController()
    {
        return $this->createIndexController();
    }

    public function createSeccionController()
    {
        include_once("controller/SeccionController.php");

        return new SeccionController($this->renderer);
    }

}