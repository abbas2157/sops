<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,Review,User,Course,Trainee};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Mail\AssignmentRemarksMail;
use App\Jobs\AssignmentRemarksMailJob;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Assignment::with('user','step','course')->where('is_move',0)->where('status','Pending');
        if(request()->has('user') && !empty(request()->user))
        {
            $tasks->where('user_id',request()->user);
        }
        $tasks = $tasks->paginate(20);
        return view('admin.tasks.index',compact('tasks'));
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
        $task = Assignment::with('user','step','course')->where('is_move',0)->where('id',$id)->first();
        if(is_null($task))
        abort(404);
        // dd($tasks->toArray());
        return view('admin.tasks.show',compact('task'));
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
        $task = Assignment::with('user')->where('is_move',0)->where('id',$id)->first();
        if(is_null($task))
            abort(404);
        // dd($task);
        $task->checked_by = Auth::user()->id;
        $task->status = $request->status;
        $task->remarks = $request->remarks;
        $task->save();

        // Mail::to($task->user->email)->send(new AssignmentRemarksMail($task));
        AssignmentRemarksMailJob::dispatch($task->user->email, $task);
        $validator['success'] = 'Remarks Added Succefully.';
        return back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
