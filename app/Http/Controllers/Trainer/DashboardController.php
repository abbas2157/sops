<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,User,Course,Trainee,ModuleStep,Trainer,JoinedCourse};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::where('id',Auth::user()->trainer->course_id)->count();
        $students = JoinedCourse::where('course_id',Auth::user()->trainer->course_id)->count();
        $tasks = Assignment::with('user','step','course')->where('status','Pending')->where('course_id',Auth::user()->trainer->course_id)->get();
        // dd($tasks->toArray());
        return view('trainer.index',compact('courses','students','tasks'));
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
