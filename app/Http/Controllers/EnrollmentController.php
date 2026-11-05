<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Enrollment;


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

        $Enrollment = Enrollment::with('studentUser', 'course')->paginate('5');
       // dd($Enrollment);
        return view('customview/enrollment.index',compact('Enrollment'));
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

        return redirect()->route('stripe.checkout', ['amount' => $request->courseId]);

        // return redirect()->route('')
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
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment, $id)
    {
        //

        $status=Enrollment::findOrFail($id);
        dd($id);
        $status->update([

            'ayment_status'=>'active'

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
