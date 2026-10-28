<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/data',[RoleController::class,'index']);

Route::get('/teachers',[TeacherController::class,'index']);
Route::get('/teachers/create',[TeacherController::class,'create']);
Route::post('/teacher/store',[TeacherController::class,'store']);

Route::get('/course',[CourseController::class,'index']);
Route::get('/course/create',[CourseController::class,'create']);
Route::post('/course/store',[CourseController::class,'store']);
Route::get('/course/show/{id}',[CourseController::class,'show']);


Route::get('/enrollment',[EnrollmentController::class,'index']);
Route::get('/enrollment/create',[EnrollmentController::class,'create']);
Route::get('/enrollment/store',[EnrollmentController::class,'store']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
