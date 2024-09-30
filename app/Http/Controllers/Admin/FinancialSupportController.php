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
