<?php

namespace App\Http\Controllers\trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,User,Course,Trainee,ModuleStep,Trainer,ClassSchedule, Task};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Jobs\AssignmentRemarksMailJob;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = Task::where('batch_id',request()->batch_id)->get();
        return view('trainer.tasks.index',compact('tasks'));
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
        // dd($request->all());
        $request->validate([
            'title' => 'required'
        ]);
        if ($request->hasfile('document')) {
            // dd($request->all());
        foreach ($request->file('document') as $file)
            {
                $task = new Task();
                $task->title = $request->title;
                $task->batch_id = $request->batch_id;
                $task->course_id = $request->course_id;
                $task->class_id = $request->class_id;
                $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
                $file->move(public_path('task/document'),$filename);
                $task->file = $filename;
                $task->type = $request->type;
                $task->uploaded_by = auth()->user()->id;
                $task->due_date = $request->due_date;
                $task->save();
            }
        }
        $validator['success'] = 'Task Created Successfully';
        return back()->withErrors($validator);
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
        $task = Task::findOrFail($id);
            if (file_exists(public_path('task/document/' . $task->file))) {
                unlink(public_path('task/document/' . $task->file));
            }
        $task->delete();
        $validator['success'] = 'Task Deleted Successfully';
        return back()->withErrors($validator);
    }
}
