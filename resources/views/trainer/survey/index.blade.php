@extends('trainer.layout.app')
@section('title')
    <title>General Assessment | SOPS - School of Professional Skills</title>
@stop
@section('content')
<div class="container-fluid px-4 mt-3">
    <div class="border-bottom">
        <h3 class="all-adjustment pb-2 mb-0">General Assessment</h3>
    </div>
    @if($courses->isNotEmpty())
        <div class="card card-shadow border-0 mt-4 rounded-3 mb-3 p-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group fw-bold">
                        <label for="course">Select Course</label>
                        <select class="form-control form-select subheading mt-2" name="course" id="course" required>
                            @if($courses->isNotEmpty())
                                @foreach($courses->unique('course_id') as $course)
                                    <option value="{{ $course->course->id ?? '' }}" {{ ($course->course->id == request()->course) ? 'selected' : '' }}>{{ $course->course->name ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group fw-bold">
                        <label for="type">Select Module</label>
                        <select class="form-control form-select subheading mt-2" name="type" id="type" required>
                            @foreach($courses as $course)
                                @if($course_id == $course->course->id)
                                    <option value="{{ $course->course_module ?? '' }}" {{ (request()->type == $course->course_module) ? 'selected' : '' }}>{{ $course->course_module ?? '' }} Module</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 pt-3">
                    <button id="search" class="btn save-btn text-white mt-3">Search</button>
                    <button id="clear" class="btn warning-btn text-white mt-3">Clear</button>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card-shadow border rounded align-items-center p-3">
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <div class="border-bottom" style="width: 100%;">
                                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Collaboration & Teamwork <small><a href="javascript:;" data-bs-target="#CollaborationTeamworkModal" data-bs-toggle="modal">edit</a> </small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <figure class="highcharts-figure">
                                <div id="CollaborationTeamwork"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="card-shadow border rounded align-items-center p-3 mt-2">
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <div class="border-bottom" style="width: 100%;">
                                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Autonomy <small><a href="javascript:;" data-bs-target="#AutonomyModal" data-bs-toggle="modal">edit</a> </small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <figure class="highcharts-figure">
                                <div id="Autonomy"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="card-shadow border rounded align-items-center p-3 mt-2">
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <div class="border-bottom" style="width: 100%;">
                                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Computer Skills <small><a href="javascript:;" data-bs-target="#ComputerSkillsModal" data-bs-toggle="modal">edit</a> </small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <figure class="highcharts-figure">
                                <div id="ComputerSkills"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-shadow border rounded align-items-center p-3">
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <div class="border-bottom" style="width: 100%;">
                                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">English Communication <small><a href="javascript:;" data-bs-target="#EnglishCommunicationModal" data-bs-toggle="modal">edit</a></small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <figure class="highcharts-figure">
                                <div id="EnglishCommunication"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="card-shadow border rounded align-items-center p-3 mt-2">
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <div class="border-bottom" style="width: 100%;">
                                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Communication <small><a href="javascript:;" data-bs-target="#CommunicationModal" data-bs-toggle="modal">edit</a></small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <figure class="highcharts-figure">
                                <div id="Communication"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="card-shadow border rounded align-items-center p-3 mt-2">
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <div class="border-bottom" style="width: 100%;">
                                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Slack Interaction <small><a href="javascript:;" data-bs-target="#SlackInteractionModal" data-bs-toggle="modal">edit</a></small></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            <figure class="highcharts-figure">
                                <div id="SlackInteraction"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card-shadow border rounded align-items-center p-3">
                    <div class="row mb-2">
                        <div class="col-md-12 mt-2">
                            No Course Joined Yet
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@include('trainer.survey.partials.collaboration-teamwork')
@include('trainer.survey.partials.english-communication')
@include('trainer.survey.partials.slack-interaction')
@include('trainer.survey.partials.computer-skills')
@include('trainer.survey.partials.communication')
@include('trainer.survey.partials.autonomy')
@stop
@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    @if(!is_null($survey) && !is_null($survey->WillingnesstoHelpOthers))
        Highcharts.chart('CollaborationTeamwork', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: [   'Willingness to Help Others', 'Willingness to Accept Help from Others',
                                'Notices When Others Are Struggling and Offers Assistance',
                                'Wants to Work with Others with Different Skills, Abilities, and Ideas',
                                'Promotes Inclusive Collaboration'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },
            tooltip: {
                shared: true,
                pointFormat: '<b>Grade is ' + '"{point.y:,.0f}"</b>'
            },
            series: [{
                name: '',
                data: {{ json_encode($CollaborationTeamwork) }}
            }],
            responsive: {
                rules: [{
                    condition: { maxWidth: 500 },
                    chartOptions: {
                        legend: { align: 'center', verticalAlign: 'bottom', layout: 'horizontal' },
                        pane: { size: '100%' }
                    }
                }]
            }
        });
    @endif

    @if(!is_null($survey) && !is_null($survey->Speaking))
        Highcharts.chart('EnglishCommunication', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Speaking', 'Pronunciation', 'Writing (on Slack or other platforms)', 'Improvement Efforts (Speaking, Reading, Writing, Comprehension)', 'Active Listening'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 0
            },
            tooltip: {
                shared: true,
                pointFormat: '<b>Grade is ' + '"{point.y:,.0f}"</b> '
            },
            series: [{
                name: '',
                data: {{ json_encode($EnglishCommunication) }}
            }],
            responsive: {
                rules: [{
                    condition: { maxWidth: 500 },
                    chartOptions: {
                        legend: { align: 'center', verticalAlign: 'bottom', layout: 'horizontal' },
                        pane: { size: '100%' }
                    }
                }]
            }
        });
    @endif

    @if(!is_null($survey) && !is_null($survey->OrganizesStudyTimeEffectively))
        Highcharts.chart('Autonomy', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Organizes Study Time Effectively', 'Writes SMART Goals and Achieves Results',
                'Invested in Learning, Seeks New Opportunities', 'Works Independently, Seeks Help When Needed',
                 'Adapts to Challenges and Changes'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 1
            },
            tooltip: {
                shared: true,
                pointFormat: '<b>Grade is ' + '"{point.y:,.0f}"</b> '
            },
            series: [{
                name: '',
                data: {{ json_encode($Autonomy) }}
            }],
            responsive: {
                rules: [{
                    condition: { maxWidth: 500 },
                    chartOptions: {
                        legend: { align: 'center', verticalAlign: 'bottom', layout: 'horizontal' },
                        pane: { size: '100%' }
                    }
                }]
            }
        });
    @endif

    @if(!is_null($survey) && !is_null($survey->ConfidentlyCommunicateVerballyinSmallGroups))
        Highcharts.chart('Communication', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Confidently Communicate Verbally in Small Groups',
                 'Confidently Communicate Verbally in Large Groups or Working Toward Improvement', 'Understands Written Instructions',
                  'Seeks Clarification When Needed', 'Has Good Listening Skills'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 1
            },
            tooltip: {
                shared: true,
                pointFormat: '<b>Grade is ' + '"{point.y:,.0f}"</b> '
            },
            series: [{
                name: '',
                data: {{ json_encode($Communication) }}
            }],
            responsive: {
                rules: [{
                    condition: { maxWidth: 500 },
                    chartOptions: {
                        legend: { align: 'center', verticalAlign: 'bottom', layout: 'horizontal' },
                        pane: { size: '100%' }
                    }
                }]
            }
        });
    @endif

    @if(!is_null($survey) && !is_null($survey->CanInstallSoftwarewithLittletoNoInstruction))
        Highcharts.chart('ComputerSkills', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Can Install Software with Little to No Instruction', 'Can Navigate Internet with Little to No Instruction',
                 'Can Search Internet to Find Answers', 'Troubleshooting Skills', 'Adapts to New Software and Technologies'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 1
            },
            tooltip: {
                shared: true,
                pointFormat: '<b>Grade is ' + '"{point.y:,.0f}"</b> '
            },
            series: [{
                name: '',
                data: {{ json_encode($ComputerSkills) }}
            }],
            responsive: {
                rules: [{
                    condition: { maxWidth: 500 },
                    chartOptions: {
                        legend: { align: 'center', verticalAlign: 'bottom', layout: 'horizontal' },
                        pane: { size: '100%' }
                    }
                }]
            }
        });
    @endif

    @if(!is_null($survey) && !is_null($survey->ActiveParticipationinChannels))
        Highcharts.chart('SlackInteraction', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Active Participation in Channels', 'Timely Responses to Messages', 'Constructive Feedback and Support',
                 'Effective Use of Emoji and Reactions', 'Encourages Inclusive Communication'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'polygon',
                lineWidth: 0,
                min: 1
            },
            tooltip: {
                shared: true,
                pointFormat: '<b>Grade is ' + '"{point.y:,.0f}"</b> '
            },
            series: [{
                name: '',
                data: {{ json_encode($SlackInteraction) }}
            }],
            responsive: {
                rules: [{
                    condition: { maxWidth: 500 },
                    chartOptions: {
                        legend: { align: 'center', verticalAlign: 'bottom', layout: 'horizontal' },
                        pane: { size: '100%' }
                    }
                }]
            }
        });
    @endif
    
    setTimeout(() => {
        $('.highcharts-credits').text('');
    }, 1);

    $( document ).ready(function() {
        $('#search').click(function(){
            var url = '?';
            if ($('#course').val() != '' &&  $('#course').val() != undefined) {
                url += 'course='+$('#course').val();
            }
            if ($('#type').val() != '' &&  $('#type').val() != undefined && $('#type').val() != 'Intro') {
                url += '&type='+$('#type').val();
            }
            window.location.replace('{{ route('trainer.survey',$user->uuid) }}' +  url);
        })
    });
    $(document).on("click", "#clear", function (e) {
        window.location.replace('{{ route('trainer.survey',$user->uuid) }}');
    });
</script>
@stop