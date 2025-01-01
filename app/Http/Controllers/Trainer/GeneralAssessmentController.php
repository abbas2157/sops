<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{User, TrainerSurvey, TrainerCourse};

class GeneralAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = TrainerCourse::with('course')->where('trainer_id', Auth::user()->trainer->id)->whereIn('course_module',['Fundamental', 'Full Skill'])->get();
        $course_id = 0;
        if(!request()->has('course') && $courses->isNotEmpty()) {
            $course_id = $courses[0]->course_id;
        }
        if(request()->has('course') && !empty(request()->course)) {
            $course_id = request()->course;
        }
        if(request()->has('course') && !empty(request()->course) && request()->has('type') && !empty(request()->type)) {
            $course = TrainerCourse::with('course')->where('trainer_id', Auth::user()->trainer->id)->where('course_id',request()->course)->where('course_module',request()->type)->first();
            if(!is_null($course)) {
                $course_id = $course->course_id;
            }
        }
        if(request()->has('type') && !empty(request()->type)) {
            $survey = TrainerSurvey::where('user_id', Auth::user()->trainer->id)->where('course_id', $course_id)->where('course_module', request()->type)->first();
        }
        else {
            $survey = TrainerSurvey::where('user_id', Auth::user()->trainer->id)->where('course_id', $course_id)->first();
        }
        
        $FirstLesson = [];
        if(!is_null($survey) && !is_null($survey->TeacherIntro)) {
            $FirstLesson[] = $survey->TeacherIntro;
            $FirstLesson[] = $survey->Background;
            $FirstLesson[] = $survey->CurrentRole;
            $FirstLesson[] = $survey->InstillingConfidence;
        }
        $OnlineTeaching = [];
        if(!is_null($survey) && !is_null($survey->WebcamSeetup)) {
            $OnlineTeaching[] = $survey->WebcamSeetup;
            $OnlineTeaching[] = $survey->AudioQuality;
            $OnlineTeaching[] = $survey->SanityCheck;
        }

        $BeginningofLesson = [];
        if(!is_null($survey) && !is_null($survey->ExplainingLearningObjectives)) {
            $BeginningofLesson[] = $survey->ExplainingLearningObjectives;
            $BeginningofLesson[] = $survey->LessonOverview ;
            $BeginningofLesson[] = $survey->IntroduceSupportStaff;
            $BeginningofLesson[] = $survey->EngagementCheck;
        }

        $TeachingTechniques = [];
        if(!is_null($survey) && !is_null($survey->UsesColdCalling)) {
            $TeachingTechniques[] = $survey->UsesColdCalling;
            $TeachingTechniques[] = $survey->UsesCallResponse ;
            $TeachingTechniques[] = $survey->UsesEverybodyWrites;
            $TeachingTechniques[] = $survey->UsesNOC;
            $TeachingTechniques[] = $survey->UsesPopcorning;
        }

        $ClassHandling = [];
        if(!is_null($survey) && !is_null($survey->PaceofSpeech)) {
            $ClassHandling[] = $survey->PaceofSpeech;
            $ClassHandling[] = $survey->VolumeofSpeech ;
            $ClassHandling[] = $survey->ExcitementandEnergy;
            $ClassHandling[] = $survey->AcknowledgementofQuestions;
            $ClassHandling[] = $survey->ResponsetoOfftopicQuestions;
            $ClassHandling[] = $survey->ResponsetoOntopicQuestions;
            $ClassHandling[] = $survey->EnsuredBreakstokeepTraineeEngagement;
            $ClassHandling[] = $survey->EnsuredScreenVisibility;
        }

        $ExercisesBreakoutTasks = [];
        if(!is_null($survey) && !is_null($survey->UnderstandingofExercises)) {
            $ExercisesBreakoutTasks[] = $survey->UnderstandingofExercises;
            $ExercisesBreakoutTasks[] = $survey->ClearInstructions ;
            $ExercisesBreakoutTasks[] = $survey->CheckforUnderstanding;
            $ExercisesBreakoutTasks[] = $survey->UtilizedSupportStaff;
        }

        $EndofLesson = [];
        if(!is_null($survey) && !is_null($survey->RecapLearningObjectives)) {
            $EndofLesson[] = $survey->RecapLearningObjectives;
            $EndofLesson[] = $survey->HomeworkIntroduction ;
            $EndofLesson[] = $survey->ThankStudents;
            $EndofLesson[] = $survey->ThankSupportStaff;
        }

        return view('trainer.trainer-survey.index',compact('courses','course_id','survey','FirstLesson','OnlineTeaching', 'BeginningofLesson','TeachingTechniques','ClassHandling', 'ExercisesBreakoutTasks', 'EndofLesson'));
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
