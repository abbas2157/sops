<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment, User, Course, Trainee, ModuleStep, Trainer, ClassSchedule, Task, TaskResponse, Remark};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Jobs\AssignmentRemarksMailJob;

class RemarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $task)
    {
        if(!request()->has('type') && (request()->get('type') != 'intro' && request()->get('type') != 'fundamental') ) {
            abort(404);
        }
        if(request()->get('type') == 'intro')
        {
            $task = Assignment::with('user','step','course')->where('is_move',0)->where('id',$task)->first();
            if(is_null($task))
                abort(404);
            return view('trainer.remarks.create',compact('task'));
        }
        if(request()->get('type') == 'fundamental')
        {
            $task = TaskResponse::with('batch','course','class','task','user')->where('id',$task)->first();
            if(is_null($task))
                abort(404);
            return view('trainer.remarks.create',compact('task'));
        }
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->type == 'intro')
        {
            $task = Assignment::where('id',$request->task_id)->where('is_move',0)->first();
            if(is_null($task))
                abort(404);
        }
        if($request->type == 'fundamental')
        {
            $task = TaskResponse::where('id',$request->task_id)->first();
            if(is_null($task))
                abort(404);
        }

        $remark = new Remark;
        $remark->type = $request->type;
        if($request->type == 'intro')
        {
            $remark->step_id = $task->step_id;
        }
        else
        {
            $remark->batch_id = $task->batch_id;
            $remark->class_id = $task->class_id;
            $remark->class_id = $task->class_id;
        }
        $remark->course_id = $task->course_id;
        $remark->user_id = $request->user_id;
        $remark->task_id = $request->task_id;

        $remark->completion_grade = $request->completion_grade;
        $remark->assessment_grade = $request->assessment_grade;
        $remark->remarks = $request->remarks;

        $remark->status = 'Checked';
        $remark->checked_by = Auth::user()->id;
        $remark->save();

        $task->status = 'Pass';
        $task->save();

        $validator['success'] = 'Task Checked Successfully';
        return redirect('trainer')->withErrors($validator);
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
