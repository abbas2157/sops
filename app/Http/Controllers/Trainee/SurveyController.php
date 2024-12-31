<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{User, Survey, JoinedCourse};

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if(is_null($user)) {
            abort(404);
        }
        $courses = JoinedCourse::with('course')->where('user_id',Auth::user()->id)->where('is_move',0)->whereIn('type',['Fundamental', 'Full Skill'])->get();
        $course_id = 0;
        if(!request()->has('course') && $courses->isNotEmpty()) {
            $course_id = $courses[0]->course_id;
        }
        if(request()->has('course') && !empty(request()->course)) {
            $course_id = request()->course;
        }
        if(request()->has('course') && !empty(request()->course) && request()->has('type') && !empty(request()->type)) {
            $course = JoinedCourse::with('course')->where('user_id',Auth::user()->id)->where('is_move',0)->where('course_id',request()->course)->where('type',request()->type)->first();
            if(!is_null($course)) {
                $course_id = $course->course_id;
            }
        }
        if(request()->has('type') && !empty(request()->type)) {
            $survey = Survey::where('user_id', $user->id)->where('course_id', $course_id)->where('course_module', request()->type)->first();
        }
        else {
            $survey = Survey::where('user_id', $user->id)->where('course_id', $course_id)->first();
        }
        $CollaborationTeamwork = [];
        if(!is_null($survey) && !is_null($survey->WillingnesstoHelpOthers)) {
            $CollaborationTeamwork[] = $survey->WillingnesstoHelpOthers;
            $CollaborationTeamwork[] = $survey->WillingnesstoAcceptHelpfromOthers;
            $CollaborationTeamwork[] = $survey->NoticesWhenOthersAreStrugglingandOffersAssistance;
            $CollaborationTeamwork[] = $survey->WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas;
            $CollaborationTeamwork[] = $survey->PromotesInclusiveCollaboration;
        }

        $EnglishCommunication = [];
        if(!is_null($survey) && !is_null($survey->Speaking)) {
            $EnglishCommunication[] = $survey->Speaking;
            $EnglishCommunication[] = $survey->Pronunciation;
            $EnglishCommunication[] = $survey->Writing;
            $EnglishCommunication[] = $survey->ImprovementEfforts;
            $EnglishCommunication[] = $survey->ActiveListening;
        }

        $Autonomy = [];
        if(!is_null($survey) && !is_null($survey->OrganizesStudyTimeEffectively)) {
            $Autonomy[] = $survey->OrganizesStudyTimeEffectively;
            $Autonomy[] = $survey->WritesSMARTGoalsandAchievesResults;
            $Autonomy[] = $survey->InvestedinLearningSeeksNewOpportunities;
            $Autonomy[] = $survey->WorksIndependentlySeeksHelpWhenNeeded;
            $Autonomy[] = $survey->AdaptstoChallengesandChanges;
        }

        $Communication = [];
        if(!is_null($survey) && !is_null($survey->ConfidentlyCommunicateVerballyinSmallGroups)) {
            $Communication[] = $survey->ConfidentlyCommunicateVerballyinSmallGroups;
            $Communication[] = $survey->ConfidentlyCommunicateVerballyinLargeGroups;
            $Communication[] = $survey->UnderstandsWrittenInstructions;
            $Communication[] = $survey->SeeksClarificationWhenNeeded;
            $Communication[] = $survey->HasGoodListeningSkills;
        }

        $ComputerSkills = [];
        if(!is_null($survey) && !is_null($survey->CanInstallSoftwarewithLittletoNoInstruction)) {
            $ComputerSkills[] = $survey->CanInstallSoftwarewithLittletoNoInstruction;
            $ComputerSkills[] = $survey->CanNavigateInternetwithLittletoNoInstruction;
            $ComputerSkills[] = $survey->CanSearchInternettoFindAnswers;
            $ComputerSkills[] = $survey->TroubleshootingSkills;
            $ComputerSkills[] = $survey->AdaptstoNewSoftwareandTechnologies;
        }

        $SlackInteraction = [];
        if(!is_null($survey) && !is_null($survey->ActiveParticipationinChannels)) {
            $SlackInteraction[] = $survey->ActiveParticipationinChannels;
            $SlackInteraction[] = $survey->TimelyResponsestoMessages;
            $SlackInteraction[] = $survey->ConstructiveFeedbackandSupport;
            $SlackInteraction[] = $survey->EffectiveUseofEmojiandReactions;
            $SlackInteraction[] = $survey->EncouragesInclusiveCommunication;
        }
        return view('trainee.survey.index',compact('user','courses','course_id','survey','CollaborationTeamwork','EnglishCommunication', 'Autonomy', 'Communication', 'ComputerSkills', 'SlackInteraction'));
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
