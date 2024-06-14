<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,Batch,Review,User,Course,Trainee};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Mail\BatchCreationEmail;
use Str;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::get();
        $batches = Batch::with('createdby','course');
        if(request()->has('id') && !empty(request()->id))
        {
            $batches->where('course_id',request()->id);
        }
        $batches = $batches->paginate(20);
        return view('admin.batches.index',compact('batches','courses'));
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
        $request->validate([
            'title' => 'required'
        ]);

        $batch = new Batch;
        $batch->uuid = Str::uuid();
        $batch->code = $request->code;
        $batch->title = $request->title;
        $batch->duration = $request->duration;
        $batch->course_id = $request->course_id;
        $batch->type = $request->type;
        $batch->created_by = Auth::user()->id;
        $batch->save();

        Mail::to(['abbas8156@gmail.com'])->send(new BatchCreationEmail($batch));

        $validator['success'] = 'Batch Created Successfully';
        return back()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
