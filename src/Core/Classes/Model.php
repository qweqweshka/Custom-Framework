<?php

namespace src\Core\Classes;

use PDO;
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
                $sql = 'INSERT INTO ' . $this->table . $columns . ' VALUES ' . $values;
                $this->connection->query($sql);
                return $this->connection->lastInsertId();
            } catch (\PDOException $e) {
                return false;
            }

        }
        return false;

    }

    public function select(array $params, string $where)
    {
        if (!empty($params)) {
            try {
                $columns = implode(',', array_values($params));
                $sql = 'SELECT ' . $columns . ' FROM ' . $this->table . ' WHERE ' . $where;
                $res = $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                return $res;
            } catch (\PDOException $e) {
                return false;
            }

        }
        return false;
    }

    public function update(array $params, string $where)
    {
        if (!empty($params)) {
            try {
                $sql = 'UPDATE ' . $this->table . ' SET ';
                foreach ($params as $key => $value) {
                    $sql .= $key . "='" . $value . "', ";
                }
                $sql = substr_replace($sql, "", -2);
                $sql .= ' WHERE ' . $where;

                $this->connection->query($sql);
            } catch (\PDOException $e) {
                return false;
            }
        }
        return false;
    }

    public function delete($where)
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $this->connection->query($sql);
    }

    public function raw($sql)
    {
        if (!empty($sql)) {
            try {
                $result = $this->connection->query($sql);
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                return false;
            }
        }
        return false;
    }
}