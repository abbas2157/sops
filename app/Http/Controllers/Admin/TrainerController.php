<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = User::with('trainer')->where('type','trainer')->paginate(10);
        // dd($trainers->toArray());
        return view('admin.trainer.index',compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::get();
        return view('admin.trainer.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uuid = Str::uuid();

        $user = new User;
        $user->uuid = $uuid;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($uuid);
        if($request->hasFile('profile_picture'))
        {
            $file = $request->file('profile_picture');
            $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
            $file->move(public_path('profile_pictures'),$filename);
            $user->profile_picture = $filename;
        }
        $user->type = 'trainer';
        $user->save();

        $trainer = new Trainer;
        $trainer->user_id = $user->id;
        $trainer->gender = $request->gender;
        $trainer->description = $request->description;
        $trainer->highest_qualification = $request->highest_qualification;
        $trainer->areas_of_expertise = $request->areas_of_expertise;
        $trainer->years_of_experience = $request->years_of_experience;
        $trainer->date_of_birth = $request->date_of_birth;
        if($request->hasFile('curriculum_vitae'))
        {
            $file = $request->file('curriculum_vitae');
            $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
            $file->move(public_path('trainer/cv'),$filename);
            $trainer->curriculum_vitae = $filename;
        }
        $trainer->created_by = Auth::user()->id;
        $trainer->course_id = $request->course_id;
        $trainer->save();

        $validator['success'] = 'Profile Picture Updated.';
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
        $trainer = User::with('trainer')->findOrFail($id);
        // dd($trainers->toArray());
        $courses = Course::get();
        return view('admin.trainer.edit',compact('trainer','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            DB::beginTransaction();
        $user = User::findorfail($id);
        $user->name = isset($request->name) ?? $user->name;
        $user->last_name = isset($request->last_name) ?? $user->last_name;
        $user->phone = isset($request->phone) ?? $user->phone;
        if($request->hasFile('profile_picture'))
        {
            if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                unlink(public_path('profile_pictures/' . $user->profile_picture));
            }
            $file = $request->file('profile_picture');
            $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
            $file->move(public_path('profile_pictures'),$filename);
            $user->profile_picture = $filename;
        }
        $user->save();
        $trainer = Trainer::where('user_id',$id)->first();
        if(is_null($trainer)){
            $trainer = new Trainer();
            $trainer->user_id = $user->id;
            $trainer->created_by = Auth::user()->id;
        }
        $trainer->gender = isset($request->gender) ?? $trainer->gender;
        $trainer->description = isset($request->description) ?? $trainer->descriptio;
        $trainer->highest_qualification = isset($request->highest_qualification) ?? $trainer->highest_qualification;
        $trainer->areas_of_expertise = isset($request->areas_of_expertise) ?? $trainer->areas_of_expertise;
        $trainer->years_of_experience = isset($request->years_of_experience) ?? $trainer->years_of_experience;
        $trainer->date_of_birth = isset($request->date_of_birth) ?? $trainer->date_of_birth;
        if($request->hasFile('curriculum_vitae'))
        {
            if ($trainer->curriculum_vitae && file_exists(public_path('trainer/cv/' . $trainer->curriculum_vitae))) {
                unlink(public_path('trainer/cv/' . $user->curriculum_vitae));
            }
            $file = $request->file('curriculum_vitae');
            $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
            $file->move(public_path('trainer/cv'),$filename);
            $trainer->curriculum_vitae = $filename;
        }
        $trainer->course_id = isset($request->course_id) ?? $trainer->course_id;
        $trainer->save();
        DB::commit();
        $validator['success'] = 'Profile Picture Updated.';
        return back()->withErrors($validator);
    }
    catch(Exception $e){
        DB::rollBack();
        echo $e->getMessage();
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorfail($id);
        if(!is_null($user)){
            $trainer = Trainer::where('user_id',$id)->first();
            if(!is_null($trainer)){
                if ($trainer->curriculum_vitae && file_exists(public_path('trainer/cv' . $trainer->curriculum_vitae))) {
                    unlink(public_path('trainer/cv' . $user->curriculum_vitae));
                }
                $trainer->delete();
            }
            if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                unlink(public_path('profile_pictures/' . $user->profile_picture));
            }

            $user->delete();
        }
        $validate['success'] = 'Trainee Deleted Successfully';
        return back()->withErrors($validate);
        // return redirect(route('trainers.index'));

    }
}
