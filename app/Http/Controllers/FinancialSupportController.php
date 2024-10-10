<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Course,Payment, FinancialSupport};
use Illuminate\Support\Facades\{Auth, Hash, Mail, DB, Cookie};

class FinancialSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::where('uuid', $id)->first();
        if(is_null($course))
            abort(404);
        return view('financial-support.show',compact('course'));
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
        $course = Course::where('uuid',$id)->first();
        if(is_null($course)) {
            $validator['error'] = 'Course not found.';
            return back()->withErrors($validator);
        }
        try {
            DB::beginTransaction();

            $support = new FinancialSupport;
            $support->level_of_education = $request->level_of_education;
            $support->currency = $request->currency;
            $support->annual_income = $request->annual_income;
            $support->employee_status = $request->employee_status;
            $support->financial_aid = $request->financial_aid;
            $support->amount_you_can_pay = $request->amount_you_can_pay;
            $support->amount_must_pay = $request->amount_must_pay;
            $support->your_goals = $request->your_goals;
            $support->course_id = $course->id;
            $support->user_id = Auth::user()->id;
            $support->save();

            DB::commit();
            $validator['success'] = 'Your request has been sent.';
            return redirect('trainee')->withErrors($validator);
        } 
        catch (\Exception $e) {
            DB::rollBack();
            $validator['success'] = $e->getMessage();
            return back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
