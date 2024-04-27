<?php

namespace App\Http\Controllers\Admin\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\IntroModule;
use App\Models\Course;

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!$request->has('id') || empty($request->id))
        abort(404);

        $course = Course::where('uuid',$request->id)->select('id','uuid','name')->first();
        if(is_null($course))
        abort(404);

        $intros = IntroModule::where('course_id',$course->id)->get();
        return view('admin.module.intro.index',compact('intros','course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(!$request->has('id') || empty($request->id))
        abort(404);

        $course = Course::where('uuid',$request->id)->select('id','uuid','name')->first();
        if(is_null($course))
        abort(404);
    
        $intros = IntroModule::where('course_id',$course)->count();
        return view('admin.module.intro.create',compact('intros','course'));
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
