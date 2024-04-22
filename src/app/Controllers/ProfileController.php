<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\View;

class ProfileController
{
    public function index()
    {
        $categoriesCount = Category::query()->count();
        $postsCount = Post::query()->count();
        return View::make('profile/index',
        [
            'postsCount' => $postsCount,
            'categoriesCount' => $categoriesCount
        ]);
    }
}