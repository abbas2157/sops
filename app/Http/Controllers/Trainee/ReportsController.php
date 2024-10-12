<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment, User, Course, Trainee, TaskResponse, Remark, JoinedCourse};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = JoinedCourse::where('user_id',Auth::user()->id)->where('is_move',0)->first();
        $completion_grade = array();
        $assessment_grade = array();
        if(!is_null($course)) {
            $intro_remarks = Remark::where(['course_id' => $course->course_id, 'type' => 'intro'])->select('completion_grade','assessment_grade')->get();
            $completion_grade_1 = $completion_grade_2 = $completion_grade_3 = $completion_grade_4 = 0;
            $assessment_grade_1 = $assessment_grade_2 = $assessment_grade_3 = $assessment_grade_4 = $assessment_grade_5 = 0;
            foreach($intro_remarks as $intro) {
                if($intro->completion_grade == 1) {
                    $completion_grade_1 = $completion_grade_1 + 1;
                }
                if($intro->completion_grade == 2) {
                    $completion_grade_2 = $completion_grade_2 + 1;
                }
                if($intro->completion_grade == 3) {
                    $completion_grade_3 = $completion_grade_3 + 1;
                }
                if($intro->completion_grade == 4) {
                    $completion_grade_4 = $completion_grade_4 + 1;
                }
                if($intro->assessment_grade == 1) {
                    $assessment_grade_1 = $assessment_grade_1 + 1;
                }
                if($intro->assessment_grade == 2) {
                    $assessment_grade_2 = $assessment_grade_2 + 1;
                }
                if($intro->assessment_grade == 3) {
                    $assessment_grade_3 = $assessment_grade_3 + 1;
                }
                if($intro->assessment_grade == 4) {
                    $assessment_grade_4 = $assessment_grade_4 + 1;
                }
                if($intro->assessment_grade == 5) {
                    $assessment_grade_5 = $assessment_grade_5 + 1;
                }
            }
            $completion_grade = array((int) $completion_grade_1, (int) $completion_grade_2, (int) $completion_grade_3,(int) $completion_grade_4); 
            $assessment_grade = array((int) $assessment_grade_1,(int) $assessment_grade_2, (int) $assessment_grade_3, (int) $assessment_grade_4, (int) $assessment_grade_5);
        }
        return view('trainee.reports.index',compact('completion_grade','assessment_grade'));
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
