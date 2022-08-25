<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'option',
        'is_true',
        'que_id',
        'opt_img',
        'topic_id',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'opt_id', 'id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'id', 'que_id');
    }

    public function que()
    {
        return $this->belongsTo(Question::class, 'que_id', 'id');
    }
}
