<?php

namespace App\Controllers\Layouts;


use src\Core\Classes\Controller;
use src\Core\Classes\View;


class FooterController extends Controller
{
    public function show()
    {
        $data['text'] = 'text';
        $this->render('Layouts.footer' , $data);
    }
}