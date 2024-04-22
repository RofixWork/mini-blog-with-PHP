<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

class Category extends Model
{
    protected $fillable = ['name'];

    //get all categories
    public static function fetch() : Collection
    {
        return static::query()->orderByDesc('updated_at')->get();
    }

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }

}