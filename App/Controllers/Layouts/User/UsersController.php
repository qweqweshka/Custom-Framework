<?php

namespace App\Controllers\Layouts\User;

use App\Models\Articles;
use App\Models\Users;
use src\Core\Classes\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $user = new Users();
        $data = $user->select()->paginate(8);
        $this->render('users', $data);
    }
}