<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $with = ['user'];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post() 
    {
        return $this->belongsTo(Post::class);
    }

    public function blog() 
    {
        return $this->belongsTo(Blog::class);
    }

    public function photo() 
    {
        return $this->belongsTo(Photo::class);
    }
}
