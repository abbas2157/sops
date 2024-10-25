<div class="card shadow">
    <div class="card-body tab-style-01">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3 class="h5 m-0">How to get help?</h3>
                <p>If you have questions about {{ $course->name ?? '' }} or feeling stuck at any point, ask in a SOPS’ workshop or in Slack.</p>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-bookmarked-tab" data-bs-toggle="tab" data-bs-target="#nav-bookmarked" type="button" role="tab" aria-controls="nav-bookmarked" aria-selected="true">Join a Workshop</button> 
                    <button class="nav-link" id="nav-learning-tab" data-bs-toggle="tab" data-bs-target="#nav-learning" type="button" role="tab" aria-controls="nav-learning" aria-selected="false" tabindex="-1">Ask on Slack</button>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-bookmarked" role="tabpanel" aria-labelledby="nav-bookmarked-tab" tabindex="0">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <p>Workshops are meetings where you can get Intro Module help - you will receive invitations to workshops via email and also you can see upcoming Intro Module workshops specific to your course dates on our website homepage.</p>
                                <a class="btn btn-outline-primary mt-1" href="https://sops.pk/">Attend a workshop</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-learning" role="tabpanel" aria-labelledby="nav-learning-tab" tabindex="0">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <p>Slack is a messaging software - once you have downloaded Slack you can visit our Slack Channel to ask your questions.</p>
                                <a class="btn btn-outline-primary mt-1" href="https://sops.pk/">Join the Slack Channel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>