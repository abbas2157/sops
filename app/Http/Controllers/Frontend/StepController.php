<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Course,Trainee,ModuleStep,Trainer,JoinedCourse,Review,Assignment,Comment,FinancialSupport,Payment};
use Illuminate\Support\Facades\Auth;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!$request->has('uuid') || empty($request->uuid))
            abort(404);

        $course = Course::where('uuid',$request->uuid)->first();
        if(is_null($course))
            abort(404);

        $joined = JoinedCourse::where(['course_id' => $course->id, 'user_id' => Auth::user()->id])->first(); 
        if(is_null($joined)) {
            return redirect('trainee');
        }
        $intros = ModuleStep::where('course_id',$course->id)->with('createdby')->withCount('trainee_assignment')->get();
        $complete = JoinedCourse::where(['course_id' => $course->id, 'user_id' => Auth::user()->id, 'status' => 'Completed'])->count();
        $payment = Payment::where(['course_id' => $course->id, 'user_id' => Auth::user()->id, 'status' => 'Coupon'])->count();
        $support = FinancialSupport::where(['course_id' => $course->id, 'user_id' => Auth::user()->id])->count();
        return view('frontend.steps.index',compact('intros','course','support','complete','payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
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
    public function show(Request $request)
    {
        if(!$request->has('uuid') || empty($request->uuid))
        abort(404);

        $intro = ModuleStep::where('uuid',$request->uuid)->with('createdby','course')->first();
        if(is_null($intro))
            abort(404);
        
        $course = Course::where('id',$intro->course_id)->first();
        if(is_null($course))
            abort(404);
        $joined = JoinedCourse::where(['course_id' => $course->id, 'user_id' => Auth::user()->id])->first(); 
        if(is_null($joined))
            return redirect('trainee');

        $reviews = Review::where('course_id',$intro->course_id)->get();
        $comments = Comment::with('replies')->where('step_id',$intro->id)->where('show','1')->get();
        $assignments = Assignment::where('course_id',$intro->course_id)->where('step_id',$intro->id)->where('user_id',Auth::user()->id)->get();
        // dd($assignments->toArray());
        return view('frontend.steps.detail',compact('intro','course','reviews','assignments','comments'));
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
