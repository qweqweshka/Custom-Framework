<?php


use App\Models\Articles;
use src\Core\App;
use src\Core\Classes\Cookie;
use src\Core\Classes\Request;
use src\Core\Classes\Session;
use src\Core\Classes\Storage;

if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if (!function_exists('layout')) {
    function layout($layout)
    {
        switch ($layout) {
            case 'header' :
                $controller = new \App\Controllers\Layouts\HeaderController();
                break;
            case 'footer' :
                $controller = new \App\Controllers\Layouts\FooterController();
                break;
            default :
                $class = '\App\Controllers\Layouts\\' . ucfirst($layout) . 'Controller';
                $controller = new $class();
        }

        $controller->show();
    }
}

if (!function_exists('request')) {
    function request()
    {
        return Request::singleton();
    }
}

if (!function_exists('session')) {
    function session()
    {
        return Session::singleton();
    }
}

if (!function_exists('storage')) {
    function storage()
    {
        return Storage::singleton();
    }
}

if (!function_exists('cookie')) {
    function cookie()
    {
        return Cookie::singleton();
    }
}

if (!function_exists('generateSalt')) {
    function generateSalt()
    {
        $salt = '';
        $saltLength = 8;

        for ($i = 0; $i < $saltLength; $i++) {
            $salt .= chr(mt_rand(33, 126));
        }
        return $salt;
    }
}

if (!function_exists('old')) {
    function old($key, $default = null)
    {
        if (!empty(session()->get('form') && !empty(session()->get('form')[$key]))) {
            return session()->get('form')[$key];
        } elseif (!empty($default)) {
            return $default;
        } else {
            return false;
        }
    }
}

if (!function_exists('route')) {
    function route($path, $data = null)
    {
        if (!empty($data)) {
            $path .= '?' . http_build_query($data);
        }
        return $path;
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        if (\session()->get('auth') == true) {
            $id = \session()->get('id');
            $user = new \App\Models\Users();
            $result = $user->select('user_role')->where(['id', '=', $id])->getOne();
            if ($result['user_role'] == 1) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('isModerator')) {
    function isModerator()
    {
        if (\session()->get('auth') == true) {
            $id = \session()->get('id');
            $user = new \App\Models\Users();
            $result = $user->select('user_role')->where(['id', '=', $id])->getOne();
            if ($result['user_role'] == 2) {
                return true;
            }
        }
        return false;
    }
}


if (!function_exists('postsCount')) {
    function postsCount($id)
    {
        $article = new Articles();
        $result = count($article->select()->where(['user_id', '=', $id])->get());
        return $result;
    }
}



function generateRandom($length)
{
    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}

function seedArticles()
{
    for ($i = 1; $i <= 30; $i++) {
        $name = generateRandom(rand(10, 30));
        $text = generateRandom(rand(100, 240));
        $sql = "INSERT INTO articles (name, text, file_path) VALUES ('$name', '$text', 'test.jpg')";
        $connection = App::singleton()->getConnection();
        $connection->query($sql);
    }
}

function clearArticles()
{
    $sql = "DELETE FROM articles WHERE id>0";
    $connection = App::singleton()->getConnection();
    $connection->query($sql);
}


