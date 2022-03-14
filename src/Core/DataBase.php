<?php

namespace src\Core;

use PDO;

class DataBase
{
    private $connection;

    public function __construct($host, $dbName, $login, $pass)
    {

        try {
            $this->connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $login, $pass);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function PDO()
    {
        return $this->connection;
    }
}