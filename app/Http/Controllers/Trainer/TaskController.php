<?php

namespace App\Http\Controllers\trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,User,Course,Trainee,ModuleStep,Trainer,ClassSchedule};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Jobs\AssignmentRemarksMailJob;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = ClassSchedule::findOrFail(request()->id);
        return view('trainer.tasks.index',compact('class'));
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
        $task = Assignment::with('user','step','course')->where('id',$id)->first();
        if(is_null($task))
        abort(404);
        // dd($tasks->toArray());
        return view('trainer.tasks.show',compact('task'));
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
        $task = Assignment::with('user')->where('id',$id)->first();
        if(is_null($task))
            abort(404);
        // dd($task);
        $task->checked_by = Auth::user()->id;
        $task->status = $request->status;
        $task->remarks = $request->remarks;
        $task->save();

        AssignmentRemarksMailJob::dispatch($task->user->email, $task);

        $validator['success'] = 'Remarks Added Succefully.';
        return redirect('trainer')->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
