<div class="modal fade" id="EnglishCommunicationModal" aria-hidden="true" aria-labelledby="EnglishCommunicationModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">English Communication</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="" method="post" action="{{ route('trainer.survey.store') }}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">
                    <div class="form-group">
                        <label for="Speaking" class="mb-1" >Speaking</label>
                        <select  id="Speaking" name="Speaking" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->Speaking == 1) ? 'selected' : '' }}>Limited ability to express ideas in English.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->Speaking == 2) ? 'selected' : '' }}>Basic communication with difficulty in expressing complex sentences.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->Speaking == 3) ? 'selected' : '' }}>Adequate ability to communicate, but with occasional challenges.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->Speaking == 4) ? 'selected' : '' }}>Strong ability to speak in English using complex sentences.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->Speaking == 5) ? 'selected' : '' }}>Exceptional communication skills; easily understood with clarity.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="Pronunciation" class="mb-1" >Pronunciation</label>
                        <select  id="Pronunciation" name="Pronunciation" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->Pronunciation == 1) ? 'selected' : '' }}>Pronunciation is unclear and difficult to understand.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->Pronunciation == 2) ? 'selected' : '' }}>Basic pronunciation with some difficulty in being understood.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->Pronunciation == 3) ? 'selected' : '' }}>Pronunciation is generally clear and understandable.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->Pronunciation == 4) ? 'selected' : '' }}>Clear and understandable pronunciation in most situations.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->Pronunciation == 5) ? 'selected' : '' }}>Excellent pronunciation; effectively communicates with native-like clarity.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="Writing" class="mb-1" >Writing (on Slack or other platforms)</label>
                        <select  id="Writing" name="Writing" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->Writing == 1) ? 'selected' : '' }}>Writing is unclear and lacks coherence.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->Writing == 2) ? 'selected' : '' }}>Basic writing skills with occasional clarity issues.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->Writing == 3) ? 'selected' : '' }}>Generally clear and succinct writing on the platform.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->Writing == 4) ? 'selected' : '' }}>Clear and concise writing; effectively communicates ideas.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->Writing == 5) ? 'selected' : '' }}>Exceptional writing skills; articulates thoughts with precision and clarity.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ImprovementEfforts" class="mb-1" >Improvement Efforts (Speaking, Reading, Writing, Comprehension)</label>
                        <select  id="ImprovementEfforts" name="ImprovementEfforts" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ImprovementEfforts == 1) ? 'selected' : '' }}>Minimal or no effort to improve language skills.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ImprovementEfforts == 2) ? 'selected' : '' }}>Limited effort with occasional attempts to enhance skills.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ImprovementEfforts == 3) ? 'selected' : '' }}>Moderate effort; actively working to improve skills.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ImprovementEfforts == 4) ? 'selected' : '' }}>Consistent effort to enhance language skills in all areas.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ImprovementEfforts == 5) ? 'selected' : '' }}>Exceptional commitment to continuous improvement; actively seeks opportunities for language development.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ActiveListening" class="mb-1" >Active Listening</label>
                        <select  id="ActiveListening" name="ActiveListening" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ActiveListening == 1) ? 'selected' : '' }}>Demonstrates limited ability to comprehend spoken English.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ActiveListening == 2) ? 'selected' : '' }}>Basic listening skills with occasional challenges in understanding.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ActiveListening == 3) ? 'selected' : '' }}>Generally attentive and comprehends spoken English adequately.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ActiveListening == 4) ? 'selected' : '' }}>Strong listening skills; comprehends spoken English effectively.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ActiveListening == 5) ? 'selected' : '' }}>Exceptional active listening; easily understands nuanced language and responds appropriately.</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>