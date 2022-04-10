<?php

namespace App\Controllers;


use App\Models\Articles;
use App\Models\Users;
use src\Core\Classes\Controller;
use src\Core\Classes\Request;
use src\Core\Classes\Storage;


class IndexController extends Controller
{
    public function index()
    {
        $articles = new Articles();
       $data = $articles->select(['id', 'name', 'text', 'user_id', 'file_path', 'status'])->paginate(8);
        $this->render('index' , $data);
    }
}