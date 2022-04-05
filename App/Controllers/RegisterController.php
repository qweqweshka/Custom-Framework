<?php

namespace App\Controllers;

use App\Services\RegisterService;
use App\Models\Users;
use src\Core\Classes\Controller;

class RegisterController extends Controller
{
    public function registerPage()
    {
        $this->render('register');
    }

    public function register()
    {
        $service = new RegisterService();
        if ($service->validate()) {
            $service->registerUser();
            $this->redirectTo('/');
        } else {
            $this->redirectBack();
        }

    }


}