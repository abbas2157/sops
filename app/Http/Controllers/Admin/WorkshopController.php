<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Trainer, Workshop};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB,Http};
use App\Mail\BatchCreationEmail;
use App\Jobs\BatchCreationEmailJob;
use Carbon\Carbon;
use Exception;
use Str;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::get();
        $workshops = Workshop::with('createdby')->orderBy('id','desc')->paginate(20);
        return view('admin.workshops.index',compact('workshops','trainers'));
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
        try {
            $trainer = Trainer::where('id',$request->trainer_id)->first();
            if(is_null($trainer)) {
                $validator['error'] = 'Trainer not found.';
                return back()->withErrors($validator);
            }
            if($request->type == 'Online') {
                $response = Http::withHeaders(
                    [
                        'Authorization' => 'Bearer ' .self::generateToken(),
                        'Content-Type' => 'application/json',
                    ]
                )
                ->post(
                    "https://api.zoom.us/v2/users/me/meetings",
                    [
                        'topic' => $request->title,
                        'type' => 2, // 2 for scheduled meeting
                        'start_time' => Carbon::parse($request->workshop_date . ' ' . $request->workshop_time)->toIso8601String(),
                        'duration' => 60,
                        'timezone' => 'UTC'
                    ]
                );
               $zoom =  $response->json();
            }

            DB::beginTransaction();

            $workshop = new Workshop;
            $workshop->uuid = Str::uuid();
            $workshop->title = $request->title;
            $workshop->workshop_date = $request->workshop_date;
            $workshop->workshop_time = $request->workshop_time;
            $workshop->type = $request->type;
            if($workshop->type == 'Online') {
                $workshop->workshop_link = $zoom['join_url'];
            }
            else {
                $workshop->address = $request->address;
            }
            $workshop->trainer_id = $request->trainer_id;
            $workshop->created_by = Auth::user()->id;
            $workshop->save();
            

            DB::commit();
            $validator['success'] = 'Workshop Created Successfully';
            return back()->withErrors($validator);
        } 
        catch (Exception $e) {
            DB::rollBack();
            $validator['error'] = $e->getMessage();
            return back()->withErrors($validator);
        }
    }
    protected function generateToken(): string
    {
        set_time_limit(0);
        try {
            $base64String = base64_encode(config('app.zoom.client_id') . ':' .config('app.zoom.client_secret'));
            $accountId = config('app.zoom.account_id');

            $responseToken = Http::withHeaders([
                "Content-Type"=> "application/x-www-form-urlencoded",
                "Authorization"=> "Basic {$base64String}"
            ])->post("https://zoom.us/oauth/token?grant_type=account_credentials&account_id={$accountId}");

            return $responseToken->json()['access_token'];

        } catch (\Throwable $th) {
            throw $th;
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
