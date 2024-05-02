<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB};
use Illuminate\Support\Str;
use App\Mail\WelcomeEmail;
use App\Models\User;

class RegisterController extends Controller
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
    public function trainee()
    {
        $data = array('type' => 'trainee','title' => 'Student');
        return view('auth.register',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required'
        ]);
        
        $user = new User;
        $user->uuid = Str::uuid();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->type = $request->type;
        $user->save();
        
        $user->uuid = $request->password;
        Mail::to('abbas8156@gmail.com')->send(new WelcomeEmail($user));

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->type == 'admin')
            {
                return redirect()->intended('admin');
            }
            if($user->type == 'trainee')
            {
                return redirect('trainee/profile?details');
            }
        }
        $validator['emailPassword'] = 'Something Went Wrong.';
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
        //
    }
}
