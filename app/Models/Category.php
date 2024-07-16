<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $primaryKey = 'id_category';

    protected $fillable = [
        'category', 'slug',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            $category->slug = Str::slug($category->category);
        });
    }

    public function news()
    {
        return $this->hasMany(News::class, 'id_category');
    }
}
