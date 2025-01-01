<div class="modal fade" id="ClassHandlingModal" aria-hidden="true" aria-labelledby="AutonomyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">Class Handling</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.trainer.survey.store') }}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">
                    @if(request()->has('course_id'))
                        <input type="hidden" name="course_id" id="course_id" value="{{ request()->course_id ?? '' }}">
                    @else
                        <input type="hidden" name="course_id" id="course_id" value="{{ ($courses->isNotEmpty()) ? $courses[0]->course_id : '' }}">
                    @endif
                    @if(request()->has('type'))
                        <input type="hidden" name="course_module" id="course_module" value="{{ request()->type ?? '' }}">
                    @else
                        <input type="hidden" name="course_module" id="course_module" value="Fundamental">
                    @endif
                    <div class="form-group">
                        <label for="PaceofSpeech" class="mb-1" >Speech was of a good pace throughout</label>
                        <select id="PaceofSpeech" name="PaceofSpeech" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->PaceofSpeech == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->PaceofSpeech == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->PaceofSpeech == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->PaceofSpeech == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->PaceofSpeech == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="VolumeofSpeech" class="mb-1">Speech was of a good volume throughout</label>
                        <select id="VolumeofSpeech" name="VolumeofSpeech" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->VolumeofSpeech == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->VolumeofSpeech == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->VolumeofSpeech == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->VolumeofSpeech == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->VolumeofSpeech == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ExcitementandEnergy" class="mb-1">Spoke with excitement and energy throughout</label>
                        <select id="ExcitementandEnergy" name="ExcitementandEnergy" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ExcitementandEnergy == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ExcitementandEnergy == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ExcitementandEnergy == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ExcitementandEnergy == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ExcitementandEnergy == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="AcknowledgementofQuestions" class="mb-1">Acknowledge questions whether they be good or bad</label>
                        <select id="AcknowledgementofQuestions" name="AcknowledgementofQuestions" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->AcknowledgementofQuestions == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->AcknowledgementofQuestions == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->AcknowledgementofQuestions == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->AcknowledgementofQuestions == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->AcknowledgementofQuestions == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ResponsetoOfftopicQuestions" class="mb-1">Off-topic questions are handled or defered</label>
                        <select id="ResponsetoOfftopicQuestions" name="ResponsetoOfftopicQuestions" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ResponsetoOfftopicQuestions == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ResponsetoOfftopicQuestions == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ResponsetoOfftopicQuestions == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ResponsetoOfftopicQuestions == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ResponsetoOfftopicQuestions == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ResponsetoOntopicQuestions" class="mb-1">On-topic questions are answered sussinctly and accuretly</label>
                        <select id="ResponsetoOntopicQuestions" name="ResponsetoOntopicQuestions" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ResponsetoOntopicQuestions == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ResponsetoOntopicQuestions == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ResponsetoOntopicQuestions == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ResponsetoOntopicQuestions == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ResponsetoOntopicQuestions == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="EnsuredBreakstokeepTraineeEngagement" class="mb-1">Gave regular breaks when the students needed them*</label>
                        <select id="EnsuredBreakstokeepTraineeEngagement" name="EnsuredBreakstokeepTraineeEngagement" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->EnsuredBreakstokeepTraineeEngagement == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->EnsuredBreakstokeepTraineeEngagement == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->EnsuredBreakstokeepTraineeEngagement == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->EnsuredBreakstokeepTraineeEngagement == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->EnsuredBreakstokeepTraineeEngagement == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="EnsuredScreenVisibility" class="mb-1">Screen is zoomed in enough to be seen by all students*</label>
                        <select id="EnsuredScreenVisibility" name="EnsuredScreenVisibility" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->EnsuredScreenVisibility == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->EnsuredScreenVisibility == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->EnsuredScreenVisibility == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->EnsuredScreenVisibility == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->EnsuredScreenVisibility == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>