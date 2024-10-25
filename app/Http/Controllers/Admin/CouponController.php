<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::with('createdby')->orderBy('id','desc')->paginate(20);
        $courses = Course::get();
        return view('admin.coupons.index',compact('coupons','courses'));
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
            'code' => 'required|unique:coupons'
        ]);

        $coupon = new Coupon;
        $coupon->code = $request->code;
        $coupon->limit = $request->limit;
        $coupon->last_date = $request->last_date;
        $coupon->type = $request->type;
        $coupon->course_id = $request->course_id;
        $coupon->created_by = Auth::user()->id;
        $coupon->save();

        $validator['success'] = 'Coupon Created Successfully';
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
        $coupon = Coupon::find($id);
        $coupon->delete();
        $validator['success'] = 'Coupon Delete Successfully';
        return back()->withErrors($validator);
    }
}
