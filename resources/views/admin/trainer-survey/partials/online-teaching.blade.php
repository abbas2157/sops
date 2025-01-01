<div class="modal fade" id="OnlineTeachingModal" aria-hidden="true" aria-labelledby="AutonomyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">Online Teaching</h3>
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
                        <label for="WebcamSeetup" class="mb-1" >Webcam is on with good lighting and angle</label>
                        <select id="WebcamSeetup" name="WebcamSeetup" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->WebcamSeetup == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->WebcamSeetup == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->WebcamSeetup == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->WebcamSeetup == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->WebcamSeetup == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="AudioQuality" class="mb-1" >Microphone is of good quality with limited background noise</label>
                        <select id="AudioQuality" name="AudioQuality" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->AudioQuality == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->AudioQuality == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->AudioQuality == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->AudioQuality == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->AudioQuality == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="SanityCheck" class="mb-1" >Did a sanity check with the students to check they can all see/hear them</label>
                        <select id="SanityCheck" name="SanityCheck" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->SanityCheck == 1) ? 'selected' : '' }}>Very Poor</option>
                            <option value="2" {{ (!is_null($survey) && $survey->SanityCheck == 2) ? 'selected' : '' }}>Poor</option>
                            <option value="3" {{ (!is_null($survey) && $survey->SanityCheck == 3) ? 'selected' : '' }}>Average</option>
                            <option value="4" {{ (!is_null($survey) && $survey->SanityCheck == 4) ? 'selected' : '' }}>Good</option>
                            <option value="5" {{ (!is_null($survey) && $survey->SanityCheck == 5) ? 'selected' : '' }}>Very Good</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>