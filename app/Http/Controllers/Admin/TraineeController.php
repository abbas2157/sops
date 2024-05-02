<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Course,Trainee};
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\fileExists;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainees = User::with('trainee')->where('type','trainee')->paginate(10);
        // dd($trainees->toArray());
        return view('admin.trainee.index',compact('trainees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::get();
        return view('admin.trainee.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $uuid = Str::uuid();
            $user = new User;
            $user->uuid = $uuid;
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($uuid);
            if($request->hasFile('profile_picture'))
            {
                $file = $request->file('profile_picture');
                $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
                $file->move(public_path('profile_pictures'),$filename);
                $user->profile_picture = $filename;
            }
            $user->type = 'trainee';
            $user->save();

            $trainee = new Trainee;
            $trainee->user_id = $user->id;
            $trainee->gender = $request->gender;
            $trainee->description = $request->description;
            $trainee->city_from = $request->city_from;
            $trainee->city_currently_living_in = $request->city_currently_living_in;
            $trainee->skill_experience = $request->skill_experience;
            $trainee->date_of_birth = $request->date_of_birth;
            $trainee->available_on_whatsapp = isset($request->available_on_whatsapp) ? $request->available_on_whatsapp : 'no';
            $trainee->employed_status = isset($request->employed_status) ? $request->employed_status : 'no';
            $trainee->study_status = isset($request->study_status) ? $request->study_status : 'no';
            $trainee->has_computer_and_internet = isset($request->has_computer_and_internet) ? $request->has_computer_and_internet : 'no';
            $trainee->created_by = Auth::user()->id;
            $trainee->save();

            DB::commit();
            return back();
        } catch (Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();
            echo $e->getMessage();
            // Return or throw an exception to stop execution

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
        $trainee = User::with('trainee')->find($id);
        // dd($trainers->toArray());
        return view('admin.trainee.edit',compact('trainee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            DB::beginTransaction();
            $user = User::findorfail($id);
            $user->name = isset($request->name) ?? $user->name;
            $user->last_name = isset($request->last_name) ?? $user->last_name;
            $user->phone = isset($request->phone) ?? $user->phone;
            if($request->hasFile('profile_picture'))
            {
                if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                    unlink(public_path('profile_pictures/' . $user->profile_picture));
                }
                $file = $request->file('profile_picture');
                $fileName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
                $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = time() .'-'. rand(10000,99999).'-'. preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','-',strtolower($fileName))).'.'.$extension;
                $file->move(public_path('profile_pictures'),$filename);
                $user->profile_picture = $filename;
            }
            $user->save();

            $trainee = Trainee::where('user_id',$id)->first();
            if(is_null($trainee)){
                $trainee = new Trainee();
                $trainee->user_id = $user->id;
                $trainee->created_by = Auth::user()->id;
            }
            $trainee->gender = isset($request->gender) ?? '';
            $trainee->description = isset($request->description) ?? $trainee->description;
            $trainee->city_from = isset($request->city_from) ?? $trainee->city_from;
            $trainee->city_currently_living_in = isset($request->city_currently_living_in) ?? $trainee->city_currently_living_in;
            $trainee->skill_experience = isset($request->skill_experience) ?? $trainee->skill_experience;
            $trainee->date_of_birth = isset($request->date_of_birth) ?? $trainee->date_of_birth;
            $trainee->available_on_whatsapp = isset($request->available_on_whatsapp) ? $request->available_on_whatsapp : 'no';
            $trainee->employed_status = isset($request->employed_status) ? $request->employed_status : 'no';
            $trainee->study_status = isset($request->study_status) ? $request->study_status : 'no';
            $trainee->has_computer_and_internet = isset($request->has_computer_and_internet) ? $request->has_computer_and_internet : 'no';
            $trainee->save();

            DB::commit();
            return redirect(route('trainees.index'));
        } catch (Exception $e) {
            // Rollback the transaction if an error occurs
            DB::rollBack();
            echo $e->getMessage();
            // Return or throw an exception to stop execution

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = User::findorfail($id);
        if(!is_null($user)){
            $trainee = Trainee::where('user_id',$id)->first();
            if(!is_null($trainee)){
                $trainee->delete();
            }
            if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                unlink(public_path('profile_pictures/' . $user->profile_picture));
            }

            $user->delete();
        }
        $validate['success'] = 'Trainee Deleted Successfully';
        return back()->withErrors($validate);
        // return redirect(route('trainees.index'));
    }
}
