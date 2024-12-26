<!-- Modal STart -->
<div class="modal fade" id="CollaborationTeamworkModal" aria-hidden="true" aria-labelledby="CollaborationTeamworkModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">Collaboration & Teamwork </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.survey.store') }}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">
                    <div class="form-group">
                        <label for="WillingnesstoHelpOthers" class="mb-1" >Willingness to Help Others</label>
                        <select id="WillingnesstoHelpOthers" name="WillingnesstoHelpOthers" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->WillingnesstoHelpOthers == 1) ? 'selected' : '' }}>Rarely or never shows a willingness to help others.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->WillingnesstoHelpOthers == 2) ? 'selected' : '' }}>Occasionally shows a willingness to help, but not consistently.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->WillingnesstoHelpOthers == 3) ? 'selected' : '' }}>Demonstrates a moderate level of willingness to help others.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->WillingnesstoHelpOthers == 4) ? 'selected' : '' }}>Consistently shows a high level of willingness to assist peers.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->WillingnesstoHelpOthers == 5) ? 'selected' : '' }}>Always willing to help others, actively seeks opportunities to assist.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="WillingnesstoAcceptHelpfromOthers" class="mb-1" >Willingness to Accept Help from Others</label>
                        <select id="WillingnesstoAcceptHelpfromOthers" name="WillingnesstoAcceptHelpfromOthers" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->WillingnesstoAcceptHelpfromOthers == 1) ? 'selected' : '' }}>Resistant to accepting help; prefers to work independently.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->WillingnesstoAcceptHelpfromOthers == 2) ? 'selected' : '' }}>Occasionally accepts help, but may be hesitant.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->WillingnesstoAcceptHelpfromOthers == 3) ? 'selected' : '' }}>Generally open to accepting help when needed.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->WillingnesstoAcceptHelpfromOthers == 4) ? 'selected' : '' }}>Willingly accepts assistance from others.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->WillingnesstoAcceptHelpfromOthers == 5) ? 'selected' : '' }}>Actively seeks and appreciates help from peers.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="NoticesWhenOthersAreStrugglingandOffersAssistance" class="mb-1" >Notices When Others Are Struggling and Offers Assistance</label>
                        <select id="NoticesWhenOthersAreStrugglingandOffersAssistance" name="NoticesWhenOthersAreStrugglingandOffersAssistance" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->NoticesWhenOthersAreStrugglingandOffersAssistance == 1) ? 'selected' : '' }}>Rarely notices when others are struggling and rarely offers assistance.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->NoticesWhenOthersAreStrugglingandOffersAssistance == 2) ? 'selected' : '' }}>Occasionally notices struggling peers but may not always offer help.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->NoticesWhenOthersAreStrugglingandOffersAssistance == 3) ? 'selected' : '' }}>Generally observant of peers' challenges and offers assistance when appropriate.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->NoticesWhenOthersAreStrugglingandOffersAssistance == 4) ? 'selected' : '' }}>Consistently notices when others are struggling and proactively offers help.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->NoticesWhenOthersAreStrugglingandOffersAssistance == 5) ? 'selected' : '' }}>Highly perceptive of others' challenges; always ready to provide assistance.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas" class="mb-1" >Wants to Work with Others with Different Skills, Abilities, and Ideas</label>
                        <select id="WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas" name="WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas == 1) ? 'selected' : '' }}>Prefers working alone and is reluctant to collaborate with diverse teams.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas == 2) ? 'selected' : '' }}>Occasionally open to working with diverse teams but may prefer homogeneity.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas == 3) ? 'selected' : '' }}>Generally open to collaborating with others with different skills and abilities.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas == 4) ? 'selected' : '' }}>Actively seeks opportunities to work with diverse teams.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->WantstoWorkwithOtherswithDifferentSkillsAbilitiesandIdeas == 5) ? 'selected' : '' }}>Enthusiastically embraces diversity in teams and actively seeks out varied perspectives.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="PromotesInclusiveCollaboration" class="mb-1">Promotes Inclusive Collaboration</label>
                        <select id="PromotesInclusiveCollaboration" name="PromotesInclusiveCollaboration" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->PromotesInclusiveCollaboration == 1) ? 'selected' : '' }}>Rarely fosters inclusivity and may exclude others from collaboration.</option>
                            <option value="2"  {{ (!is_null($survey) && $survey->PromotesInclusiveCollaboration == 2) ? 'selected' : '' }}>Occasionally includes others, but inclusivity is not consistently demonstrated.</option>
                            <option value="3"  {{ (!is_null($survey) && $survey->PromotesInclusiveCollaboration == 3) ? 'selected' : '' }}>Generally works inclusively but may unintentionally exclude at times.</option>
                            <option value="4"  {{ (!is_null($survey) && $survey->PromotesInclusiveCollaboration == 4) ? 'selected' : '' }}>Proactively promotes inclusivity, ensuring diverse voices are heard.</option>
                            <option value="5"  {{ (!is_null($survey) && $survey->PromotesInclusiveCollaboration == 5) ? 'selected' : '' }}>Actively champions and ensures an inclusive environment for collaboration, valuing diversity in contributions.</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->