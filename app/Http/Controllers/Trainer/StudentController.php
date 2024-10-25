<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,User,Course,Trainee,ModuleStep,Trainer,JoinedCourse, TaskResponse};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = JoinedCourse::where('course_id',Auth::user()->trainer->course_id)->where('is_move',0)->pluck('user_id');
        if(!is_null($students))
        {
            $students = $students->toArray();
            $students = User::with('trainee')->whereIn('id',$students)->whereIn('type', ['trainee'])
                        ->select('id','name','last_name','email','phone','status','created_at')->get();
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
        if(request()->get('type') == 'intro') {
            $assignments = Assignment::with('user','step','course')->where('is_move',0)->orderBy('id','DESC')->where('user_id',$id)->paginate(20);
            return view('trainer.students.assignments',compact('assignments'));
        }

        $tasks = TaskResponse::with('batch','course','class','task','user')->where('user_id',$id)->orderBy('id','DESC')->paginate(20);
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
