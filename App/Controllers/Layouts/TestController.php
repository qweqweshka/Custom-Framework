<?php

namespace App\Controllers\Layouts;


use src\Core\Classes\Controller;
use src\Core\Classes\View;


class TestController extends Controller
{
    public function show()
    {
        $data['test'] = 'Test';
       $this->render('Layouts.test' , $data);
    }

}