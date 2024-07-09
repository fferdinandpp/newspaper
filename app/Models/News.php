<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'id_news';

    protected $fillable = [
        'title', 'news', 'tag', 'slug', 'id_category',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_news');
    }
}

