<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_news';

    protected $fillable = [
        'title', 'news', 'id_category', 'tag', 'slug', 'image',
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
