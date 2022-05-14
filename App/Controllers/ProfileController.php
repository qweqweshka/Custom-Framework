<?php

namespace App\Controllers;

use App\Models\Users;
use src\Core\Classes\Controller;

class ProfileController extends Controller
{
    public function profilePage()
    {
        $user = new Users();
        $data = $user->select()->where(['id', '=', session()->get('id')])->getOne();
        $this->render('profile', $data);
    }

    public function userUpdate()
    {
        $request = request()->all();
        $file = request()->file('file_path');
        $user = new Users();
        debug($request);
        if (!empty($file['name'])) {
            $result = $user->select('file_path')->where(['id', '=', session()->get('id')])->getOne();
            storage()->delete($result['file_path']);
            $path = storage()->putImage();
            $user->update(['file_path' => $path], ['id', '=', session()->get('id')]);
        }
        $user->update(['name' => $request['name'], 'surname' => $request['surname'], 'phone' => $request['phone']], ['id', '=', session()->get('id')]);
        session()->set('mess', "Profile updated");
        $this->redirectBack();
    }
}