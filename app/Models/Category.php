<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id_category';

    protected $fillable = [
        'category', 'slug',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'id_category');
    }
}

