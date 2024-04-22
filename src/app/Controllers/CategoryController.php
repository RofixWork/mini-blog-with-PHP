<?php

namespace App\Controllers;

use App\Helpers\Helpers;
use App\Models\Category;
use App\View;

class CategoryController
{
    public function index()
    {
        //get all categories by fetch method (this method get all categories and order desc by updated_at attribute)
        $categories = Category::fetch();
        return View::make('category/index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        //get category and check is exist or not
        $category_name = $_POST['name'] ?? null;

        if(!$category_name)
        {
            header('Location: /categories');
            exit();
        }

        //create a new category
        Category::query()->create([
            'name' => $category_name
        ]);
        //redirect after creation
        Helpers::redirect('/categories');
    }

    public function edit()
    {
        //get category by id
        $category_id = $_GET['category_id'];
        $find_category_by_id = Category::query()->find($category_id);

        //check this category [exist or not]
        if(!$find_category_by_id)
        {
            Helpers::redirect('/categories');
        }

        return View::make('category/edit', [
            'category' => $find_category_by_id
        ]);
    }

    public function update()
    {
        //get id and name
        $category_id = $_POST['id'];
        $category_name = $_POST['name'] ?? null;

        //get category by id
        $find_category_by_id = Category::query()->find($category_id);

        //this category not found
        if(!$find_category_by_id)
        {
            Helpers::redirect('/categories');
        }

        //user not enter a category name
        if(!$category_name)
        {
            //set message ['please enter category name'] by cookie
            setcookie('category_message_error', 'please enter category name', strtotime('+1 minute'));
            Helpers::redirect('/categories/edit?category_id=' . $category_id);
        }

        //update category name
        $find_category_by_id->update([
            'name' => $category_name
        ]);
        //remove message error from category
        setcookie('category_message_error', "", strtotime('-1 minute'));
        //redirect
        Helpers::redirect('/categories');

    }

    public function delete()
    {
        //get category id in query string
        $category_id = $_GET['category_id'];

        //get category by id
        $find_category_by_id = Category::query()->find($category_id);

        //category nit exist
        if(!$find_category_by_id)
        {
            Helpers::redirect('/categories');
        }

        //delete category
        $find_category_by_id->delete();
        Helpers::redirect('/categories');

    }
}