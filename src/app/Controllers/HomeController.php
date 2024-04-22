<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\View;

class HomeController
{
    public function index()
    {
        $categories = Category::fetch();
        $posts = Post::fetch();

        return View::make('welcome',
        [
            "categories" => $categories,
            'posts' => $posts
        ]);
    }

}