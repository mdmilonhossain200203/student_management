<?php

namespace App\Models;

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'price', 'duration', 'thumbnail', 'coursesTeacher', 'status'];


    public function user()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function enrolment()
    {
        return $this->hasMany(Enrollment::class);
    }
}
