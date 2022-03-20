<?php

namespace App\Controllers;


use src\Core\Classes\Controller;
use App\Models\User;

class LoginController extends Controller
{
    public function execute()
    {
        $try = session()->all();
        debug($try);
    }
}