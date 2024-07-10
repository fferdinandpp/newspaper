<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newses extends Model
{
    use HasFactory;

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
        return $this->hasMany(comments::class, 'id_news');
    }
}
