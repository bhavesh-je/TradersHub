<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_c_name',
        'slug',
        'parent',
        'description',
    ];

    public function CourseCategories()
    {
        return $this->hasMany(CourseCategories::class, 'parent');
    }

    public function childrenCourseCategories()
    {
        return $this->hasMany(CourseCategories::class, 'parent')->with('CourseCategories');
    }
}
