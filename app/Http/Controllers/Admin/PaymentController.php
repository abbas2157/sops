<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\{User, Payment, JoinedCourse};

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        $user = User::where('uuid',$id)->first();
        if(is_null($user)) {
            return abort(404);
        }
        $payments = Payment::where('user_id',$user->id)->get();
        return view('admin.payments.index',compact('user','payments'));
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
        $user = User::where('uuid',$id)->first();
        if(is_null($user)) {
            return abort(404);
        }
        if(is_null($user->trainee)) {
            $validator['success'] = 'Trainee Detail not updated yet. Please Trainee to update his detail.';
            return back()->withErrors($validator);
        }
        $payment = Payment::where('id',$request->payment_id)->first();
        if(is_null($payment)) {
            return abort(404);
        }
        if($request->hasFile('receipt'))
        {
            $file = $request->file('receipt');
            $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
            $file->move(public_path('receipts'),$filename);
            $payment->receipt = $filename;
        }
        $payment->gateway = $request->gateway;
        $payment->status = 'Paid';
        $payment->received_by = Auth::user()->id;
        $payment->save();

        $join = JoinedCourse::where(['course_id' => $payment->course_id, 'user_id' => $user->id])->first();
        if(is_null($join)) {
            $join = new JoinedCourse;
            $join->course_id = $payment->course_id;
            $join->user_id = $user->id;
            $join->trainee_id = $user->trainee->id;
            $join->type = 'Intro';
            $join->status = 'Processing';
            $join->save();
        }
        $validator['success'] = 'Payment Updated Successfully';
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
