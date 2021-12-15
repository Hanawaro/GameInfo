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
}
