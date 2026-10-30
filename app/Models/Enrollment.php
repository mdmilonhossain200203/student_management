<?php

namespace App\Models;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /** @use HasFactory<\Database\Factories\EnrollmentFactory> */
    use HasFactory;
    //

    protected $fillable = ['course_id', 'payment_status'];

    public function studentUser()
    {
        return $this->belongsToMany(User::class, 'enrollment_student','enrollment_id','user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
