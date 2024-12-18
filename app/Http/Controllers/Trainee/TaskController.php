<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,User,Course,Trainee,ModuleStep};
use App\Models\{Trainer,Task, TaskResponse, BatchTrainer};
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
        $tasks = Task::with('batch','course','class','response')->where('course_id',$course->id)->orderBy('id','DESC')->get();
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
        try {
            DB::beginTransaction();
            $tasks = Task::with('course')->where('id',$request->task_id)->first();
            $request->validate([
                'file' => 'required'
            ]);

            $task_response = new TaskResponse;
            if($request->hasFile('file'))
            {
                $file = $request->file('file');
                $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
                $file->move(public_path('trainee/tasks'),$filename);
                $task_response->file = $filename;
            }
            $task_response->user_name = Auth::user()->full_name;
            $task_response->course_id = $tasks->course_id;
            $task_response->batch_id = $tasks->batch_id;
            $task_response->class_id = $tasks->class_id;
            $task_response->task_id = $request->task_id;
            $task_response->user_id = Auth::user()->id;
            $task_response->save();

            $BatchTrainer = BatchTrainer::with('trainer')->where('course_id',$tasks->course_id)->where('batch_id',$tasks->batch_id)->get();
            foreach($BatchTrainer as $train) {
                $data = array(
                    'trainee' => Auth::user()->full_name,
                    'trainer' => $train->trainer->user->full_name,
                    'course' => $tasks->course->name,
                    // 'step_no' => $step->steps_no,
                    'assignment' => $task_response->file);
                // AssignmentSubmissionMailJob::dispatch($train->trainer->user->email, $data);
                // Mail::to($course->trainer[0]->user->email)->send(new AssignmentSubmissionMail($data));
            }
            DB::commit();
            $validator['success'] = 'Task Uploaded Successfully';
            return back()->withErrors($validator);
        } 
        catch (\Exception $e) {
            DB::rollBack();
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tasks = Assignment::with('user','step','course')->where('is_move',0)->where('course_id',$id)->where('user_id',Auth::user()->id)->paginate(20);
        if(is_null($tasks))
            abort(404);
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
