<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Course,Trainee,ModuleStep,Trainer,JoinedCourse};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('createdby')->where('list',1)->get();
        $my_courses = JoinedCourse::where('user_id',Auth::user()->id)->get();
        return view('trainee.courses.index',compact('courses','my_courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(!$request->has('uuid') || empty($request->uuid))
            abort(404);
        $course = Course::where('uuid',$request->uuid)->first();
        if(is_null($course))
            abort(404);
        $join = new JoinedCourse;
        $join->course_id = $course->id;
        $join->user_id = Auth::user()->id;
        $join->trainee_id = Auth::user()->trainee->id;
        $join->save();
        return back();
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
    public function show(string $id)
    {
        //
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
