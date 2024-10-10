<?php

namespace App\Http\Controllers\Admin;

use App\Models\{User,Course,Trainee,ModuleStep,Trainer,JoinedCourse,Assignment};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!$request->has('uuid') || empty($request->uuid))
            abort(404);

        $course = Course::where('uuid',$request->uuid)->first();
        if(is_null($course))
            abort(404);

        $students = JoinedCourse::with('user','trainee')->where('course_id',$course->id)->where('is_move',0)->get();
        return view('admin.courses.students.index',compact('students','course'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if(!$request->has('uuid') || empty($request->uuid))
            abort(404);

        if(!$request->has('id') || empty($request->id))
            abort(404);

        $course = Course::with('trainer')->where('uuid',$request->uuid)->first();
        if(is_null($course))
            abort(404);

        $user = User::where('id',$request->uuid)->first();
        if(is_null($user))
            abort(404);
        
        $steps = Assignment::with('step')->where('is_move',0)->where('user_id',$request->id)->where('course_id',$course->id)->get();
        // dd($steps->toArray());
        return view('admin.courses.students.steps',compact('steps','course','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
