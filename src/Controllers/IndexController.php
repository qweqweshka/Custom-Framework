<?php

namespace src\Controllers;

use src\Controllers\Controller;
use src\Models\User;

class IndexController extends Controller
{
    public function execute()
    {
        $model = new User();
       $res = $model->create(['id'=>'3','name'=>'test' , 'email'=>'test@mail.com' , 'phone'=>'8800']);
        debug($res);
    }
}