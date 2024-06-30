<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Course,JoinedCourse,Batch,ClassSchedule};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB,Http};
use Carbon\Carbon;
use Illuminate\Support\Str;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassSchedule::with('course','batch','createdby');
        if(request()->has('batch') && !empty(request()->batch))
        {
            $classes->where('batch_id',request()->batch);
        }
        if(request()->has('course') && !empty(request()->course))
        {
            $classes->where('course_id',request()->course);
        }
        $classes = $classes->paginate(20);
        return view('admin.class-schedules.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::get();
        if(request()->has('course') && !empty(request()->course))
        {
            $batches = Batch::where('course_id',request()->course)->get();
        }
        else
        {
            $batches = Batch::get();
        }
        return view('admin.class-schedules.create',compact('courses','batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $zoom = array();
        try {
            $response = Http::withHeaders(
                [
                    'Authorization' => 'Bearer ' .self::generateToken(),
                    'Content-Type' => 'application/json',
                ]
            )
            ->post(
                "https://api.zoom.us/v2/users/me/meetings",
                [
                    'topic' => $request->title,
                    'type' => 2, // 2 for scheduled meeting
                    'start_time' => Carbon::parse($request->class_date . ' ' . $request->class_time)->toIso8601String(),
                    'duration' => $request->duration,
                    'timezone' => 'UTC'
                ]
            );
           $zoom =  $response->json();
        } catch (\Throwable $th) {
            throw $th;
        }

        $class = new ClassSchedule;
        $class->uuid = Str::uuid();
        $class->title = $request->title;
        $class->class_date = $request->class_date;
        $class->class_time = $request->class_time;
        $class->duration = $request->duration;
        $class->call_link = $zoom['join_url'];
        $class->type = $request->type;
        $class->batch_id = $request->batch_id;
        $class->course_id = $request->course_id;
        $class->created_by = Auth::user()->id;
        $class->payload = json_encode($zoom);
        $class->save();

        $validator['success'] = 'Class Created Successfully';
        return back()->withErrors($validator);
    }
    protected function generateToken(): string
    {
        try {
            $base64String = base64_encode(config('app.zoom.client_id') . ':' .config('app.zoom.client_secret'));
            $accountId = config('app.zoom.account_id');
            
            $responseToken = Http::withHeaders([
                "Content-Type"=> "application/x-www-form-urlencoded",
                "Authorization"=> "Basic {$base64String}"
            ])->post("https://zoom.us/oauth/token?grant_type=account_credentials&account_id={$accountId}");
                
            return $responseToken->json()['access_token'];

        } catch (\Throwable $th) {
            throw $th;
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
