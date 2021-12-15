<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'views',
        'like',
        'dislike',
    ];

    public function previews()
    {
        return $this->hasMany(Preview::class);
    }
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function rate() {
        $likes = $this->hasMany(Like::class)->where('liked', true)->count();
        $dislikes = $this->hasMany(Like::class)->where('liked', false)->count();

        return $likes - $dislikes;
    }
    public function comments() {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}
