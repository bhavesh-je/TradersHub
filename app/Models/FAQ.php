<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    
    protected $guarded = ['id'];

    public function getAnswerSummaryAttribute()
    {
        return substr(strip_tags($this->attributes['answer']), 0, 80) . '...';
    }
}
