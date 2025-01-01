<div class="modal fade" id="EndofLessonModal" aria-hidden="true" aria-labelledby="AutonomyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">End of Lesson</h3>
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
                        <label for="RecapLearningObjectives" class="mb-1" >Recapped the Learning Objectives including anything they didn't get to</label>
                        <select id="RecapLearningObjectives" name="RecapLearningObjectives" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->RecapLearningObjectives == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->RecapLearningObjectives == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->RecapLearningObjectives == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->RecapLearningObjectives == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->RecapLearningObjectives == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="HomeworkIntroduction" class="mb-1">Spent some time introducing the homework for the week</label>
                        <select id="HomeworkIntroduction" name="HomeworkIntroduction" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->HomeworkIntroduction == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->HomeworkIntroduction == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->HomeworkIntroduction == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->HomeworkIntroduction == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->HomeworkIntroduction == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ThankStudents" class="mb-1">Thank the students for their time and engagement</label>
                        <select id="ThankStudents" name="ThankStudents" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ThankStudents == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ThankStudents == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ThankStudents == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ThankStudents == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ThankStudents == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ThankSupportStaff" class="mb-1">Thank the TABs and rest of team for their time and involvement</label>
                        <select id="ThankSupportStaff" name="ThankSupportStaff" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ThankSupportStaff == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ThankSupportStaff == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ThankSupportStaff == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ThankSupportStaff == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ThankSupportStaff == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>