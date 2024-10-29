<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GoogleCalendarService;
use App\Models\{Trainer, Workshop, WorkshopRegistration};
use Illuminate\Support\Facades\{Auth,Hash,Mail,DB,Http,Session,Cookie};
use App\Jobs\CancelWorkshopJob;
use Carbon\Carbon;
use Exception;
use Str;

class WorkshopController extends Controller
{
    protected $googleService;

    public function __construct(GoogleCalendarService $googleService)
    {
        $this->googleService = $googleService;
    }
    public function authenticate()
    {
        return $this->googleService->authenticate();
    }
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
                $startTime = new \DateTime( Carbon::parse($request->workshop_date . ' ' . $request->workshop_time)->toIso8601String(), new \DateTimeZone('Asia/Karachi'));
                $endTime = clone $startTime;
                $endTime->modify('+'.$request->duration.' minutes');

                $eventData = [
                    'summary' => $request->title,
                    'start' => $startTime->format(\DateTime::RFC3339),
                    'end' => $endTime->format(\DateTime::RFC3339),
                    'timeZone' => 'Asia/Karachi',
                ];
                Session::forget('google_token');
                $event = $this->googleService->createGoogleMeetEvent($eventData); 
            }

            DB::beginTransaction();

            $workshop = new Workshop;
            $workshop->uuid = Str::uuid();
            $workshop->title = $request->title;
            $workshop->workshop_date = $request->workshop_date;
            $workshop->workshop_time = $request->workshop_time;
            $workshop->duration = $request->duration;
            $workshop->type = $request->type;
            if($workshop->type == 'Online') {
                $workshop->workshop_link = $event->getHangoutLink();
                $workshop->payload = $event->getId();
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
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workshop = Workshop::where('uuid',$id)->first();
        if(is_null($workshop)) {
            $validator['error'] = 'Workshop not found.';
            return back()->withErrors($validator);
        }
        $registerations = WorkshopRegistration::where('workshop_id',$workshop->id)->paginate(20);
        return view('admin.workshops.show',compact('registerations','workshop'));
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
    public function cancel(string $id)
    {
        $workshop = Workshop::where('uuid', $id)->first();
        if(is_null($workshop)) {
            $validator['error'] = 'Workshop not found.';
            return redirect()->route('admin.workshops')->withErrors($validator);
        }
        $registerations = WorkshopRegistration::where('workshop_id',$workshop->id)->get();
        $this->googleService->deleteGoogleMeetEvent($workshop);
        Session::forget('google_token');

        if(is_null($registerations)) {
            $workshop->delete();
            $validator['success'] = 'Workshop Cancelled Successfully';
            return redirect()->route('admin.workshops')->withErrors($validator);
        }
        
        CancelWorkshopJob::dispatch($registerations, $workshop);
        $workshop->delete();


        $validator['success'] = 'Workshop Cancelled Successfully';
        return redirect()->route('admin.workshops')->withErrors($validator);
    }
}
