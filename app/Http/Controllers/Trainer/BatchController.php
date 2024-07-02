<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Batch,User,Course,Trainee,ModuleStep,Trainer,JoinedCourse,BatchStudent};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::with('createdby','course');
        if(request()->has('id') && !empty(request()->id))
        {
            $batches->where('course_id',request()->id);
        }
        $batches = $batches->paginate(20);
        return view('trainer.batches.index',compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function students()
    {
        $batch = Batch::findOrFail(request()->id);
        $students = JoinedCourse::where('type','intro')->where('course_id',$batch->course_id)->pluck('user_id');
        if(!is_null($students))
        {
            $students = $students->toArray();
            $students = User::with('trainee')->whereIn('id',$students)->whereIn('type', ['trainee'])
                        ->select('id','name','last_name','email','phone','status','created_at')->get();
        }
        $joined = BatchStudent::where('course_id',$batch->course_id)->where('batch_id',request()->id)->pluck('user_id');
        if(is_null($joined))
            $joined = array();
        else
            $joined = $joined->toArray();

        return view('trainer.batches.students',compact('batch','students','joined'));
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
