<?php

namespace src\Core\Classes;

class Storage
{
    private static Storage $selfInstance;

    public static function putImage()
    {
        $file = request()->file('file_path');
            $salt = uniqid();
            move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/Storage/Images/' . $salt . $file['name']);
            return '/Storage/Images/' . $salt . $file['name'];
    }

    public static function delete($file)
    {
        unlink($_SERVER['DOCUMENT_ROOT'] . $file);
    }

    public static function singleton()
    {
        if (!isset(self::$selfInstance)) {
            self::$selfInstance = new static();
        }
        return self::$selfInstance;
    }
}