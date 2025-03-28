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
        $complete_percenatge = 0;
        $assessment_pecentage = 0;
        if(!is_null($course)) {
            $intro_remarks = Remark::where(['user_id' => Auth::user()->id,'course_id' => $course->course_id, 'type' => 'intro'])->whereNotNull('assessment_grade')->select('completion_grade','assessment_grade')->get();
            foreach($intro_remarks as $intro) {
                $completion_grade[] = (int) $intro->completion_grade;
                $assessment_grade[] = (int) $intro->assessment_grade;
                $complete_percenatge = $complete_percenatge + (int) $intro->completion_grade;
                $assessment_pecentage = $assessment_pecentage + (int) $intro->assessment_grade;
            }
            if($complete_percenatge > 0) {
                $complete_percenatge = round($complete_percenatge / (count($intro_remarks)*3),2) * 100;
            }
            if($assessment_pecentage > 0) {
                $assessment_pecentage = round($assessment_pecentage / (count($intro_remarks)*4),2) * 100;
            }
        }
        return view('trainee.reports.index',compact('completion_grade','assessment_grade','complete_percenatge', 'assessment_pecentage'));
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
