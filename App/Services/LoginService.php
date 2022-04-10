<?php

namespace App\Services;

use App\Models\Users;

class LoginService
{
    public function authentication()
    {
        if ($this->checkEmail() & $this->checkPass()) {
            return true;
        }
    }

    public function login()
    {
        $request = request()->all();
        $user = new Users();
        $result = $user->select()->where(['email', '=', $request['email']])->getOne();
        session()->set('auth', true);
        session()->set('id', $result['id']);
    }

    public function userCookie()
    {
        $request = request()->all();
        setcookie('email', $request['email'], (time() + 86400) * 7);
        setcookie('password', $request['pass'], (time() + 86400) * 7);
    }

    public function checkRemember()
    {
        $request = request()->all();
        if (!empty($request['remember'])) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmail()
    {
        $request = request()->all();
        $user = new Users();
        $result = $user->select()->where(['email', '=', $request['email']])->getOne();
        if (!empty($result)) {
            return true;
        } else {
            session()->errors('email', "Incorrect email");
            return false;
        }
    }


    public function checkPass()
    {
        $request = request()->all();
        $user = new Users();
        $result = $user->select()->where(['email', '=', $request['email']])->getOne();
        $password = md5($result['salt'] . $request['pass']);
        if ($password == $result['password']) {
            return true;
        } else {
            session()->errors('pass', "Incorrect password");
            return false;
        }
    }

}