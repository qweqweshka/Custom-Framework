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
        if (!empty($_POST)) {
            $this->session['form'] = $_POST;
        }
    }

    public function set(string $key, $value)
    {
        $this->session[$key] = $value;
    }

    public function remove($key)
    {
        unset($this->session[$key]);
    }

    public function getErrors($key)
    {
        return $this->session['errors'][$key];
    }

    public function checkErrors($key , $default = null)
    {
        if (!empty($this->session['errors']) && !empty($this->session['errors'][$key])) {
            return $this->session['errors'][$key];
        } elseif (!empty($default)) {
            return $default;
        } else {
            return false;
        }
    }

    public function errors(string $key, $value)
    {
        $this->session['errors'][$key] = $value;
    }

    public function clearErrors()
    {
        if (!empty($this->session['errors'])) {
            $this->remove('errors');
        }
    }

    public function clearForm()
    {
        if (!empty($this->session['form'])) {
            $this->remove('form');
        }
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->session)) {
            return $this->session[$key];
        }
        return false;
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