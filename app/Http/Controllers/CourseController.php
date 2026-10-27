<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
       $courses= Course::all();
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $teacher= Teacher::all();
        return view('course.create', compact('teacher'));
    
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {



         $courses = Course::with('teacher')->get();
        // dd($courses);

    //    foreach ($courses as $course) {
    //      foreach ($course->teacher as $teacher) {
    //         dump($teacher->teachersName);
    //             // dump($course->teacher->techersName);
    //       }
    //    }



        //     foreach ($course->teacher as $teacher)
        //         <p>{{ $teacher->teachersName }}</p>
        //     endforeach
        //   endforeach



        // Course::create([

        //     'title'=> $request->coureseTitle,
        //     'slug'=> strtolower($request->coureseTitle),
        //     'description'=> $request->description,
        //     'price'=> $request->price, 
        //     'duration'=> $request->duration,
        //     'thumbnail'=> $request->thumbnail, 
        //     'coursesTeacher'=>1 ,
        //     'status'=> $request->status,

        // ]);

        $course = Course::create([
            'title' => $request->courseTitle,
            'slug' => Str::slug($request->courseTitle),
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status,
        ]);

        $course->teacher()->attach($request->teacher);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
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
