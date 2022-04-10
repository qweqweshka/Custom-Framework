<?php

namespace App\Controllers\Layouts;


use App\Models\Articles;
use src\Core\Classes\Controller;
use src\Core\Classes\View;


class FooterController extends Controller
{
    public function show()
    {
//        $articles = new Articles();
//        $data = $articles->select(['id', 'name', 'text', 'user_id', 'file_path', 'status'])->paginate(8);
        $this->render('Layouts.footer');
    }
}