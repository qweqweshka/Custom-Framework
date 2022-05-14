<?php

namespace src\Core\Classes;

abstract class Controller
{
    public function render($view, $data = [], $html = false)
    {
        $viewClass = new View($view);
        $viewClass->setData($data);



        session()->clearErrors();
        session()->clearForm();
        return $viewClass->load($html);
    }

    public function redirectBack()
    {
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }

    public function redirectTo($path, $data = null)
    {
        $header = 'Location:' . $path;
        if (!empty($data)) {
            $header .= '?' . http_build_query($data);
        }
        header($header);

    }

    public function loadView($view, $vars = [])
    {
        extract($vars);
$viewClass = new View($view);
    }

}