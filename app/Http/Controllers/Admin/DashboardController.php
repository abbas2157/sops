<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,Review,User,Course,Trainee, TaskResponse};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::count();
        $users = User::all();
        $assignments = Assignment::orderBy('id', 'desc')->limit(5)->where('status','Pending')->where('is_move',0)->get();
        $tasks = TaskResponse::with('batch','course','class','task','user')->where('status','Pending')->limit(5)->orderBy('id','DESC')->get();
        return view('admin.index',compact('courses','users','assignments','tasks'));
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
