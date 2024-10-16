<?php

namespace App\Http\Controllers\Admin;

use App\Models\{User,Course,Trainee,ModuleStep,Trainer};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Mail\ForgotPaswordMail;
use Illuminate\Support\Str;
use App\Mail\WelcomeEmail;

use function PHPUnit\Framework\fileExists;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainees = User::with('u_trainee')->where('type','trainee')->paginate(20);
        // dd($trainees->toArray());
        return view('admin.trainee.index',compact('trainees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::get();
        return view('admin.trainee.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
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
            
            $user->type = 'trainee';
            $user->save();

            $trainee = new Trainee;
            $trainee->user_id = $user->id;
            $trainee->gender = $request->gender;
            $trainee->description = $request->description;
            $trainee->city_from = $request->city_from;
            $trainee->city_currently_living_in = $request->city_currently_living_in;
            $trainee->skill_experience = $request->skill_experience;
            $trainee->date_of_birth = $request->date_of_birth;
            $trainee->available_on_whatsapp = isset($request->available_on_whatsapp) ? $request->available_on_whatsapp : 'no';
            $trainee->employed_status = isset($request->employed_status) ? $request->employed_status : 'no';
            $trainee->study_status = isset($request->study_status) ? $request->study_status : 'no';
            $trainee->has_computer_and_internet = isset($request->has_computer_and_internet) ? $request->has_computer_and_internet : 'no';
            $trainee->created_by = Auth::user()->id;
            $trainee->save();
            DB::commit();
            
            Mail::to($request->email)->send(new WelcomeEmail($user));

            $validator['success'] = 'Trainee has been Created.';
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

    public function send_email($email)
    {

        $user = User::where("email",$email)->first();
        if(!is_null($user))
        {
        Mail::to($request->email)->send(new ForgotPaswordMail($user));
        }
        $validator['success'] = 'We have sent verification mail on your email. Please check your mailbox and follow instructions.';
        return back()->withErrors($validator);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trainee = User::with('trainee')->find($id);
        // dd($trainers->toArray());
        return view('admin.trainee.edit',compact('trainee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
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

            $trainee = Trainee::where('user_id',$id)->first();
            if(is_null($trainee)){
                $trainee = new Trainee();
                $trainee->user_id = $user->id;
                $trainee->created_by = Auth::user()->id;
            }
            $trainee->gender = $request->gender;
            $trainee->description = $request->description;
            $trainee->city_from = $request->city_from;
            $trainee->city_currently_living_in = $request->city_currently_living_in;
            $trainee->skill_experience = $request->skill_experience;
            $trainee->date_of_birth = $request->date_of_birth;
            $trainee->available_on_whatsapp = isset($request->available_on_whatsapp) ? $request->available_on_whatsapp : 'no';
            $trainee->employed_status = isset($request->employed_status) ? $request->employed_status : 'no';
            $trainee->study_status = isset($request->study_status) ? $request->study_status : 'no';
            $trainee->has_computer_and_internet = isset($request->has_computer_and_internet) ? $request->has_computer_and_internet : 'no';
            $trainee->save();

            DB::commit();
            $validator['success'] = 'Trainee has been Updated.';
            return back()->withErrors($validator);
        } catch (Exception $e) {
            DB::rollBack();
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = User::findorfail($id);
        if(!is_null($user)){
            $trainee = Trainee::where('user_id',$id)->first();
            if(!is_null($trainee)){
                $trainee->forceDelete();
            }
            if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                unlink(public_path('profile_pictures/' . $user->profile_picture));
            }

            $user->forceDelete();
        }
        $validate['success'] = 'Trainee Deleted Successfully';
        return back()->withErrors($validate);
    }
}
