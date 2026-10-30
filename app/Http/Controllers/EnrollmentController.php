<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $users = User::where('id', '1')->get();
        // dd($users);

        //  $courses = Course::where('id','1')->first();
        //  dd($courses);

        $Enrollment = Enrollment::with('user', 'course')->get();
        dd($Enrollment);
        return view('customview/enrollment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request)
    {

        // dd($request->studentId);

        // $Enrollment->studentUser()->attach($request->studentId);


        $enrollment = Enrollment::create([

            'course_id' => $request->courseId,
            'payment_status' => 'default',
        ]);

        $enrollment->studentUser()->syncWithoutDetaching($request->studentId);
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
