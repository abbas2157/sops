<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,User,Course,Trainee,ModuleStep,Trainer,Task};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::where('uuid',request()->course)->first();
        if(is_null($course))
            abort(404);
        $tasks = Task::with('batch','course','class')->where('course_id',$course->id)->orderBy('id','DESC')->get();
        return view('trainee.tasks.list',compact('tasks'));
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
        $tasks = Assignment::with('user','step','course')->where('course_id',$id)->where('user_id',Auth::user()->id)->paginate(20);
        if(is_null($tasks))
            abort(404);
        // dd($tasks->toArray());
        return view('trainee.tasks.index',compact('tasks'));
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
