<?php

namespace src\Core\Classes;

class Request
{
    private static Request $selfInstance;
    private array $get;
    private array $post;

    public function __construct()
    {
        $this->post = $_POST;
        $this->get = $_GET;
    }

    public function get($key)
    {
        return $this->get[$key];
    }

    public function post($key)
    {
        return $this->post[$key];
    }

    public function all()
    {
        return array_merge($this->post , $this->get);
    }


    public static function singleton()
    {
        if (!isset(self::$selfInstance)) {
            self::$selfInstance = new static();
        }
        return self::$selfInstance;
    }

}