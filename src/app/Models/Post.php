<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'category_id'];


    //get all posts
    public static function fetch() : Collection
    {
        return static::query()->orderByDesc('updated_at')->get();
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public static function findBy(int $id) : ?Model
    {
        return static::query()->firstWhere('id', $id);
    }
}