<?php

namespace src\Core\Classes;

class Cookie
{
    private static Cookie $selfInstance;
    private array $cookie;

    public function __construct()
    {
        $this->cookie = $_COOKIE;
    }

    public function set(string $name, string $hash)
    {
        setcookie($name, $hash, (time() + 86400) * 7);
    }

    public function get($id)
    {
        return $this->cookie[$id];
    }

    public function all()
    {
        return $this->cookie;
    }

    public function check($id)
    {
        if (!empty($this->cookie[$id])) {
            return true;
        }
    }

    public static function singleton()
    {
        if (!isset(self::$selfInstance)) {
            self::$selfInstance = new static();
        }
        return self::$selfInstance;
    }
}