<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,User,Course,Trainee,ModuleStep,Trainer,JoinedCourse, TaskResponse, Workshop};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course_id = Auth::user()->trainer->course_id;
        $courses = Course::where('id',$course_id)->count();
        $students = JoinedCourse::where('course_id',$course_id)->where('is_move',0)->count();
        $assignments = Assignment::with('user','step','course')->where('is_move',0)->where('status','Pending')->orderBy('id','DESC')->where('course_id',$course_id)->limit(5)->get();
        $tasks = TaskResponse::with('batch','course','class','task','user')->where('status','Pending')->where('course_id',$course_id)->orderBy('id','DESC')->get();
        $workshops = Workshop::whereDate('workshop_date', '>=', date('Y-m-d'))->where('trainer_id',Auth::user()->trainer->id)->get();
        return view('trainer.index',compact('courses','students','assignments','tasks','workshops'));
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
