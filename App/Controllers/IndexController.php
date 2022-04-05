<?php

namespace App\Controllers;


use App\Models\Users;
use src\Core\Classes\Controller;
use src\Core\Classes\Request;
use src\Core\Classes\Storage;


class IndexController extends Controller
{
    public function index()
    {
        $data['test'] = 'Test';
        $this->render('test' , $data);
    }
}