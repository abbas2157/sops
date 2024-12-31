<div class="modal fade" id="CommunicationModal" aria-hidden="true" aria-labelledby="CommunicationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">Communication</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="" method="post" action="{{ route('trainer.survey.store') }}">
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
                        <label for="ConfidentlyCommunicateVerballyinSmallGroups" class="mb-1" >Confidently Communicate Verbally in Small Groups</label>
                        <select  id="ConfidentlyCommunicateVerballyinSmallGroups" name="ConfidentlyCommunicateVerballyinSmallGroups" class="form-select">
                            <option value="1" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinSmallGroups == 1) ? 'selected' : '' }}>Demonstrates low confidence and effectiveness in small group communication.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinSmallGroups == 2) ? 'selected' : '' }}>Occasionally communicates confidently in small groups but with limitations</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinSmallGroups == 3) ? 'selected' : '' }}>Generally communicates confidently in small groups</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinSmallGroups == 4) ? 'selected' : '' }}>Consistently communicates with confidence in small groups</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinSmallGroups == 5) ? 'selected' : '' }}>Demonstrates exceptional confidence and effectiveness in small group communication.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ConfidentlyCommunicateVerballyinLargeGroups" class="mb-1" >Confidently Communicate Verbally in Large Groups or Working Toward Improvement</label>
                        <select  id="ConfidentlyCommunicateVerballyinLargeGroups" name="ConfidentlyCommunicateVerballyinLargeGroups" class="form-select">
                            <option value="1" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinLargeGroups == 1) ? 'selected' : '' }}>Demonstrates low confidence and effectiveness in large group communication.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinLargeGroups == 2) ? 'selected' : '' }}>Occasionally communicates confidently in large groups but with limitations.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinLargeGroups == 3) ? 'selected' : '' }}>Generally communicates confidently in large groups or is actively working on improvement.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinLargeGroups == 4) ? 'selected' : '' }}>Consistently communicates with confidence in large groups.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ConfidentlyCommunicateVerballyinLargeGroups == 5) ? 'selected' : '' }}>Demonstrates exceptional confidence and effectiveness in large group communication.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="UnderstandsWrittenInstructions" class="mb-1" >Understands Written Instructions</label>
                        <select  id="UnderstandsWrittenInstructions" name="UnderstandsWrittenInstructions" class="form-select">
                            <option value="1"  {{ (!is_null($survey) && $survey->UnderstandsWrittenInstructions == 1) ? 'selected' : '' }}> Struggles to understand written instructions.</option>
                            <option value="2"  {{ (!is_null($survey) && $survey->UnderstandsWrittenInstructions == 2) ? 'selected' : '' }}> Occasionally misunderstands written instructions.</option>
                            <option value="3"  {{ (!is_null($survey) && $survey->UnderstandsWrittenInstructions == 3) ? 'selected' : '' }}> Generally understands written instructions accurately.</option>
                            <option value="4"  {{ (!is_null($survey) && $survey->UnderstandsWrittenInstructions == 4) ? 'selected' : '' }}> Consistently grasps written instructions effectively.</option>
                            <option value="5"  {{ (!is_null($survey) && $survey->UnderstandsWrittenInstructions == 5) ? 'selected' : '' }}> Demonstrates an exceptional ability to understand written instructions.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="SeeksClarificationWhenNeeded" class="mb-1" >Seeks Clarification When Needed</label>
                        <select  id="SeeksClarificationWhenNeeded" name="SeeksClarificationWhenNeeded" class="form-select">
                            <option value="1" {{ (!is_null($survey) && $survey->SeeksClarificationWhenNeeded == 1) ? 'selected' : '' }}>Rarely seeks clarification when faced with uncertainty.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->SeeksClarificationWhenNeeded == 2) ? 'selected' : '' }}>Occasionally seeks clarification but may hesitate.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->SeeksClarificationWhenNeeded == 3) ? 'selected' : '' }}>Generally seeks clarification when needed.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->SeeksClarificationWhenNeeded == 4) ? 'selected' : '' }}>Consistently seeks clarification effectively.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->SeeksClarificationWhenNeeded == 5) ? 'selected' : '' }}>Demonstrates an exceptional ability to proactively seek clarification.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="HasGoodListeningSkills" class="mb-1" >Has Good Listening Skills</label>
                        <select  id="HasGoodListeningSkills" name="HasGoodListeningSkills" class="form-select">
                            <option value="1" {{ (!is_null($survey) && $survey->HasGoodListeningSkills == 1) ? 'selected' : '' }}>Demonstrates poor listening skills.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->HasGoodListeningSkills == 2) ? 'selected' : '' }}>Occasionally struggles to actively listen.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->HasGoodListeningSkills == 3) ? 'selected' : '' }}>Generally exhibits good listening skills.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->HasGoodListeningSkills == 4) ? 'selected' : '' }}>Consistently displays effective listening skills.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->HasGoodListeningSkills == 5) ? 'selected' : '' }}>Demonstrates exceptional listening skills, actively engages in listening.</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>