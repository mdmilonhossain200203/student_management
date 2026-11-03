<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/data',[RoleController::class,'index']);

Route::get('/teachers',[TeacherController::class,'index']);
Route::get('/teachers/create',[TeacherController::class,'create']);
Route::post('/teacher/store',[TeacherController::class,'store']);

//Route::get('/course',[CourseController::class,'index'])->middleware('admin');

Route::get('/course',[CourseController::class,'index']);
Route::get('/course/create',[CourseController::class,'create']);
Route::post('/course/store',[CourseController::class,'store']);
Route::get('/course/show/{slug}',[CourseController::class,'show']);

Route::get('/enrollment',[EnrollmentController::class,'index']);
Route::get('/enrollment/create',[EnrollmentController::class,'create']);
Route::post('/enrollment/store',[EnrollmentController::class,'store']);

Route::get('/student',[StudentController::class,'index']);

Route::get('/user',[UserController::class,'index']);
Route::get('user/edit/{id}',[UserController::class,'edit']);
Route::put('/user/update/{id}',[UserController::class,'update']);


Route::middleware(['admin'])->group(function (){

Route::get('/user',[UserController::class,'index']);
Route::get('user/edit/{id}',[UserController::class,'edit']);
Route::put('/user/update/{id}',[UserController::class,'update']);

});



// Route::middleware(['admin' 'student'])->group(
//     Route::get('/course',[CourseController::class,'index'])->name('thecourse')
// );

// Route::middleware(['student'])->group(
//     Route::get('/course',[CourseController::class,'index'])
// );





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


