<?php

namespace src\Core\Classes;

class Session
{
    private static Session $selfInstance;
    private array $session;

    public function __construct()
    {
        session_start(['cookie_lifetime' => 86400]);
        $this->session = &$_SESSION;
    }

    public function set(string $key, string $value)
    {
        $this->session[$key] = $value;
    }

    public function remove($key)
    {
        unset($this->session[$key]);
    }

    public function stop()
    {
        session_destroy();
    }

    public function get($key)
    {
        return $this->session[$key];
    }

    public function all()
    {
        return $this->session;
    }


    public static function singleton()
    {
        if (!isset(self::$selfInstance)) {
            self::$selfInstance = new static();
        }
        return self::$selfInstance;
    }
}