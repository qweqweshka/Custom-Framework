<?php

namespace src\Core\Classes;

class Request
{
    private static Request $selfInstance;
    private array $get;
    private array $post;
    private $files;

    public function __construct()
    {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->files = $_FILES;
    }

    public function get($key)
    {
        if(array_key_exists($key, $this->get)) {
            return $this->get[$key];
        }
        return null;
    }

    public function post($key)
    {
        if(array_key_exists($key, $this->post)) {
            return $this->post[$key];
        }
        return null;
    }

    public function file($key)
    {
        return $this->files[$key];
    }

    public function all()
    {
        return array_merge($this->post, $this->get);
    }


    public static function singleton()
    {
        if (!isset(self::$selfInstance)) {
            self::$selfInstance = new static();
        }
        return self::$selfInstance;
    }

}