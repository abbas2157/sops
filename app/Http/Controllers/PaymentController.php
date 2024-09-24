<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Cookie, Auth};
use App\Models\{Course, Payment, Coupon, JoinedCourse};

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
            if(is_null($course)) {
                abort(404);
            }
            $user = Auth::user();
            if($request->has('coupon') && !empty($request->coupon)) {
                $coupon = Coupon::where('code',$request->coupon)->first();

                

                $join = new JoinedCourse;
                $join->course_id = $course->id;
                $join->user_id = $user->id;

                $trainee = Trainee::where('user_id',$user->id)->first();
                if(!is_null($trainee)) {
                    $join->trainee_id = $trainee->id;
                }

                $join->type = 'Intro';
                $join->status = 'Processing';
                $join->save();

                $payment = new Payment;
                $payment->user_id = $user->id;
                $payment->course_id = $course->id;
                $payment->total_price = $course->price;
                $payment->gateway = 'Coupon';
                $payment->status = 'Coupon';
                $payment->coupon_id = $coupon->id;
                $payment->save();
            }
            else {
                $payment = new Payment;
                $payment->user_id = $user->id;
                $payment->course_id = $course->id;
                $payment->total_price = $course->price;
                $payment->save();
            }
            return redirect('trainee/profile?details');
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $coupon = Coupon::where('code',$request->coupon)->first();
        if(is_null($coupon)) {
            return response()->json(['error' => 'Oops! The coupon code you entered is invalid. Please check the code and try again.'], 200);
        }
        if(!is_null($coupon->last_date)) {
            return response()->json(['error' => 'Coupon code expired.'], 200);
        }
        if(!is_null($coupon->limit)) {
            return response()->json(['error' => 'Coupon code exceeded.'], 200);
        }
        if (!empty(Cookie::get('course'))) {
            $uuid = Cookie::get('course');
            $course = Course::where('uuid',$uuid)->first();
            if(is_null($course)) {
                return response()->json(['error' => 'Course not found.'], 200);
            }
            return response()->json(['success' => "Congratulations! You've successfully applied the coupon code for free access to the Intro Module of ".$course->name.". Click 'Continue' to start the module. Upon completion, you can pay the full fee or apply for financial support to proceed with the course."], 200);
        }
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
