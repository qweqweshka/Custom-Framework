<?php

namespace App\Controllers;


use App\Models\Users;
use src\Core\Classes\Controller;


class IndexController extends Controller
{
    public function execute()
    {
//$user = new Users();
        debug(Users::select()->where('id>0')->paginate(2));
    }
}