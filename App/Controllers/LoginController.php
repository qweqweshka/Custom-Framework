<?php

namespace App\Controllers;


use App\Services\LoginService;
use src\Core\Classes\Controller;
use App\Models\Users;
use src\Core\Classes\Request;

class LoginController extends Controller
{
    public function loginPage()
    {
//        $data['test'] = 'Test';
        $this->render('login');
    }

    public function login()
    {
        $service = new LoginService();
        if ($service->authentication()) {
            $service->login();
            $service->userCookie();
            $this->redirectTo('/');
        } else {
            $this->redirectBack();
        }
    }


}