<div class="modal fade" id="AutonomyModal" aria-hidden="true" aria-labelledby="AutonomyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">Autonomy</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.survey.store') }}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">
                    <div class="form-group">
                        <label for="OrganizesStudyTimeEffectively" class="mb-1" >Organizes Study Time Effectively</label>
                        <select id="OrganizesStudyTimeEffectively" name="OrganizesStudyTimeEffectively" class="form-select" required>
                            <option value="1">Struggles to organize study time; often disorganized.</option>
                            <option value="2">Occasionally organizes study time effectively.</option>
                            <option value="3">Generally organizes study time effectively.</option>
                            <option value="4">Consistently organizes study time well.</option>
                            <option value="5">Masterfully organizes study time for maximum productivity.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="WritesSMARTGoalsandAchievesResults" class="mb-1" >Writes SMART Goals and Achieves Results</label>
                        <select id="WritesSMARTGoalsandAchievesResults" name="WritesSMARTGoalsandAchievesResults" class="form-select" required>
                            <option value="1">Rarely sets SMART goals and seldom achieves them.</option>
                            <option value="2">Occasionally sets SMART goals but struggles to achieve them.</option>
                            <option value="3">Generally sets SMART goals and achieves moderate success.</option>
                            <option value="4">Consistently sets SMART goals and achieves results.</option>
                            <option value="5">Exceptional at setting and achieving ambitious SMART goals.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="InvestedinLearningSeeksNewOpportunities" class="mb-1" >Invested in Learning, Seeks New Opportunities</label>
                        <select id="InvestedinLearningSeeksNewOpportunities" name="InvestedinLearningSeeksNewOpportunities" class="form-select" required>
                            <option value="1">Shows minimal interest in learning and rarely seeks new opportunities.</option>
                            <option value="2">Occasionally seeks new learning opportunities.</option>
                            <option value="3">Generally interested in learning and actively seeks new opportunities.</option>
                            <option value="4">Highly invested in continuous learning and consistently seeks new challenges.</option>
                            <option value="5">Demonstrates an unwavering commitment to learning and constantly seeks new opportunities for advancement.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="WorksIndependentlySeeksHelpWhenNeeded" class="mb-1" >Works Independently, Seeks Help When Needed</label>
                        <select id="WorksIndependentlySeeksHelpWhenNeeded" name="WorksIndependentlySeeksHelpWhenNeeded" class="form-select" required>
                            <option value="1">Struggles to work independently; rarely seeks help when needed.</option>
                            <option value="2">Occasionally able to work independently but hesitant to seek help.</option>
                            <option value="3">Generally works independently and seeks help when required.</option>
                            <option value="4">Consistently works through exercises independently and asks for help appropriately.</option>
                            <option value="5">Excels at independent work and knows when to seek assistance for optimal learning.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="AdaptstoChallengesandChanges" class="mb-1" >Adapts to Challenges and Changes</label>
                        <select id="AdaptstoChallengesandChanges" name="AdaptstoChallengesandChanges" class="form-select" required>
                            <option value="1">Struggles to adapt to challenges and is resistant to change.</option>
                            <option value="2">Occasionally adapts to challenges but may find it difficult.</option>
                            <option value="3">Generally adapts well to challenges and navigates changes effectively.</option>
                            <option value="4">Consistently demonstrates adaptability and embraces changes positively.</option>
                            <option value="5">Exceptional at adapting to challenges and proactively embraces change for continuous improvement.</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>