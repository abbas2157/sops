@extends('trainee.layout.app')
@section('title')
    <title>General Assessment | SOPS - School of Professional Skills</title>
@stop
@section('content')
<div class="container-fluid px-4 mt-3">
    <div class="border-bottom">
        <h3 class="all-adjustment pb-2 mb-0">General Assessment</h3>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Collaboration & Teamwork</h3>
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
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Autonomy</h3>
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
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Computer Skills</h3>
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
                <div class="row mb-4">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">English Communication</h3>
                        </div>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="EnglishCommunication"></div>
                </figure>
            </div>
            <div class="card-shadow border rounded align-items-center p-3 mt-2">
                <div class="row mb-4">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Communication</h3>
                        </div>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="Communication"></div>
                </figure>
            </div>
            <div class="card-shadow border rounded align-items-center p-3 mt-2">
                <div class="row mb-4">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Slack Interaction</h3>
                        </div>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="SlackInteraction"></div>
                </figure>
            </div>
        </div>
    </div>
</div>
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
</script>
@stop