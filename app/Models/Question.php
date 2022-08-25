<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'topic_id',
        'que_img',
        'que_type',
        'opt_img',
    ];

    public function topics()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'que_id', 'id');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class, 'que_id', 'id');
    }
}
