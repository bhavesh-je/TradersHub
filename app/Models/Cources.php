<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cources extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_content',
        'course_video_link',
        'course_price',
        'course_sale_price',
        'expiration',
        'course_expiration_day',
        'cat_id',
        'course_subscription',
    ];
    
    public function CourseTopics()
    {
        return $this->hasMany(Topic::class, 'course_id', 'id')->with('questions');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'topic_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'topic_id', 'id');
    }
}
