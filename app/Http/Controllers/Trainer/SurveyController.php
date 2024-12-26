<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\{User, Survey};

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = User::where('uuid', $id)->first();
        if(is_null($user)) {
            abort(404);
        }
        $survey = Survey::where('user_id',$user->id)->first();
        $CollaborationTeamwork = [];
        if(!is_null($survey->WillingnesstoHelpOthers)) {
            $CollaborationTeamwork[] = $survey->WillingnesstoHelpOthers;
            $CollaborationTeamwork[] = $survey->WillingnesstoAcceptHelpfromOthers;
            $CollaborationTeamwork[] = $survey->NoticesWhenOthersAreStrugglingandOffersAssistance;
            $CollaborationTeamwork[] = $survey->WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas;
            $CollaborationTeamwork[] = $survey->PromotesInclusiveCollaboration;
        }

        $EnglishCommunication = [];
        if(!is_null($survey->Speaking)) {
            $EnglishCommunication[] = $survey->Speaking;
            $EnglishCommunication[] = $survey->Pronunciation;
            $EnglishCommunication[] = $survey->Writing;
            $EnglishCommunication[] = $survey->ImprovementEfforts;
            $EnglishCommunication[] = $survey->ActiveListening;
        }

        $Autonomy = [];
        if(!is_null($survey->OrganizesStudyTimeEffectively)) {
            $Autonomy[] = $survey->OrganizesStudyTimeEffectively;
            $Autonomy[] = $survey->WritesSMARTGoalsandAchievesResults;
            $Autonomy[] = $survey->InvestedinLearningSeeksNewOpportunities;
            $Autonomy[] = $survey->WorksIndependentlySeeksHelpWhenNeeded;
            $Autonomy[] = $survey->AdaptstoChallengesandChanges;
        }

        $Communication = [];
        if(!is_null($survey->ConfidentlyCommunicateVerballyinSmallGroups)) {
            $Communication[] = $survey->ConfidentlyCommunicateVerballyinSmallGroups;
            $Communication[] = $survey->ConfidentlyCommunicateVerballyinLargeGroups;
            $Communication[] = $survey->UnderstandsWrittenInstructions;
            $Communication[] = $survey->SeeksClarificationWhenNeeded;
            $Communication[] = $survey->HasGoodListeningSkills;
        }

        $ComputerSkills = [];
        if(!is_null($survey->CanInstallSoftwarewithLittletoNoInstruction)) {
            $ComputerSkills[] = $survey->CanInstallSoftwarewithLittletoNoInstruction;
            $ComputerSkills[] = $survey->CanNavigateInternetwithLittletoNoInstruction;
            $ComputerSkills[] = $survey->CanSearchInternettoFindAnswers;
            $ComputerSkills[] = $survey->TroubleshootingSkills;
            $ComputerSkills[] = $survey->AdaptstoNewSoftwareandTechnologies;
        }

        $SlackInteraction = [];
        if(!is_null($survey->ActiveParticipationinChannels)) {
            $SlackInteraction[] = $survey->ActiveParticipationinChannels;
            $SlackInteraction[] = $survey->TimelyResponsestoMessages;
            $SlackInteraction[] = $survey->ConstructiveFeedbackandSupport;
            $SlackInteraction[] = $survey->EffectiveUseofEmojiandReactions;
            $SlackInteraction[] = $survey->EncouragesInclusiveCommunication;
        }
        return view('trainer.survey.index',compact('user','survey','CollaborationTeamwork','EnglishCommunication', 'Autonomy', 'Communication', 'ComputerSkills', 'SlackInteraction'));
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
        $survey = Survey::where('user_id',$request->user_id)->first();
        if(is_null($survey)) {
            $survey = new Survey;
            $survey->user_id = $request->user_id;
            $survey->added_by = $request->added_by;
        }
        $survey->updated_by = $request->updated_by;

        //Collaboration & Teamwork
        if($request->has('WillingnesstoHelpOthers')) {
            $survey->WillingnesstoHelpOthers = $request->WillingnesstoHelpOthers;
            $survey->WillingnesstoAcceptHelpfromOthers = $request->WillingnesstoAcceptHelpfromOthers;
            $survey->NoticesWhenOthersAreStrugglingandOffersAssistance = $request->NoticesWhenOthersAreStrugglingandOffersAssistance;
            $survey->WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas = $request->WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas;
            $survey->PromotesInclusiveCollaboration = $request->PromotesInclusiveCollaboration;
        }
        

        //English Communication
        if($request->has('Speaking')) {
            $survey->Speaking = $request->Speaking;
            $survey->Pronunciation = $request->Pronunciation;
            $survey->Writing = $request->Writing;
            $survey->ImprovementEfforts = $request->ImprovementEfforts;
            $survey->ActiveListening = $request->ActiveListening;
        }

        //Autonomy
        if($request->has('OrganizesStudyTimeEffectively')) {
            $survey->OrganizesStudyTimeEffectively = $request->OrganizesStudyTimeEffectively;
            $survey->WritesSMARTGoalsandAchievesResults = $request->WritesSMARTGoalsandAchievesResults;
            $survey->InvestedinLearningSeeksNewOpportunities = $request->InvestedinLearningSeeksNewOpportunities;
            $survey->WorksIndependentlySeeksHelpWhenNeeded = $request->WorksIndependentlySeeksHelpWhenNeeded;
            $survey->AdaptstoChallengesandChanges = $request->AdaptstoChallengesandChanges;
        }

        //Communication
        if($request->has('ConfidentlyCommunicateVerballyinSmallGroups')) {
            $survey->ConfidentlyCommunicateVerballyinSmallGroups = $request->ConfidentlyCommunicateVerballyinSmallGroups;
            $survey->ConfidentlyCommunicateVerballyinLargeGroups = $request->ConfidentlyCommunicateVerballyinLargeGroups;
            $survey->UnderstandsWrittenInstructions = $request->UnderstandsWrittenInstructions;
            $survey->SeeksClarificationWhenNeeded = $request->SeeksClarificationWhenNeeded;
            $survey->HasGoodListeningSkills = $request->HasGoodListeningSkills;
        }

        //Computer Skills
        if($request->has('CanInstallSoftwarewithLittletoNoInstruction')) {
            $survey->CanInstallSoftwarewithLittletoNoInstruction = $request->CanInstallSoftwarewithLittletoNoInstruction;
            $survey->CanNavigateInternetwithLittletoNoInstruction = $request->CanNavigateInternetwithLittletoNoInstruction;
            $survey->CanSearchInternettoFindAnswers = $request->CanSearchInternettoFindAnswers;
            $survey->TroubleshootingSkills = $request->TroubleshootingSkills;
            $survey->AdaptstoNewSoftwareandTechnologies = $request->AdaptstoNewSoftwareandTechnologies;
        }

        //Slack Interaction
        if($request->has('ActiveParticipationinChannels')) {
            $survey->ActiveParticipationinChannels = $request->ActiveParticipationinChannels;
            $survey->TimelyResponsestoMessages = $request->TimelyResponsestoMessages;
            $survey->ConstructiveFeedbackandSupport = $request->ConstructiveFeedbackandSupport;
            $survey->EffectiveUseofEmojiandReactions = $request->EffectiveUseofEmojiandReactions;
            $survey->EncouragesInclusiveCommunication = $request->EncouragesInclusiveCommunication;
        }

        $survey->save();

        $validator['success'] = 'Survey Submitted successfuly.';
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
        //
    }
}
