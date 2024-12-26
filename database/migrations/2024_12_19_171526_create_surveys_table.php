<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();

            //Collaboration & Teamwork
            $table->integer('WillingnesstoHelpOthers')->nullable();
            $table->integer('WillingnesstoAcceptHelpfromOthers')->nullable();
            $table->integer('NoticesWhenOthersAreStrugglingandOffersAssistance')->nullable();
            $table->integer('WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas')->nullable();
            $table->integer('PromotesInclusiveCollaboration')->nullable();

            //English Communication
            $table->integer('Speaking')->nullable();
            $table->integer('Pronunciation')->nullable();
            $table->integer('Writing')->nullable();
            $table->integer('ImprovementEfforts')->nullable();
            $table->integer('ActiveListening')->nullable();

            //Autonomy
            $table->integer('OrganizesStudyTimeEffectively')->nullable();
            $table->integer('WritesSMARTGoalsandAchievesResults')->nullable();
            $table->integer('InvestedinLearningSeeksNewOpportunities')->nullable();
            $table->integer('WorksIndependentlySeeksHelpWhenNeeded')->nullable();
            $table->integer('AdaptstoChallengesandChanges')->nullable();

            //Communication
            $table->integer('ConfidentlyCommunicateVerballyinSmallGroups')->nullable();
            $table->integer('ConfidentlyCommunicateVerballyinLargeGroups')->nullable();
            $table->integer('UnderstandsWrittenInstructions')->nullable();
            $table->integer('SeeksClarificationWhenNeeded')->nullable();
            $table->integer('HasGoodListeningSkills')->nullable();

            //Computer Skills
            $table->integer('CanInstallSoftwarewithLittletoNoInstruction')->nullable();
            $table->integer('CanNavigateInternetwithLittletoNoInstruction')->nullable();
            $table->integer('CanSearchInternettoFindAnswers')->nullable();
            $table->integer('TroubleshootingSkills')->nullable();
            $table->integer('AdaptstoNewSoftwareandTechnologies')->nullable();

            //Slack Interaction
            $table->integer('ActiveParticipationinChannels')->nullable();
            $table->integer('TimelyResponsestoMessages')->nullable();
            $table->integer('ConstructiveFeedbackandSupport')->nullable();
            $table->integer('EffectiveUseofEmojiandReactions')->nullable();
            $table->integer('EncouragesInclusiveCommunication')->nullable();

            $table->integer('added_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
