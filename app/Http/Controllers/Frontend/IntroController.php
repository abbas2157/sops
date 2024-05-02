<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Course,Trainee,IntroModule,Trainer};

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!$request->has('uuid') || empty($request->uuid))
            abort(404);

        $course = Course::where('uuid',$request->uuid)->select('id','uuid','name')->first();
        if(is_null($course))
            abort(404);

        $intros = IntroModule::where('course_id',$course->id)->with('createdby')->get();
        return view('frontend.module.intro.index',compact('intros','course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
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

        $intro = IntroModule::where('uuid',$request->uuid)->with('createdby','course')->first();
        if(is_null($intro))
            abort(404);
        // dd($intros->toArray());
        return view('frontend.module.intro.detail',compact('intro'));
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
