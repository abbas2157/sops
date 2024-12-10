<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment, Batch, TrainerCourse, User, Course, BatchTrainer};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Mail\AddedToBatchEmail;
use App\Jobs\AddToBatchEmailJob;
use Str;

class BatchTrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!request()->has('id')) {
            return abort(404);
        }
        $batch = Batch::findOrFail(request()->id);
        $trainers = TrainerCourse::where('course_id',$batch->course_id)->where('course_module', $batch->type)->pluck('trainer_id');
        if(!is_null($trainers)) {
            $trainers_ids = $trainers->toArray();
            $trainers = User::with('trainer')->whereIn('id',$trainers_ids)->whereIn('type', ['trainer'])->select('id','name','last_name','email','phone','status','created_at')->get();
        }
        $joined = BatchTrainer::where('course_id',$batch->course_id)->where('course_module', $batch->type)->where('batch_id',request()->id)->pluck('trainer_id');
        if(is_null($joined))
            $joined = array();
        else
            $joined = $joined->toArray();

        return view('admin.batch-trainers.index',compact('batch','trainers','joined'));
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

            $batch = Batch::findOrFail($request->batch_id);
            if($request->has('trainers') && !empty($request->trainers)) {
               
                BatchTrainer::where(['batch_id' => $request->batch_id])->delete();
                for($i = 0; $i < count($request->trainers); $i++) {

                    $batch_trainers = new BatchTrainer;
                    $batch_trainers->batch_id = $request->batch_id;
                    $batch_trainers->trainer_id = $request->trainers[$i];
                    $batch_trainers->course_id = $batch->course_id;
                    $batch_trainers->course_module = $request->course_module;
                    $batch_trainers->assigned_by = Auth::user()->id;
                    $batch_trainers->save();
                }
            }

            DB::commit();

            $validator['success'] = 'Batch Assigned Successfully';
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
    public function destroy(string $id)
    {
        //
    }
}
