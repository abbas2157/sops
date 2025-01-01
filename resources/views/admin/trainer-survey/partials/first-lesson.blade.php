<div class="modal fade" id="FirstLessonModal" aria-hidden="true" aria-labelledby="AutonomyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">First Lesson</h3>
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
                        <label for="TeacherIntro" class="mb-1" >Teacher introduces themselves to the class</label>
                        <select id="TeacherIntro" name="TeacherIntro" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->TeacherIntro == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->TeacherIntro == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->TeacherIntro == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->TeacherIntro == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->TeacherIntro == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="Background" class="mb-1" >Describes their background</label>
                        <select id="Background" name="Background" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->Background == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->Background == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->Background == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->Background == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->Background == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="CurrentRole" class="mb-1" >Describes their current role</label>
                        <select id="CurrentRole" name="CurrentRole" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->CurrentRole == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->CurrentRole == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->CurrentRole == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->CurrentRole == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->CurrentRole == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="InstillingConfidence" class="mb-1" >Instills confidence in the students that they are professional</label>
                        <select id="InstillingConfidence" name="InstillingConfidence" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->InstillingConfidence == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->InstillingConfidence == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->InstillingConfidence == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->InstillingConfidence == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->InstillingConfidence == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>