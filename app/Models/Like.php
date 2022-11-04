<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = "likes";
    protected $guarded = ['id'];

    public function liking()
    {
        return $this->belongsTo(Post::class);
    }

    public function likesUsers()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    
}
