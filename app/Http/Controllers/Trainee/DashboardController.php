<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,User,Course,Trainee,Trainer,JoinedCourse,Batch,BatchStudent,ClassSchedule};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        date_default_timezone_set("Asia/Karachi");

        $courses = Course::with('createdby')->where('list',1)->get();
        $my_courses = JoinedCourse::where('user_id',Auth::user()->id)->where('is_move',0)->get();
        $tasks = Assignment::where('user_id',Auth::user()->id )->where('is_move',0)->get();
        $u_classes = array();
        $p_classes = array();
        $t_classes = array();
        foreach ($my_courses as $course) {
            $BatchStudent = BatchStudent::with('batch')->where(['course_id' => $course->course_id, 'user_id' => Auth::user()->id])->first();
            $course->fundamental = false;
            $course->full_skill = false;
            if(!is_null($BatchStudent))
            {
                if($BatchStudent->batch->type = 'Fundamental')
                {
                    $course->fundamental = true;
                }
                else
                {
                    $course->full_skill = true;
                }
            }
            $classes = ClassSchedule::with('batch','course')->where(['course_id' => $course->course_id])
            ->whereDate('class_date', '=', date('Y-m-d'))
            ->orderBy('id','ASC')->select('id','title','call_link','class_date','class_time','batch_id','course_id')->first();
            if(!is_null($classes))
            {
                $t_classes[] = $classes; 
            }
            $classes = ClassSchedule::with('batch','course')->where(['course_id' => $course->course_id])
                     ->whereDate('class_date', '>=', date('Y-m-d'))
                    //  ->orWhereTime('class_time', '>=', date("G:i:s"))
                     ->limit(3)
                     ->orderBy('id','ASC')->select('id','title','call_link','class_date','class_time','batch_id','course_id')->get();
            if(!is_null($classes))
            {
                foreach($classes as $class)
                {
                    $u_classes[] = $class;
                }
            }
            $classes = ClassSchedule::with('batch','course')->where(['course_id' => $course->course_id])
                     ->whereDate('class_date', '<=', date('Y-m-d'))
                    //  ->orWhereTime('class_time', '<=', date("G:i:s"))
                     ->limit(3)
                     ->orderBy('id','ASC')->select('id','title','call_link','class_date','class_time','batch_id','course_id')->get();
            if(!is_null($classes))
            {
                foreach($classes as $class)
                {
                    $p_classes[] = $class;
                }
            }
        }
        return view('trainee.index',compact('courses','my_courses','tasks','u_classes','p_classes','t_classes'));
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
