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
//       $data = $articles->select()->paginate(8);
        $data = $articles->select()->where(['status', 'IS', 'NULL'])->paginate(8);
//       debug($data);
        $this->render('index', $data);
    }

    public function scrollMore()
    {

        $articles = new Articles();
        $data = $articles->select()->where(['status', 'IS', 'NULL'])->paginate1(8);
        if(!empty(request()->post('page'))){
            $nextPage = $_POST['page'] + 1 <= $data['totalPages'] ? $_POST['page'] + 1 : 0;
            $data['nextPage'] = $nextPage;
        }
        echo json_encode([
            'html' => $this->render('infiniteScroll' , $data, true),
            'nextPage' => $data['nextPage'],
        ]);
    }
}