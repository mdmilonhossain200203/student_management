<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;
    
    protected $fillable = ['title','slug','description','price','duration','thumbnail','coursesTeacher','status'];
   
   
    public function teacher(){
        return $this->belongsToMany(Teacher::class,'course_teachers');
    }
}
