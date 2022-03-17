<?php

namespace App\Controllers;


use src\Core\Classes\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function execute()
    {
        $data['test'] = 'Test';
        $this->render('L1.L2.L3.test' , $data);
    }
}