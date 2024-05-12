<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Course,Trainee,ModuleStep,Trainer,JoinedCourse,Assignment,Comment};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->has('course') || $request->has('trainee')){
            if($request->has('course') && $request->has('trainee')){
                $comments = Comment::with('module_step')->where('course_id',$request->course)->Where('user_id',$request->trainee)->paginate(20);
            }elseif($request->has('course')){
                $comments = Comment::with('module_step')->where('course_id',$request->course)->paginate(20);
            }elseif($request->has('trainee')){
                $comments = Comment::with('module_step')->Where('user_id',$request->trainee)->paginate(20);
            }
        }elseif(!$request->has('id') || empty($request->id))
        {
            $comments = Comment::with('module_step')->paginate(20);
        }
        else
        {
            $comments = Comment::with('course')->where('course_id',$request->id)->paginate(20);
        }
        $courses = Course::get();
        $trainees = User::where('type','trainee')->get();
        return view('admin.comments.index',compact('comments','courses','trainees'));
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
        $comment = Comment::findorfail($id);
        $comment->show = $request->show;
        $comment->save();
        if($request->show == 1)
        {
            $validator['success'] = 'Comment Published Successfully';
        }
        else
        {
            $validator['success'] = 'Comment Hide Successfully';
        }
        return back()->withErrors($validator);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::firstorfail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findorfail($id);
        if(isset($comment)){
            $comment->delete();
        }

    }
}
