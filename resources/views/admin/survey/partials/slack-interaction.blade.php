<!-- Modal STart -->
<div class="modal fade" id="SlackInteractionModal" aria-hidden="true" aria-labelledby="SlackInteractionModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">Slack Interaction </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="" method="post" action="{{ route('trainer.survey.store') }}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">
                    <div class="form-group">
                        <label for="ActiveParticipationinChannels" class="mb-1" >Active Participation in Channels</label>
                        <select  id="ActiveParticipationinChannels" name="ActiveParticipationinChannels" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ActiveParticipationinChannels == 1) ? 'selected' : '' }}>Rarely engages in channel discussions; minimal interaction.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ActiveParticipationinChannels == 2) ? 'selected' : '' }}>Occasionally participates, but involvement is inconsistent.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ActiveParticipationinChannels == 3) ? 'selected' : '' }}>Generally active in channels, contributing to discussions.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ActiveParticipationinChannels == 4) ? 'selected' : '' }}>Actively engage in discussions, providing valuable contributions.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ActiveParticipationinChannels == 5) ? 'selected' : '' }}>Consistently and enthusiastically participates, fostering collaborative interactions.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="TimelyResponsestoMessages" class="mb-1" >Timely Responses to Messages</label>
                        <select  id="TimelyResponsestoMessages" name="TimelyResponsestoMessages" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->TimelyResponsestoMessages == 1) ? 'selected' : '' }}>Responds infrequently and with significant delays.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->TimelyResponsestoMessages == 2) ? 'selected' : '' }}>Occasionally responds promptly, but response times vary.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->TimelyResponsestoMessages == 3) ? 'selected' : '' }}>Generally provides timely responses to messages.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->TimelyResponsestoMessages == 4) ? 'selected' : '' }}>Respond promptly and consistently in a timely manner.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->TimelyResponsestoMessages == 5) ? 'selected' : '' }}>Exceptional responsiveness; replies promptly, contributing to real-time communication.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="ConstructiveFeedbackandSupport" class="mb-1" >Constructive Feedback and Support</label>
                        <select  id="ConstructiveFeedbackandSupport" name="ConstructiveFeedbackandSupport" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->ConstructiveFeedbackandSupport == 1) ? 'selected' : '' }}>Rarely offers constructive feedback or support to peers.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->ConstructiveFeedbackandSupport == 2) ? 'selected' : '' }}>Occasionally provides feedback but may lack depth or positivity.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->ConstructiveFeedbackandSupport == 3) ? 'selected' : '' }}>Generally offers constructive feedback and support to peers.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->ConstructiveFeedbackandSupport == 4) ? 'selected' : '' }}>Consistently provides valuable insights and support to others.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->ConstructiveFeedbackandSupport == 5) ? 'selected' : '' }}>Exceptional at offering constructive feedback and positive support, enhancing the collaborative environment.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="EffectiveUseofEmojiandReactions" class="mb-1" >Effective Use of Emoji and Reactions</label>
                        <select  id="EffectiveUseofEmojiandReactions" name="EffectiveUseofEmojiandReactions" class="form-select" required>
                            <option value="1" {{ (!is_null($survey) && $survey->EffectiveUseofEmojiandReactions == 1) ? 'selected' : '' }}>Rarely utilizes emojis or reactions in interactions.</option>
                            <option value="2" {{ (!is_null($survey) && $survey->EffectiveUseofEmojiandReactions == 2) ? 'selected' : '' }}>Occasionally uses emojis but sparingly.</option>
                            <option value="3" {{ (!is_null($survey) && $survey->EffectiveUseofEmojiandReactions == 3) ? 'selected' : '' }}>Generally employs emojis and reactions appropriately to enhance communication.</option>
                            <option value="4" {{ (!is_null($survey) && $survey->EffectiveUseofEmojiandReactions == 4) ? 'selected' : '' }}>Consistently uses emojis and reactions effectively to convey emotions or reactions.</option>
                            <option value="5" {{ (!is_null($survey) && $survey->EffectiveUseofEmojiandReactions == 5) ? 'selected' : '' }}>Masters the art of using emojis and reactions, adding a nuanced layer to interactions.</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="EncouragesInclusiveCommunication" class="mb-1" >Encourages Inclusive Communication</label>
                        <select  id="EncouragesInclusiveCommunication" name="EncouragesInclusiveCommunication" class="form-select" required>
                            <option value="1"  {{ (!is_null($survey) && $survey->EncouragesInclusiveCommunication == 1) ? 'selected' : '' }}>Rarely contributes to inclusive communication; interactions may be exclusive.</option>
                            <option value="2"  {{ (!is_null($survey) && $survey->EncouragesInclusiveCommunication == 2) ? 'selected' : '' }}>Occasionally includes others but may not consistently promote inclusivity.</option>
                            <option value="3"  {{ (!is_null($survey) && $survey->EncouragesInclusiveCommunication == 3) ? 'selected' : '' }}>Generally fosters inclusive communication, ensuring everyone feels welcome.</option>
                            <option value="4"  {{ (!is_null($survey) && $survey->EncouragesInclusiveCommunication == 4) ? 'selected' : '' }}>Actively promotes inclusivity in discussions, valuing diverse perspectives.</option>
                            <option value="5"  {{ (!is_null($survey) && $survey->EncouragesInclusiveCommunication == 5) ? 'selected' : '' }}>Exceptional at creating an inclusive environment, actively encouraging participation from all students.</option>
                        </select>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->