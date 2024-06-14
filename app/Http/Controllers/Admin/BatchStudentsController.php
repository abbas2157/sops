<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,Batch,JoinedCourse,User,Course,BatchStudent};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Mail\AddedToBatchEmail;
use Str;

class BatchStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            
        return view('admin.batch-students.index',compact('batch','students','joined'));
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
        $batch = Batch::findOrFail($request->batch_id);
        $al_stds = array();
        $al_stds = BatchStudent::where(['batch_id' =>$request->batch_id])->pluck('user_id');
        if(!is_null($al_stds))
        {
            $al_stds = $al_stds->toArray();
            $diff_students = $result=array_diff($request->students,$al_stds);
        }
        if($request->has('students') && !empty($request->students))
        {
            BatchStudent::where(['batch_id' =>$request->batch_id])->delete();
            for($i = 0; $i < count($request->students); $i++)
            {
                $batch_students = new BatchStudent;
                $batch_students->batch_id = $request->batch_id;
                $batch_students->user_id = $request->students[$i];
                $batch_students->course_id = $batch->course_id;
                $batch_students->created_by = Auth::user()->id;
                $batch_students->save(); 
            }
        }

        $students = User::with('trainee')->whereIn('id',$diff_students)->whereIn('type', ['trainee'])->pluck('email');
        $batch = Batch::with('course')->where('id', $request->batch_id)->first();
        if(!is_null($students))
        {
            $students = $students->toArray();
            Mail::to($students)->send(new AddedToBatchEmail($batch));
        }

        $validator['success'] = 'Batch Updated Successfully';
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
