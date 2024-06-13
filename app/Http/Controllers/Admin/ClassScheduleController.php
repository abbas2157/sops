<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Course,JoinedCourse,Batch,ClassSchedule};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use Illuminate\Support\Str;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassSchedule::with('course','batch','createdby');
        if(request()->has('batch') && !empty(request()->batch))
        {
            $classes->where('batch_id',request()->batch);
        }
        if(request()->has('course') && !empty(request()->course))
        {
            $classes->where('course_id',request()->course);
        }
        $classes = $classes->paginate(20);
        return view('admin.class-schedules.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::get();
        if(request()->has('course') && !empty(request()->course))
        {
            $batches = Batch::where('course_id',request()->course)->get();
        }
        else
        {
            $batches = Batch::get();
        }
        return view('admin.class-schedules.create',compact('courses','batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $class = new ClassSchedule;
        $class->uuid = Str::uuid();
        $class->title = $request->title;
        $class->class_date = $request->class_date;
        $class->class_time = $request->class_time;
        $class->call_link = $request->call_link;
        $class->type = $request->type;
        $class->batch_id = $request->batch_id;
        $class->course_id = $request->course_id;
        $class->created_by = Auth::user()->id;
        $class->save();
        
        $validator['success'] = 'Class Created Successfully';
        return back()->withErrors($validator);
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
