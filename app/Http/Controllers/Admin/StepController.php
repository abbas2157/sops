<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\{Course,ModuleStep};

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!$request->has('id') || empty($request->id))
        abort(404);

        $course = Course::where('uuid',$request->id)->select('id','uuid','name')->first();
        if(is_null($course))
        abort(404);

        $steps = ModuleStep::where('course_id',$course->id)->where('type',$request->type)->with('createdby')->get();
        // dd($intros->toArray());
        return view('admin.steps.index',compact('steps','course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(!$request->has('id') || empty($request->id))
        abort(404);

        $course = Course::where('uuid',$request->id)->select('id','uuid','name')->first();
        if(is_null($course))
        abort(404);
    
        $intros = ModuleStep::where('course_id',$course)->count();
        return view('admin.steps.create',compact('intros','course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uuid = Str::uuid();
        $intro = new ModuleStep;
        $intro->uuid = $uuid;
        $intro->steps_no = $request->steps_no;
        $intro->title = $request->title;
        $intro->video = $request->video;
        $intro->course_id = $request->course_id;
        $intro->type = $request->type;
        $intro->lock = isset($request->lock) ? 0 : 1;
        $intro->created_by = Auth::user()->id;
        $intro->short_description = $request->short_description;
        $intro->description = $request->description;
        if($request->hasFile('assignment'))
        {
            $file = $request->file('assignment');
            $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
            $file->move(public_path('course/intro/assignments'),$filename);
            $intro->assignment = $filename;
        }
        $intro->save();
        $validator['success'] = 'Step has been Created Successfully';
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
