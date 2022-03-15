<?php

namespace App\Controllers\Layouts;


use src\Core\Classes\Controller;
use src\Core\Classes\View;


class HeaderController extends Controller
{
    public function show()
    {
        $data['test'] = 'Test';
       $this->render('Layouts.header' , $data);
    }

}