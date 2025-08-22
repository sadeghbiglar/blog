<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Morilog\Jalali\Jalalian;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'user_id', 'image', 'published_at', 'views'];
// App\Models\Post.php

public function getPublishedAtJalaliAttribute()
{
    return $this->published_at
        ? Jalalian::fromDateTime($this->published_at)->format('Y/m/d')
        : null;
}

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
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }
}
