<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$student = User::where('role_id','3')->get();
        //dd($student);
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $teacher= Teacher::all();
        $users = User::where('role_id', '2')->get();

        // dd($users);
        return view('course.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {


        // $courses = Course::with('teacher',)->get();
        // dd($courses);


        //dd($request->teacher);

        $course = Course::create([
            'title' => $request->courseTitle,
            'slug' => Str::slug($request->courseTitle),
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status,
        ]);

        // $userId =  Auth::user()->id;
       
        $course->user()->attach($request->teacher);
        // $course->userStudent()->attach($userId);

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, $id)
    {
        $course = Course::with('user')->find($id);

        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
