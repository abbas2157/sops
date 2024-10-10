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
        title: { text: '', x: -80 },
        pane:  { size: '94%' },
        xAxis: {
            categories: ['Completed', 'Nearly Completed', 'Only Started', 'Not Started' ],
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
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>' +
                '{point.y:,.0f}</b><br/>'
        },
        series: [{
            name: '',
            data: {{ json_encode($completion_grade) }},
            pointPlacement: 'on'
        }],
        responsive: {
            rules: [{
                condition: { maxWidth: 500 },
                chartOptions: {
                    legend: { align: 'center', verticalAlign: 'bottom', layout: 'horizontal' },
                    pane: { size: '70%' }
                }
            }]
        }
    });
    Highcharts.chart('assessment_grade', {
        chart: { polar: true, type: 'line' },
        title: { text: '', x: -80 },
        pane:  { size: '94%' },
        xAxis: {
            categories: ['Very Good', 'Good', 'Average', 'Poor', 'Very Poor'],
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
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>' +
                '{point.y:,.0f}</b><br/>'
        },
        series: [{
            name: '',
            data: {{ json_encode($assessment_grade) }},
            pointPlacement: 'on'
        }],
        responsive: {
            rules: [{
                condition: { maxWidth: 500 },
                chartOptions: {
                    legend: { align: 'center', verticalAlign: 'bottom', layout: 'horizontal' },
                    pane: { size: '70%' }
                }
            }]
        }
    });
    setTimeout(() => {
        $('.highcharts-credits').text('');
    }, 1);
</script>
@stop