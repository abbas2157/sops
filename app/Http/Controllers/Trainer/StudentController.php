<?php

namespace App\Http\Controllers\Trainer;

use App\Models\{Assignment, User, TrainerCourse, TaskResponse, JoinedCourse};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = TrainerCourse::with('course','assignedby')->where('trainer_id', Auth::user()->trainer->id)->pluck('course_id');
        $course_ids = array();
        if(!is_null($courses)) {
            $course_ids = $courses->toArray();
        }
        $students = JoinedCourse::whereIn('course_id', $course_ids)->where('is_move',0)->pluck('user_id');
        if(!is_null($students))
        {
            $students = $students->toArray();
            $students = User::with('trainee')->whereIn('id',$students)->whereIn('type', ['trainee'])->select('id','uuid','name','last_name','email','phone','status','created_at')->get();
        }
        return view('trainer.students.index',compact('students'));
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
    public function tasks(string $id)
    {
        if(!request()->has('type') && (request()->get('type') != 'intro' && request()->get('type') != 'fundamental') ) {
            abort(404);
        }
        $user = User::where('uuid', $id)->first();
        if(is_null($user)) {
            abort(404);
        }
        if(request()->get('type') == 'intro') {
            $assignments = Assignment::with('user','step','course')->where('is_move',0)->orderBy('id','DESC')->where('user_id',$user->id)->paginate(20);
            return view('trainer.students.assignments',compact('assignments'));
        }

        $tasks = TaskResponse::with('batch','course','class','task','user')->where('user_id',$user->id)->orderBy('id','DESC')->paginate(20);
        return view('trainer.students.tasks',compact('tasks'));
        
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
