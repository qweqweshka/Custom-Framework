<?php

namespace src\Core\Classes;

class Storage
{

    public static function put($file)
    {
        $salt = uniqid();
        move_uploaded_file($file->file('tmp_name'), $_SERVER['DOCUMENT_ROOT'] . '/Storage/' . $salt . $file->file('name'));
    }

    public static function delete($file)
    {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/Storage/' . $file);
    }


}