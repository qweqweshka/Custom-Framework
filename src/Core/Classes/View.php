<?php

namespace src\Core\Classes;

use App\Controllers\Layouts\FooterController;
use App\Controllers\Layouts\HeaderController;

final class View
{
    private string $path;
    private string $ROOT;
    private array $data;


    public function __construct($view)
    {
        $this->ROOT = $_SERVER['DOCUMENT_ROOT'] . "/Views";
        $this->buildPath($view);
        if (!$this->isViewExists()) {
            die('Wrong view path : ' . $this->path);
        }
    }

    private function buildPath($view)
    {
        $path = $this->ROOT;
        $arrayPath = explode('.', $view);
        array_walk($arrayPath, function ($val) use (&$path) {
            $path .= '/' . $val;
        });
        $path .= '.php';
        $this->path = $path;
    }

    private function isViewExists(): bool
    {
        return file_exists($this->path);
    }


    public function setData($data): void
    {
        $this->data = $data;
    }

    public function load($html = false)
    {
        $data = $this->data;
        if($html){
          ob_start();
            include $this->path;
            $test = ob_get_clean();
            return $test;
        } else {
            include $this->path;
        }
    }


}

