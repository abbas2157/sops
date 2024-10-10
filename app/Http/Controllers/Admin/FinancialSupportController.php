<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Course,Payment, FinancialSupport};
use Illuminate\Support\Facades\{Auth, Hash, Mail, DB, Cookie};

class FinancialSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = FinancialSupport::orderBy('id','desc')->paginate(20);
        return view('admin.financial-support.index',compact('supports'));
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
        $supports = FinancialSupport::findOrFail($id);
        return view('admin.financial-support.show',compact('supports'));
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
        $supports = FinancialSupport::findOrFail($id);
        try {
            DB::beginTransaction();
            if($request->decision == 'accept') {

                $supports->status = 'Accepted';
                $supports->save();

                $payment = new Payment;
                $payment->user_id = $supports->user_id;
                $payment->course_id = $supports->course_id;
                $payment->total_price = $supports->amount_you_can_pay;
                $payment->save();
            }
            else {

                $supports->amount_must_pay = $request->amount_must_pay;
                $supports->status = 'Declined';
                $supports->save();

                $payment = new Payment;
                $payment->user_id = $supports->user_id;
                $payment->course_id = $supports->course_id;
                $payment->total_price = $request->amount_must_pay;
                $payment->save();
            }
            DB::commit();

            $validator['success'] = 'Decision made successfully';
            return redirect()->route('admin.financial-support')->withErrors($validator);
        } 
        catch (\Exception $e) {
            DB::rollBack();
            $validator['success'] = $e->getMessage();
            return back()->withErrors($validator);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
