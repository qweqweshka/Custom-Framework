<?php

namespace App\Services;

use App\Models\Users;

class RegisterService
{
    public function validate()
    {

        if ($this->checkUsers() & $this->checkPassword() & $this->checkRules()) {
            return true;
        }
    }

    public function registerUser()
    {
            $request = request()->all();
            $salt = generateSalt();
            $password = md5($salt . $request['pass1']);
            $user = new Users();
          $res = $user->create(['name' => '', 'login' => $request['login'], 'email' => $request['email'], 'password' => $password,
              'salt' => $salt,'user_hash' => '', 'phone' => '']);
          session()->set('id', $res);
    }

    public function checkLogin()
    {
        $request = request()->all();
        if (!empty($request['login'])) {
            if (strlen($request['login']) >= 6) {
                return true;
            } else {
                session()->errors('login', "Field <b>login</b> must be longer than <b>6</b> symbols");
                return false;
            }
        } else {
            session()->errors('login', "Field <b>login</b> is required");
            return false;
        }
    }

    public function checkPassword()
    {

        $request = request()->all();
        if (!empty($request['pass1'])) {
            if (strlen($request['pass1']) >= 8) {
                if (!empty($request['pass2'])) {
                    if ($request['pass1'] === $request['pass2']) {
                        return true;
                    } else {
                        session()->errors('pass1', "Passwords do not match");
                        return false;
                    }
                } else {
                    session()->errors('pass2', "Please repeat your password");
                    return false;
                }
            } else {
                session()->errors('pass1', "Password length must be atleast <b>8</b> symbols");
                return false;
            }
        } else {
            session()->errors('pass1', "Field <b>password</b> is required");
            return false;
        }
    }

    public function checkUsers()
    {
        $request = request()->all();
        if ($this->checkLogin()) {
            $user = new Users();
            $result = $user->select('login')->where(['login', '=', $request['login']])->get();
            if (empty($result)) {
                return true;
            } else {
                session()->errors('login', "This login already exists");
                return false;
            }
        }
    }

    public function checkRules()
    {
        $request = request()->all();
        if (!empty($request['check'])) {
            return true;
        } else {
            session()->errors('check', "You must accept the terms");
            return false;
        }
    }
}