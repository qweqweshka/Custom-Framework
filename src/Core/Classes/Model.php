<?php

namespace src\Core\Classes;

use PDO;
use src\Core\App;

abstract class Model
{
    private string $table;
    private $connection;
    private $sql;

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

    public static function all()
    {
        $class = new static();

        try {
            $sql = 'SELECT * FROM ' . $class->table;
            return $class->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public static function select($value = null)
    {
        $class = new static();
        if (is_string($value)) {
            $class->sql = 'SELECT ' . $value . ' FROM ' . $class->table;
        } elseif (is_array($value)) {
            $columns = implode(',', array_values($value));
            $class->sql = 'SELECT ' . $columns . ' FROM ' . $class->table;
        } else {
            $class->sql = 'SELECT * FROM ' . $class->table;

        }
        return $class;
    }


    public function where(array $params)
    {
        if ($params[2] == 'NULL') {
            $this->sql .= " WHERE $params[0] $params[1] $params[2]";
            return $this;
        } else {
            $this->sql .= " WHERE $params[0]$params[1]'$params[2]'";
            return $this;
        }
    }

    public function limit($value)
    {
        $this->sql .= ' LIMIT ' . $value;
        return $this;
    }

    public function paginate1($perPage)
    {
        $page = Request()->post('page') ?? 1;
        $offset = $perPage * ($page - 1);
        $sql = $this->sql . " LIMIT $offset, $perPage";
        try {
            $result['items'] = $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            $result['currentPage'] = $page;
            $result['totalItems'] = $this->connection->query(preg_replace('#SELECT([^.]*)FROM#', 'SELECT COUNT(*) FROM', $this->sql))->fetch()[0];
            $result['totalPages'] = ceil($result['totalItems'] / $perPage);
            return $result;
        } catch (\PDOException $e) {
//            return $sql;
            return false;
        }
    }

    public function paginate($perPage)
    {
        $page = Request()->get('page') ?? 1;
        $offset = $perPage * ($page - 1);
        $sql = $this->sql . " LIMIT $offset, $perPage";
        try {
            $result['items'] = $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            $result['currentPage'] = $page;
            $result['totalItems'] = $this->connection->query(preg_replace('#SELECT([^.]*)FROM#', 'SELECT COUNT(*) FROM', $this->sql))->fetch()[0];
            $result['totalPages'] = ceil($result['totalItems'] / $perPage);
            return $result;
        } catch (\PDOException $e) {
//            return $sql;
            return false;
        }
    }

    public function get()
    {
        try {
//            return $this->sql;
            return $this->connection->query($this->sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getOne()
    {
        try {
            return $this->connection->query($this->sql)->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function update(array $params, array $where)
    {
        if (!empty($params)) {
            try {
                $sql = 'UPDATE ' . $this->table . ' SET ';
                foreach ($params as $key => $value) {
                    $sql .= $key . "='" . $value . "', ";
                }
                $sql = substr_replace($sql, "", -2);
                $sql .= " WHERE $where[0]$where[1]'$where[2]'";
//                return $sql;
                $this->connection->query($sql);
            } catch (\PDOException $e) {
                return false;
            }
        }
        return false;
    }

    public function delete(array $where)
    {
        $sql = 'DELETE FROM ' . $this->table . " WHERE $where[0]$where[1]'$where[2]'";
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