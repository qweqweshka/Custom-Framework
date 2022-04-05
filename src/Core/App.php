<?php

namespace src\Core;

use src\Core\Classes\Request;
use src\Core\Classes\Session;

class App
{


    private Router $router;
    private static $selfInstance;
    private $db;

    public function run()
    {
        $this->setConfig();
        $this->startDB();
        $this->buildSession();
        $this->startRouter();
        $this->buildRequest();


    }

    private function startDB()
    {
        $this->db = new DataBase(HOST, DBNAME, LOGIN, PASS);
    }

    public function getConnection()
    {
        return $this->db->PDO();
    }

    private function startRouter()
    {
        $this->router = new Router();
    }

    private function setConfig()
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
        } else {
            die('Config file doesnt exists');
        }
    }

    public static function singleton()
    {
        if (!isset(self::$selfInstance)) {
            self::$selfInstance = new static();
        }
        return self::$selfInstance;
    }

    private function buildRequest()
    {
        Request::singleton();
    }

    private function buildSession()
    {
        Session::singleton();
    }

}
