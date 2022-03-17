<?php

namespace src\Core\Classes;

abstract class Controller
{
    public function render($view, $data = [])
    {
        $viewClass = new View($view);
        $viewClass->setData($data);
        $viewClass->load();
    }


}