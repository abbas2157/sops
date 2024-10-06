<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment, User,Course,Trainee,ModuleStep,Trainer,JoinedCourse,ClassSchedule,Task, Library,Batch,BatchStudent};
use Illuminate\Support\Facades\{Auth, Hash, Mail, DB, Cookie};

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_courses = JoinedCourse::where('user_id',Auth::user()->id)->get();
        $joined_array= [];
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
            $joined_array[] = $course->course_id;
        }
        $courses = Course::with('createdby')->whereNotIn('id',$joined_array)->where('list',1)->get();
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
    public function store(Request $request, $id)
    {
        $course = Course::where('uuid',$id)->first();
        if(is_null($course)) {
            abort(404);
        }
        Cookie::queue('course', $id, 1000);
        return redirect('payments');
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
        $t_tasks = Task::with('batch','course','class','response')->where('type','Technical')->where('course_id',$course->id)->orderBy('id','DESC')->limit(5)->get();
        $tasks = Task::with('batch','course','class','response')->where('type','Personal Development')->where('course_id',$course->id)->orderBy('id','DESC')->limit(5)->get();
        return view('trainee.courses.show',compact('course','u_classes','p_classes','t_classes','libraries','tasks','t_tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function move(string $id)
    {
        $from_course = Course::where('uuid',$id)->first();
        if(is_null($from_course)) {
            abort(404);
        }
        $my_courses = JoinedCourse::where('user_id',Auth::user()->id)->get();
        $joined_array= [];
        foreach ($my_courses as $course) {
            $joined_array[] = $course->course_id;
        }
        $courses = Course::with('createdby')->whereNotIn('id',$joined_array)->where('list',1)->get();
        return view('trainee.courses.move',compact('courses','from_course'));
    }

    public function move_perform(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $from_course = Course::where('id',$from)->first();
        if(is_null($from_course)) {
            abort(404);
        }
        $to_course = Course::where('id',$to)->first();
        if(is_null($to_course)) {
            abort(404);
        }
        $my_courses = JoinedCourse::where('user_id',Auth::user()->id)->where('course_id',$from)->where('status','Processing')->first();

        if(!is_null($my_courses)) {
            $assignments = Assignment::where('user_id',Auth::user()->id)->where('course_id',$from)->delete();
            $my_courses->delete();
            $join = new JoinedCourse;
            $join->course_id = $to;
            $join->user_id = Auth::user()->id;
            $join->trainee_id = Auth::user()->trainee->id;
            $join->type = 'Intro';
            $join->status = 'Processing';
            $join->save();
            $validator['success'] = 'Course Swapped Successfully.';
            return redirect()->route('trainee.courses')->withErrors($validator);
        }
        $validator['error'] = 'This course cannot b swapped because you passed intro module.';
        return back()->withErrors($validator);
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
