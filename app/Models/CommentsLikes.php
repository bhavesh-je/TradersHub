<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CommentsLikes extends Model
{
    use HasFactory;

    protected $table = "comments_likes";

    public function isLiked()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id')->where('is_like', 1)->where('user_id', Auth::user()->id);
    }

}
