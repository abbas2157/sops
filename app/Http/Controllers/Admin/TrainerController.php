<?php

namespace App\Http\Controllers\Admin;

use App\Models\{User,Course,Trainee,ModuleStep,Trainer};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\WelcomeEmail;
use Exception;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *   dd($trainers->toArray());
     */
    public function index()
    {
        $trainers = User::with('trainer')->where('type','trainer');
        // if(!$request->has('course') || empty($request->course))

        $trainers = $trainers->paginate(20);
        $courses = Course::get();
        return view('admin.trainer.index',compact('trainers','courses'));
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
        try
        {
            DB::beginTransaction();
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

            DB::commit();

            $user->my_password = $user->password;
            $user->course = $user->t_course->name;
            $user->register = 1;
            Mail::to($request->email)->send(new WelcomeEmail($user));

            $validator['success'] = 'Trainer has been Updated.';
            return back()->withErrors($validator);
        } catch (Exception $e) {
            DB::rollBack();
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
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
        try
        {
            DB::beginTransaction();
            $user = User::findorfail($id);
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
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
            $trainer->gender = $request->gender;
            $trainer->description = $request->description;
            $trainer->highest_qualification = $request->highest_qualification;
            $trainer->areas_of_expertise = $request->areas_of_expertise;
            $trainer->years_of_experience = $request->years_of_experience;
            $trainer->date_of_birth = $request->date_of_birth;
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
            $trainer->course_id = $request->course_id;
            $trainer->save();

            Mail::to($request->email)->send(new WelcomeEmail($user));
            
            DB::commit();

            $validator['success'] = 'Trainer has been Updated.';
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
                $trainer->forceDelete();
            }
            if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                unlink(public_path('profile_pictures/' . $user->profile_picture));
            }

            $user->forceDelete();
        }
        $validate['success'] = 'Trainer Deleted Successfully';
        return back()->withErrors($validate);

    }
}
