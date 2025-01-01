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
        Schema::create('trainer_surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->enum('course_module',['Fundamental','Full Skill'])->nullable();

            //First Lesson
            $table->integer('TeacherIntro')->nullable();
            $table->integer('Background')->nullable();
            $table->integer('CurrentRole')->nullable();
            $table->integer('InstillingConfidence')->nullable();

            //Online Teaching
            $table->integer('WebcamSeetup')->nullable();
            $table->integer('AudioQuality')->nullable();
            $table->integer('SanityCheck')->nullable();

            //Beginning of Lesson
            $table->integer('ExplainingLearningObjectives')->nullable();
            $table->integer('LessonOverview')->nullable();
            $table->integer('IntroduceSupportStaff')->nullable();
            $table->integer('EngagementCheck')->nullable();

            //During Lesson (Teaching Techniques)
            $table->integer('UsesColdCalling')->nullable();
            $table->integer('UsesCallResponse')->nullable();
            $table->integer('UsesEverybodyWrites')->nullable();
            $table->integer('UsesNOC')->nullable();
            $table->integer('UsesPopcorning')->nullable();

            //During Lesson (Class handling)
            $table->integer('PaceofSpeech')->nullable();
            $table->integer('VolumeofSpeech')->nullable();
            $table->integer('ExcitementandEnergy')->nullable();
            $table->integer('AcknowledgementofQuestions')->nullable();
            $table->integer('ResponsetoOfftopicQuestions')->nullable();
            $table->integer('ResponsetoOntopicQuestions')->nullable();
            $table->integer('EnsuredBreakstokeepTraineeEngagement')->nullable();
            $table->integer('EnsuredScreenVisibility')->nullable();

            //Exercises & Breakout Tasks
            $table->integer('UnderstandingofExercises')->nullable();
            $table->integer('ClearInstructions')->nullable();
            $table->integer('CheckforUnderstanding')->nullable();
            $table->integer('UtilizedSupportStaff')->nullable();

            //End of Lesson
            $table->integer('RecapLearningObjectives')->nullable();
            $table->integer('HomeworkIntroduction')->nullable();
            $table->integer('ThankStudents')->nullable();
            $table->integer('ThankSupportStaff')->nullable();

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
        Schema::dropIfExists('trainer_surveys');
    }
};
