<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/data',[RoleController::class,'index']);

Route::get('/teachers',[TeacherController::class,'index']);

Route::get('/course',[CourseController::class, 'index']);
Route::post('/course/store',[CourseController::class,'store']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
