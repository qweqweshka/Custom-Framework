<?php

namespace App\Controllers\Layouts\User;

use App\Models\Articles;
use src\Core\Classes\Controller;
use src\Core\Classes\Request;

class ArticleController extends Controller
{
    public function show()
    {
        $request = request()->get('id');
        $article = new Articles();
        $data = $article->select()->where(['id', '=', $request])->get();
        $this->render('show', $data[0]);
    }

    public function edit()
    {
        $request = request()->get('id');
        $article = new Articles();
        $data = $article->select()->where(['id', '=', $request])->get();
        $this->render('edit', $data[0]);
    }

    public function editPost()
    {
        $request = \request()->all();
        $file = request()->file('file_path');
        $article = new Articles();
        if (!empty($file['name'])) {
            $result = $article->select('file_path')->where(['id', '=', $request['id']])->getOne();
            storage()->delete($result['file_path']);
            $path = storage()->putImage();
            $article->update(['file_path' => $path], ['id', '=', $request['id']]);
        }
        $article->update(['name' => $request['name'], 'text' => $request['text']], ['id', '=', $request['id']]);
        session()->set('mess', "Changes applied");
        $this->redirectBack();
    }

    public function create()
    {
        $this->render('create');
    }

    public function createPost()
    {
        $userId = session()->get('id');
        $request = \request()->all();
        $file = request()->file('file_path');
        $article = new Articles();
        $articleId = $article->create(['name' => $request['name'], 'text' => $request['text'], 'user_id' => $userId, 'file_path' => '']);
        if (!empty($file['name'])) {
            $path = storage()->putImage();
            $article->update(['file_path' => $path], ['id', '=', $articleId]);
        }
        $this->redirectTo(route('show', ['id' => $articleId]));
    }

    public function delete()
    {
        $request = \request()->all();
        $article = new Articles();
        $result = $article->select('file_path')->where(['id', '=', $request['id']])->getOne();
        storage()->delete($result['file_path']);
        $article->delete(['id', '=', $request['id']]);
        $this->redirectTo('/');
    }
}