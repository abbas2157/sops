<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,Course,Trainee};

class ProfileController extends Controller
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
        return view('trainee.profile.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function picture_update(Request $request)
    {
        $file = $request->file('profile_picture');
        $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
        $file->move(public_path('profile_pictures'),$filename);

        $user = Auth::user();
        $user->profile_picture = $filename;
        $user->save();
        $validator['success'] = 'Profile Picture Updated.';
        return back()->withErrors($validator);
    }
    public function detail_update(Request $request)
    {
        $trainee = Trainee::where('user_id',Auth::user()->id)->first();
        if(is_null($trainee))
        {
            $trainee = new Trainee();
            $trainee->user_id = Auth::user()->id;
            $trainee->created_by = Auth::user()->id;
        }
        $trainee->gender = $request->gender;
        $trainee->description = $request->description ;
        $trainee->city_from = $request->city_from;
        $trainee->city_currently_living_in = $request->city_currently_living_in;
        $trainee->skill_experience = $request->skill_experience;
        $trainee->date_of_birth = $request->date_of_birth;
        $trainee->available_on_whatsapp = isset($request->available_on_whatsapp) ? $request->available_on_whatsapp : 'no';
        $trainee->employed_status = isset($request->employed_status) ? $request->employed_status : 'no';
        $trainee->study_status = isset($request->study_status) ? $request->study_status : 'no';
        $trainee->has_computer_and_internet = isset($request->has_computer_and_internet) ? $request->has_computer_and_internet : 'no';
        $trainee->save();
        $validator['success'] = 'Profile Details has been Updated.';
        return redirect('trainee/profile')->withErrors($validator);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_new_password' => 'required'
        ]);
        if ($request->get('new_password') !== $request->get('confirm_new_password'))
        {
            $validator['confirm_new_password'] = 'Please Confirm Password Correctly.';
            return redirect('admin/profile?password')->withErrors($validator);
        }
        $auth = Auth::user();
        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password))
        {
            $validator['current_password'] = 'Current Password is Invalid';
            return redirect('admin/profile?password')->withErrors($validator);
        }
 
        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0)
        {
            $validator['new_password'] = 'New Password cannot be same as your current password.';
            return redirect('admin/profile?password')->withErrors($validator);
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();

        $validator['success'] = 'Password Changed Successfully';
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
    public function update(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        $user->name  = $request->name;
        $user->last_name  = $request->last_name;
        $user->phone = $request->phone;
        $user->save();
        $validator['success'] = 'Profile Updated Successfully.';
        return back()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
