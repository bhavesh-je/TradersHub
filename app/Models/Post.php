<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    // protected $table = "posts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'post_author',
        'post_title',
        'post_content',
        'youtube_video_link',
        'post_video_name',
        'post_image',
        'post_type',
        'post_status',
    ];

    public function getPostLikes()
    {
        return $this->hasMany(Like::class, 'post_id', 'id')->where('like_type', 1);
    }
    
    public function isLiked()
    {
        return $this->hasMany(Like::class, 'post_id', 'id')->where('like_type', 1)->where('user_id', Auth::user()->id);
    }
    
    public function getPostCommentProfile()
    {
        return $this->hasMany(User::class, 'id', 'post_author');
    }

    public function getTotalComment()
    {
        return $this->hasMany(Comment::class,'post_id', 'id');
    }

    public function getPostCommentLikes()
    {
        return $this->hasMany(CommentsLikes::class,'post_id','id')->where('is_like', 1)->where('user_id', Auth::user()->id);
    }
}
