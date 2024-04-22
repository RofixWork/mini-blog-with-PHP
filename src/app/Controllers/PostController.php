<?php

namespace App\Controllers;

use App\Helpers\Helpers;
use App\Models\Category;
use App\Models\Post;
use App\View;

class PostController
{
    public function index()
    {
        $posts = Post::fetch();
        return View::make('post/index',[
            "posts" => $posts
        ]);
    }

    public function store() : void
    {
        //get post info [title, image, category_id]
        $image = $_FILES['post_image']['name'] ?? null;
        $title = $_POST['title'] ?? null;
        $category_id = $_POST['category'] ?? null;

        //check fields
        if(!$title || !$category_id || !$image)
        {
            setcookie('post_message_error', 'please fill data', strtotime('+1 second'), '/');
            Helpers::redirect('/');
        }

        //image extension
        $image_extension = explode('.', $_FILES['post_image']['name'])[1];

        //extensions support
        $extensions = ['png', 'jpg', 'jpeg'];

        if(!in_array($image_extension, $extensions))
        {
            setcookie('post_message_error', "[$image_extension] not supported this format", strtotime('+1 second'), '/');
            Helpers::redirect('/');
        }

        //get image name
        $image_name = uniqid('post_image_') . "." . $image_extension;

        //create image path
        $image_path = STORAGE_PATH . "/" . $image_name;

        //upload image
        $is_uploaded = move_uploaded_file($_FILES['post_image']['tmp_name'], $image_path);

        // save image is success
        if($is_uploaded)
        {
            //create a new post
            Post::query()->create([
                'title' => $title,
                'category_id' => $category_id,
                'image' => $image_name
            ]);

            //redirect to home page
            Helpers::redirect('/');
        }

    }

    public function delete()
    {
        //get id from query string and check
        $id = $_GET['post_id'] ?? null;
        if(!$id)
        {
            Helpers::redirect('/posts');
        }

        //get post by id
        $post = Post::findBy($id);

        //check [exist or not]
        if(!$post)
        {
            Helpers::redirect('/posts');
        }

        //delete post
        $post->delete();
        Helpers::redirect('/posts');
    }
}