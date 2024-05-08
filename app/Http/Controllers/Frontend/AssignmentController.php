<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Assignment,Review};
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'assignment' => 'required'
        ]);

        $assignment = new Assignment;
        if($request->hasFile('assignment'))
        {
            $file = $request->file('assignment');
            $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
            $file->move(public_path('trainee/tasks'),$filename);
            $assignment->file = $filename;
        }
        $assignment->user_name = Auth::user()->full_name;
        $assignment->type = $request->type;
        $assignment->course_id = $request->course_id;
        $assignment->step_id = $request->step_id;
        $assignment->user_id = $request->user_id;
        $assignment->save();

        $validator['success'] = 'Assignment Uploaded Successfully';
        return back()->withErrors($validator);
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
        $assignment = Assignment::findOrFail($id);
        if ($assignment->file && file_exists(public_path('trainee/tasks' . $assignment->file))) {
            unlink(public_path('trainee/tasks' . $assignment->file));
        }
        $assignment->delete();
        $validator['success'] = 'Assignment Delete Successfully';
        return back()->withErrors($validator);
    }
}
