<?php


use src\Core\Classes\Request;
use src\Core\Classes\Session;
use src\Core\Classes\Storage;

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if (!function_exists('layout')) {
    function layout($layout)
    {
        switch ($layout) {
            case 'header' :
                $controller = new \App\Controllers\Layouts\HeaderController();
                break;
            case 'footer' :
                $controller = new \App\Controllers\Layouts\FooterController();
                break;
            default :
                $class = '\App\Controllers\Layouts\\' . ucfirst($layout) . 'Controller';
                $controller = new $class();
        }

        $controller->show();
    }
}

if (!function_exists('request')) {
    function request()
    {
        return Request::singleton();
    }
}

if (!function_exists('session')) {
    function session()
    {
        return Session::singleton();
    }
}

if (!function_exists('storage')) {
    function storage()
    {
        return Storage::singleton();
    }
}

if (!function_exists('generateSalt')) {
    function generateSalt()
    {
        $salt = '';
        $saltLength = 8;

        for ($i = 0; $i < $saltLength; $i++) {
            $salt .= chr(mt_rand(33, 126));
        }
        return $salt;
    }
}

if (!function_exists('old')) {
    function old($key, $default = null)
    {
        if (!empty(session()->get('form') && !empty(session()->get('form')[$key]))) {
            return session()->get('form')[$key];
        } elseif (!empty($default)) {
            return $default;
        } else {
            return false;
        }
    }
}
