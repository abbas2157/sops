<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('createdby')->paginate(20);
        return view('admin.courses.index',compact('courses'));
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
            'name' => 'required|unique:courses'
        ]);
        $course = new Course;
        $course->uuid = Str::uuid();
        $course->name = $request->name;
        $slug = Str::slug($request->name, '-');
        $course->slug = $slug;
        $course->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
            $file->move(public_path('images/courses'),$filename);
            $course->image = $filename;
        }
        $course->created_by = Auth::user()->id;
        $course->save();
        $validator['success'] = 'Course Created Successfully';
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
        $course = Course::findorfail($id);
        return view('admin.courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $course = Course::findorfail($id);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->lectures = $request->lectures;
        $course->skill_level = $request->skill_level;
        $course->language = $request->language;
        $course->certificate = $request->certificate;
        $course->duration = $request->duration;
        $course->list = isset($request->list) ? $request->list : '0';
        if($request->hasFile('image'))
        {
            if ($course->image && file_exists(public_path('images/courses' . $course->image))) {
                unlink(public_path('images/courses' . $course->image));
            }
            $file = $request->file('image');
            $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
            $file->move(public_path('images/courses'),$filename);
            $course->image = $filename;
        }
        $course->created_by = Auth::user()->id;
        $course->save();
        $validator['success'] = 'Course Updated Successfully';
        return back()->withErrors($validator);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if ($course->image && file_exists(public_path('images/courses' . $course->image))) {
            unlink(public_path('images/courses' . $course->image));
        }
        $course->delete();
        $validator['success'] = 'Course Delete Successfully';
        return back()->withErrors($validator);
    }
}
