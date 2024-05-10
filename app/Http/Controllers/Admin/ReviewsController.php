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
        if(!$request->has('id') || empty($request->id))
        {
            $reviews = Review::with('module_step')->paginate(20);
        }
        else
        {
            $reviews = Review::with('course')->where('course_id',$request->id)->paginate(20);
        }
        return view('admin.reviews.index',compact('reviews'));
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
