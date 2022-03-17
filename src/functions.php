<?php


use src\Core\Classes\Request;

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
