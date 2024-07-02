<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Batch,User,Course,ClassSchedule,Trainer,JoinedCourse,BatchStudent};
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
        $batches = $batches->orderBy('id','DESC')->get();
        return view('trainer.batches.index',compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function students()
    {
        $batch = Batch::findOrFail(request()->id);
        $students = BatchStudent::with('student','course')->where('course_id',$batch->course_id)->where('batch_id',request()->id)->get();
        return view('trainer.batches.students',compact('batch','students'));
    }

    public function class()
    {
        $batch = Batch::findOrFail(request()->batch);

        $classes = ClassSchedule::with('course','batch','createdby');
        if(request()->has('batch') && !empty(request()->batch))
        {
            $classes->where('batch_id',request()->batch);
        }
        $classes = $classes->get();
        return view('trainer.batches.class',compact('classes'));
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
