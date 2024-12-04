<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,User,Course,TaskResponse, Workshop};
use App\Models\{Trainee, ModuleStep, Trainer, JoinedCourse, TrainerCourse};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course_id  = Auth::user()->trainer->course_id;
        $trainer_intro = TrainerCourse::where('trainer_id', Auth::user()->trainer->id)->where('course_module', 'Intro')->pluck('course_id');
        $trainer_intro_ids = array();
        if(!is_null($trainer_intro)) {
            $trainer_intro_ids = $trainer_intro->toArray();
        }
        $trainer_others = TrainerCourse::where('trainer_id', Auth::user()->trainer->id)->where('course_module', '!=', 'Intro')->pluck('course_id');
        $trainer_others_ids = array();
        if(!is_null($trainer_others)) {
            $trainer_others_ids = $trainer_others->toArray();
        }
        $course_ids = array_merge($trainer_intro_ids,$trainer_others_ids);
        $courses = Course::where('id',$course_id)->count();
        $students = JoinedCourse::whereIn('course_id', $course_ids)->where('is_move',0)->count();
        $assignments = Assignment::with('user','step','course')->where('is_move',0)->where('status','Pending')->orderBy('id','DESC')->whereIn('course_id',$trainer_intro_ids)->limit(5)->get();
        $tasks = TaskResponse::with('batch','course','class','task','user')->where('status','Pending')->whereIn('course_id', $trainer_others_ids)->limit(5)->orderBy('id','DESC')->get();
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
