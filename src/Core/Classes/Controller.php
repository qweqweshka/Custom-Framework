<?php

namespace src\Core\Classes;

abstract class Controller
{
    public function render($view, $data = [])
    {
        $viewClass = new View($view);
        $viewClass->setData($data);
        $viewClass->load();


        session()->clearErrors();
        session()->clearForm();
    }

    public function redirectBack()
    {
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }

    public function redirectTo($path , $data = null)
    {
        $header = 'Location:' . $path;
        if(!empty($data)) {
            $header .= '?' . http_build_query($data);
        }
        header($header);

    }

}