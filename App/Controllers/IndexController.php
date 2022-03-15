<?php

namespace App\Controllers;


use src\Core\Classes\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function execute()
    {
        $data['test'] = 'Test';
        $this->render('Test' , $data);
    }
}