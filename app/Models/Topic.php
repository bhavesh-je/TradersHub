<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'topic_name',
        'duration_measure',
        'duration',
        'passing_grade',
        're_take_cut',
        'topic_subscription',
        'course_id',
        'created_by',
    ];

    public function courses()
    {
        return $this->belongsTo(Cources::class, 'course_id', 'id');
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
