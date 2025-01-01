<div class="modal fade" id="BeginningofLessonModal" aria-hidden="true" aria-labelledby="AutonomyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">Beginning of Lesson</h3>
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
                        <label for="ExplainingLearningObjectives" class="mb-1" >Read and spend time explaining the Learning Objectives</label>
                        <select id="ExplainingLearningObjectives" name="ExplainingLearningObjectives" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ExplainingLearningObjectives == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ExplainingLearningObjectives == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ExplainingLearningObjectives == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ExplainingLearningObjectives == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ExplainingLearningObjectives == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="LessonOverview" class="mb-1" >Give an overview of the lesson before starting</label>
                        <select id="LessonOverview" name="LessonOverview" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->LessonOverview == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->LessonOverview == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->LessonOverview == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->LessonOverview == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->LessonOverview == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="IntroduceSupportStaff" class="mb-1" >Introduce any other teachers or teaching assitants/buddy (TAB) who are in the class</label>
                        <select id="IntroduceSupportStaff" name="IntroduceSupportStaff" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->IntroduceSupportStaff == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->IntroduceSupportStaff == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->IntroduceSupportStaff == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->IntroduceSupportStaff == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->IntroduceSupportStaff == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="EngagementCheck" class="mb-1" >Ask the students if they are ready to start</label>
                        <select id="EngagementCheck" name="EngagementCheck" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->EngagementCheck == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->EngagementCheck == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->EngagementCheck == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->EngagementCheck == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->EngagementCheck == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>