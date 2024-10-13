@extends('trainee.layout.app')
@section('title')
    <title>Trainee Repots | SOPS - School of Professional Skills</title>
@stop
@section('content')
<div class="container-fluid px-4">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Completion Grading <small>(Intro Module)</small></h3>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <figure class="highcharts-figure">
                            <div id="completion_grade"></div>
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
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Assessment Grading <small>(Intro Module)</small></h3>
                        </div>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="assessment_grade"></div>
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
    Highcharts.chart('completion_grade', {
        chart: { polar: true, type: 'line' },
        title: { text: '' },
        pane:  { size: '100%' },
        xAxis: {
            categories: ['Step 1', 'Step 2', 'Step 3', 'Step 4', 'Step 5', 'Step 6', 'Step 7', 'Step 8'],
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
            pointFormat: '<b>Grade is ' + '"{point.y:,.0f}"</b> <br /> 0  => Not Started <br /> 1  => Only Started <br /> 2 => Nearly Completed <br /> 3  => Completed'
        },
        series: [{
            name: ' Percentage : {{ $complete_percenatge ?? 0 }}%',
            data: {{ json_encode($completion_grade) }}
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
    Highcharts.chart('assessment_grade', {
        chart: { polar: true, type: 'line' },
        title: { text: '', x: -80 },
        pane:  { size: '94%' },
        xAxis: {
            categories: ['Step 1', 'Step 2', 'Step 3', 'Step 4', 'Step 5', 'Step 6', 'Step 7', 'Step 8', 'Step 9', 'Step 10'],
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
            pointFormat: '<b>Grade is ' + '"{point.y:,.0f}"</b> <br /> 0  => Very Poor <br /> 1  => Poor <br /> 2 => Average <br /> 3  => Good <br /> 4 => Very Good'
        },
        series: [{
            name: ' Percentage : {{ $assessment_pecentage ?? 0 }}%' ,
            data: {{ json_encode($assessment_grade) }},
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
    setTimeout(() => {
        $('.highcharts-credits').text('');
    }, 1);
</script>
@stop