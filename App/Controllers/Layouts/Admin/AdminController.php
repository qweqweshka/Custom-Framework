<?php

namespace App\Controllers\Layouts\Admin;

use App\Models\Articles;
use App\Models\Users;
use src\Core\Classes\Controller;

class AdminController extends Controller
{
    public function panel()
    {
        $article = new Articles();
        $data['articles'] = $article->select()->paginate(10);
        $user = new Users();
        $data['users'] = $user->select()->paginate(10);
        $this->render('admin', $data);
    }
}