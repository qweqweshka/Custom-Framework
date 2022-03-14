<?php

namespace src\Models;

use src\Core\App;

abstract class Model
{
    private string $table;
    private $connection;

    public function __construct()
    {
        $this->connection = App::singleton()->getConnection();
        $this->table = strtolower((new \ReflectionClass($this))->getShortName());
    }

    public function create(array $params)
    {
        if (!empty($params)) {
            try {
                $columns = ' (' . implode(',', array_keys($params)) . ')';
                $values = " ('" . implode("','", array_values($params)) . "')";
                debug($values);
                $sql = 'INSERT INTO ' . $this->table . $columns . ' VALUES ' . $values;
                $this->connection->query($sql);
                return $this->connection->lastInsertId();
            } catch (\PDOException $e) {
                return false;
            }

        }
        return false;

    }
}