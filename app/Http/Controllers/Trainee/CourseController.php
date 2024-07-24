<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Course,Trainee,ModuleStep,Trainer,JoinedCourse,ClassSchedule,Task, Library};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('createdby')->where('list',1)->get();
        $my_courses = JoinedCourse::where('user_id',Auth::user()->id)->get();
        return view('trainee.courses.index',compact('courses','my_courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(!$request->has('uuid') || empty($request->uuid))
            abort(404);
        $course = Course::where('uuid',$request->uuid)->first();
        if(is_null($course))
            abort(404);
        
        $join = new JoinedCourse;
        $join->course_id = $course->id;
        $join->user_id = Auth::user()->id;
        $join->trainee_id = Auth::user()->trainee->id;
        $join->type = 'Intro';
        $join->status = 'Processing';
        $join->save();

        return back();
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
        date_default_timezone_set("Asia/Karachi");

        if(!$request->has('uuid') || empty($request->uuid))
            abort(404);
        if(!$request->has('uuid') || empty($request->uuid) && !in_array($request->type,['fundamental','full-skill']))
            abort(404);
        $course = Course::where('uuid',$request->uuid)->first();
        if(is_null($course))
            abort(404);

        $u_classes = array();
        $p_classes = array();
        $t_classes = array();

        $classes = ClassSchedule::with('batch','course')->where(['course_id' => $course->id])
        ->whereDate('class_date', '=', date('Y-m-d'))
        ->orderBy('id','ASC')->select('id','title','call_link','class_date','class_time','batch_id','course_id')->first();
        if(!is_null($classes))
        {
            $t_classes[] = $classes; 
        }
        $classes = ClassSchedule::with('batch','course')->where(['course_id' => $course->id])
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
        $classes = ClassSchedule::with('batch','course')->where(['course_id' => $course->id])
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

        $libraries = Library::with('batch','course')->where('course_id',$course->id)->orderBy('id','DESC')->limit(3)->get();
        $tasks = Task::with('batch','course','class')->where('course_id',$course->id)->orderBy('id','DESC')->get();
        return view('trainee.courses.show',compact('course','u_classes','p_classes','t_classes','libraries','tasks'));
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
