<!-- Modal STart -->
<div class="modal fade" id="ComputerSkillsModal" aria-hidden="true" aria-labelledby="ComputerSkillsModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">Computer Skills </h3>
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
                        <label for="CanInstallSoftwarewithLittletoNoInstruction" class="mb-1" >Can Install Software with Little to No Instruction</label>
                        <select  id="CanInstallSoftwarewithLittletoNoInstruction" name="CanInstallSoftwarewithLittletoNoInstruction" class="form-select">
                            <option value="1" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 1) ? 'selected' : '' }}>Requires extensive guidance and support to install software.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 2) ? 'selected' : '' }}>Needs moderate assistance but can install software with guidance.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 3) ? 'selected' : '' }}>Can install software with minimal assistance.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 4) ? 'selected' : '' }}>Requires little assistance and can independently install software.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 5) ? 'selected' : '' }}>Installs software effortlessly with no instruction.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="CanNavigateInternetwithLittletoNoInstruction" class="mb-1" >Can Navigate Internet with Little to No Instruction</label>
                        <select  id="CanNavigateInternetwithLittletoNoInstruction" name="CanNavigateInternetwithLittletoNoInstruction" class="form-select">
                            <option value="1" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 1) ? 'selected' : '' }}>Struggles to navigate the internet, requires constant guidance.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 1) ? 'selected' : '' }}>Navigates with some difficulty but can do so with guidance.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 1) ? 'selected' : '' }}>Navigates the internet with minimal assistance.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 1) ? 'selected' : '' }}>Independently navigates the internet with little guidance.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->CanInstallSoftwarewithLittletoNoInstruction == 1) ? 'selected' : '' }}>Effortlessly navigates the internet without any instruction.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="CanSearchInternettoFindAnswers" class="mb-1" >Can Search Internet to Find Answers</label>
                        <select  id="CanSearchInternettoFindAnswers" name="CanSearchInternettoFindAnswers" class="form-select">
                            <option value="1" {{ (!is_null($survey) && $survey->CanSearchInternettoFindAnswers == 1) ? 'selected' : '' }}>Struggles to search the internet effectively, needs constant support.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->CanSearchInternettoFindAnswers == 2) ? 'selected' : '' }}>Searches the internet with some difficulty but can find answers with guidance.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->CanSearchInternettoFindAnswers == 3) ? 'selected' : '' }}>Searches the internet with minimal assistance and finds answers.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->CanSearchInternettoFindAnswers == 4) ? 'selected' : '' }}>Independently searches the internet and effectively finds answers.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->CanSearchInternettoFindAnswers == 5) ? 'selected' : '' }}>Masters internet search skills and quickly finds answers with no instruction.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="TroubleshootingSkills" class="mb-1" >Troubleshooting Skills</label>
                        <select  id="TroubleshootingSkills" name="TroubleshootingSkills" class="form-select">
                            <option value="1" {{ (!is_null($survey) && $survey->TroubleshootingSkills == 1) ? 'selected' : '' }}>Demonstrates limited ability to troubleshoot computer issues; relies heavily on assistance.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->TroubleshootingSkills == 2) ? 'selected' : '' }}>Occasionally troubleshoots computer problems but may struggle with complex issues.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->TroubleshootingSkills == 3) ? 'selected' : '' }}>Generally troubleshoots computer problems with moderate success; seeks help when needed.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->TroubleshootingSkills == 4) ? 'selected' : '' }}>Consistently troubleshoots computer issues effectively, demonstrating problem-solving skills.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->TroubleshootingSkills == 5) ? 'selected' : '' }}>Exceptional troubleshooting skills; independently resolves complex computer problems with ease.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="AdaptstoNewSoftwareandTechnologies" class="mb-1" >Adapts to New Software and Technologies</label>
                        <select  id="AdaptstoNewSoftwareandTechnologies" name="AdaptstoNewSoftwareandTechnologies" class="form-select">
                            <option value="1" {{ (!is_null($survey) && $survey->AdaptstoNewSoftwareandTechnologies == 1) ? 'selected' : '' }}>Resistant to adapting to new software and technologies; struggles with updates</option>
                            <option value="2" {{ (!is_null($survey) && $survey->AdaptstoNewSoftwareandTechnologies == 2) ? 'selected' : '' }}>Occasionally adapts to new software but may find it challenging.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->AdaptstoNewSoftwareandTechnologies == 3) ? 'selected' : '' }}>Generally adapts to new software and technologies with moderate ease.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->AdaptstoNewSoftwareandTechnologies == 4) ? 'selected' : '' }}>Quickly adapts to new software and technologies; embraces updates willingly.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->AdaptstoNewSoftwareandTechnologies == 5) ? 'selected' : '' }}>Excels at adapting to and mastering new software and technologies effortlessly.</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->