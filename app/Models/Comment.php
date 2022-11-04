<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "posts_comments";

    public function commnetUsers()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function getPostCommentLikes()
    {
        return $this->hasMany(CommentsLikes::class,'comment_id','id');
    }
}
