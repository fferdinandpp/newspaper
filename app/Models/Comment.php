<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'id_comment';

    protected $fillable = [
        'comment', 'id_news', 'id_user',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'id_news');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

