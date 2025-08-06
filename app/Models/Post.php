<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'user_id', 'image', 'published_at', 'views', 'likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
