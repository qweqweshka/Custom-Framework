<?php

namespace App\Controllers;

use App\Models\Users;
use src\Core\Classes\Controller;

class LogoutController extends Controller
{
    public function logout()
    {
        $session = session();
        $session->remove('id');
        $session->remove('auth');
        $this->redirectBack();
    }
}