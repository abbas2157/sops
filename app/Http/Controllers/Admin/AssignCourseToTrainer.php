<?php

namespace App\Http\Controllers\Admin;

use App\Models\{User,Course,Trainer, TrainerCourse};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\WelcomeEmail;
use Exception;

class AssignCourseToTrainer extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assigns = TrainerCourse::orderBy('id', 'DESC');
        if(request()->has('trainer') && !empty(request()->trainer)) {
            $assigns->where('trainer_id', request()->trainer);
        }
        if(request()->has('course') && !empty(request()->course)) {
            $assigns->where('course_id', request()->course);
        }
        $assigns = $assigns->paginate(20);

        $trainers = User::where('type', 'trainer')->select('id', 'name', 'last_name')->get();
        $courses = Course::select('id', 'name')->get();
        return view('admin.assigns.index',compact('assigns','trainers', 'courses'));
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
            $assign = TrainerCourse::where(['trainer_id' => $request->trainer_id, 'course_id' => $request->course_id, 'course_module' => $request->type])->first();
            if(!is_null($assign)) {
                $validator['success'] = 'Course Already Assigned.';
                return back()->withErrors($validator);
            }
            $assign = new TrainerCourse;
            $assign->trainer_id = $request->trainer_id;
            $assign->course_id = $request->course_id;
            $assign->course_module = $request->type;
            $assign->assigned_by = Auth::user()->id;
            $assign->save();
            DB::commit();

            $validator['success'] = 'Course Assigned Successfully';
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
    public function remove(string $id)
    {
        try {
            DB::beginTransaction();
            $assign = TrainerCourse::findOrFail($id);
            $assign->delete();
            DB::commit();

            $validator['success'] = 'Course Assigned Remove Successfully';
            return back()->withErrors($validator);
        } 
        catch (\Exception $e) {
            DB::rollBack();
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
        }
    }
}
