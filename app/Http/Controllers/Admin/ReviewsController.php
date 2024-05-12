<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Course,Trainee,ModuleStep,Trainer,JoinedCourse,Assignment,Review};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->has('course') || $request->has('rating')){
            if($request->has('course') && $request->has('rating')){
                $reviews = Review::with('module_step')->where('course_id',$request->course)->Where('rating',$request->rating)->paginate(20);
            }elseif($request->has('course')){
                $reviews = Review::with('module_step')->where('course_id',$request->course)->paginate(20);
            }elseif($request->has('rating')){
                $reviews = Review::with('module_step')->Where('rating',$request->rating)->paginate(20);
            }
        }elseif(!$request->has('id') || empty($request->id))
        {
            $reviews = Review::with('module_step')->paginate(20);
        }
        else
        {
            $reviews = Review::with('course')->where('course_id',$request->id)->paginate(20);
        }
        $courses = Course::get();
        return view('admin.reviews.index',compact('reviews','courses'));
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
    public function show(string $id, Request $request)
    {
        $comment = Review::findorfail($id);
        $comment->show = $request->show;
        $comment->save();
        if($request->show == 1)
        {
            $validator['success'] = 'Review Published Successfully';
        }
        else
        {
            $validator['success'] = 'Review Hide Successfully';
        }
        return back()->withErrors($validator);
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
