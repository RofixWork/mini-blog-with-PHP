<?php

namespace App\Helpers;

class Helpers
{
    public static function redirect(string $uri) : never
    {
        header('Location: ' . $uri);
        exit();
    }

    public static function getImage(string $image) : string
    {
        return 'data:image/jpeg;base64,' . base64_encode(file_get_contents(STORAGE_PATH . '/' . $image));
    }
}