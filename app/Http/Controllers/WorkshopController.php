<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Mail, DB, Cookie};
use App\Models\{Trainer, Workshop, WorkshopRegistration};
use Illuminate\Support\Str;
use App\Jobs\WorkshopEmailJob;
use App\Models\User;
use Carbon\Carbon;

class WorkshopController extends Controller
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
    public function create(string $uuid)
    {
        $workshop = Workshop::where('uuid',$uuid)->first();
        if(is_null($workshop)) {
            abort(404);
        }
        return view('workshop.index',compact('workshop'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $uuid)
    {
        try {
            $workshop = Workshop::where('uuid',$uuid)->first();
            if(is_null($workshop)) {
                abort(404);
            }

            DB::beginTransaction();
            $WorkshopRegistration = new WorkshopRegistration;
            $WorkshopRegistration->uuid = Str::uuid();
            $WorkshopRegistration->name = $request->name;
            $WorkshopRegistration->email = $request->email;
            $WorkshopRegistration->phone = $request->phone;
            $WorkshopRegistration->comments = $request->comments;
            $WorkshopRegistration->workshop_id = $workshop->id;
            $WorkshopRegistration->save();
            
            WorkshopEmailJob::dispatch($WorkshopRegistration, $workshop);

            DB::commit();

            $validator['success'] = 'Workshop Registration Successfully';
            return back()->withErrors($validator);
        } 
        catch (Exception $e) {
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
