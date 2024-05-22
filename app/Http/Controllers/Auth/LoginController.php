<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ForgotPaswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function forgot_password()
    {
        return view('auth.forgot-password');
    }
    public function send_email(Request $request)
    {

        $request->validate([
            'email' => 'required|email'
        ]);
        $user = User::where("email",$request->email)->first();
        if(is_null($user))
        {
            $validator['emailPassword'] = 'Your Email is not registered.';
            return back()->withErrors($validator);
        }
        Mail::to($user->email)->send(new ForgotPaswordMail($user));
        $validator['success'] = 'We have sent verification mail on your email. Please check your mailbox and follow instructions.';
        return back()->withErrors($validator);
    }
    public function reset_password(string $id)
    {
        $user = User::where('uuid',$id)->first();
        if(is_null($user))
            abort(404);
        return view('auth.reset-password',compact('user'));
    }
    public function change_password(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->password = Hash::make($request->password);
        $user->save();
        $validator['success'] = 'Password Changes Successfuly. Login Now';
        return redirect('login')->withErrors($validator);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->type == 'admin')
            {
                return redirect()->intended('admin');
            }
            if($user->type == 'trainee')
            {
                if(is_null($user->trainee))
                    return redirect('trainee/profile?details');
                return redirect('trainee');
            }
            if($user->type == 'trainer')
            {
                if(is_null($user->trainer))
                    return redirect('trainer/profile?details');
                return redirect('trainer');
            }
            // return redirect()->intended('/')->withSuccess('Signed in');
        }
        $validator['emailPassword'] = 'Email address or password is incorrect.';
        return redirect("login")->withErrors($validator);
    }

    /**
     * Display the specified resource.
     */
    public function verify(string $id)
    {
        $user = User::where("uuid",$id)->first();
        if(is_null($user))
            abort(404);
        $user->markEmailAsVerified();
        $validator['success'] = 'Your Account has been verified. Login Now';
        return redirect('login')->withErrors($validator);
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
    public function destroy()
    {
        // Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
