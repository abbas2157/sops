<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Cookie, Auth};
use App\Models\{Course, Payment};

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!empty(Cookie::get('course'))) {
            $uuid = Cookie::get('course');
            $course = Course::where('uuid',$uuid)->first();
            return view('payments.index',compact('course'));
        }
        return abort(404);
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
        if (!empty(Cookie::get('course'))) {
            $uuid = Cookie::get('course');
            Cookie::queue(Cookie::forget('course'));
            $course = Course::where('uuid',$uuid)->first();
            if(is_null($course))
            {
                abort(404);
            }
            $user = Auth::user();
            
            $payment = new Payment;
            $payment->user_id = $user->id;
            $payment->course_id = $course->id;
            $payment->course_id = $course->id;
            $payment->total_price = $course->price;
            $payment->save();

            return redirect('trainee/profile?details');
        }
        return abort(404);
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
