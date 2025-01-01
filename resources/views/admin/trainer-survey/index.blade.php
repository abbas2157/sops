@extends('admin.layout.app')
@section('title')
    <title>General Assessment | SOPS - School of Professional Skills</title>
@stop
@section('content')
<div class="container-fluid px-4 mt-3">
    <div class="border-bottom">
        <h3 class="all-adjustment pb-2 mb-0">General Assessment</h3>
    </div>
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
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">First Lesson <small><a href="javascript:;" data-bs-target="#FirstLessonModal" data-bs-toggle="modal">edit</a> </small></h3>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <figure class="highcharts-figure">
                            <div id="FirstLesson"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="card-shadow border rounded align-items-center p-3 mt-2">
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Beginning of Lesson <small><a href="javascript:;" data-bs-target="#BeginningofLessonModal" data-bs-toggle="modal">edit</a> </small></h3>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <figure class="highcharts-figure">
                            <div id="BeginningofLesson"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="card-shadow border rounded align-items-center p-3 mt-2">
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Class Handling <small><a href="javascript:;" data-bs-target="#ClassHandlingModal" data-bs-toggle="modal">edit</a> </small></h3>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <figure class="highcharts-figure">
                            <div id="ClassHandling"></div>
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
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Online Teaching <small><a href="javascript:;" data-bs-target="#OnlineTeachingModal" data-bs-toggle="modal">edit</a></small></h3>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <figure class="highcharts-figure">
                            <div id="OnlineTeaching"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="card-shadow border rounded align-items-center p-3 mt-2">
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Teaching Techniques <small><a href="javascript:;" data-bs-target="#TeachingTechniquesModal" data-bs-toggle="modal">edit</a></small></h3>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <figure class="highcharts-figure">
                            <div id="TeachingTechniques"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="card-shadow border rounded align-items-center p-3 mt-2">
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Exercises & Breakout Tasks <small><a href="javascript:;" data-bs-target="#ExercisesBreakoutTasksModal" data-bs-toggle="modal">edit</a></small></h3>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <figure class="highcharts-figure">
                            <div id="ExercisesBreakoutTasks"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row mb-2 ">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">End of Lesson <small><a href="javascript:;" data-bs-target="#EndofLessonModal" data-bs-toggle="modal">edit</a></small></h3>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mt-2">
                        <figure class="highcharts-figure">
                            <div id="EndofLesson"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.trainer-survey.partials.first-lesson')
@include('admin.trainer-survey.partials.online-teaching')
@include('admin.trainer-survey.partials.beginning-of-lesson')
@include('admin.trainer-survey.partials.teaching-techniques')
@include('admin.trainer-survey.partials.class-handling')
@include('admin.trainer-survey.partials.exercises-breakout-tasks')
@include('admin.trainer-survey.partials.end-of-lesson')
@stop
@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    @if(!is_null($survey) && !is_null($survey->TeacherIntro))
        Highcharts.chart('FirstLesson', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Teacher Intro', 'Background','Current Role ','Instilling Confidence'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'circle',
                lineWidth: 0,
                min: 1,
                tickInterval: 1,
                labels: {
                    formatter: function () {
                        const gradeMapping = {
                            1: 'Very Poor',
                            2: 'Poor',
                            3: 'Average',
                            4: 'Good',
                            5: 'Very Good'
                        };
                        return gradeMapping[this.value] || this.value;
                    }
                }
            },
            tooltip: {
                shared: true,
                formatter: function () {
                    const gradeMapping = {
                        1: 'Very Poor',
                        2: 'Poor',
                        3: 'Average',
                        4: 'Good',
                        5: 'Very Good'
                    };
                    let tooltipText = `${this.points[0].category}<br>`;
                    this.points.forEach(point => {
                        tooltipText += `<b>${gradeMapping[point.y] || point.y}</b><br>`;
                    });
                    return tooltipText;
                }
            },
            series: [{
                name: '',
                data: {{ json_encode($FirstLesson) }}
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

    @if(!is_null($survey) && !is_null($survey->WebcamSeetup))
        Highcharts.chart('OnlineTeaching', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Webcam Seetup', 'Audio Quality','Sanity Check'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'circle',
                lineWidth: 0,
                min: 1,
                tickInterval: 1,
                labels: {
                    formatter: function () {
                        const gradeMapping = {
                            1: 'Very Poor',
                            2: 'Poor',
                            3: 'Average',
                            4: 'Good',
                            5: 'Very Good'
                        };
                        return gradeMapping[this.value] || this.value;
                    }
                }
            },
            tooltip: {
                shared: true,
                formatter: function () {
                    const gradeMapping = {
                        1: 'Very Poor',
                        2: 'Poor',
                        3: 'Average',
                        4: 'Good',
                        5: 'Very Good'
                    };
                    let tooltipText = `${this.points[0].category}<br>`;
                    this.points.forEach(point => {
                        tooltipText += `<b>${gradeMapping[point.y] || point.y}</b><br>`;
                    });
                    return tooltipText;
                }
            },
            series: [{
                name: '',
                data: {{ json_encode($OnlineTeaching) }}
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

    @if(!is_null($survey) && !is_null($survey->ExplainingLearningObjectives))
        Highcharts.chart('BeginningofLesson', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Explaining Learning Objectives', 'Lesson Overview','Introduce Support Staff', 'Engagement Check'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'circle',
                lineWidth: 0,
                min: 1,
                tickInterval: 1,
                labels: {
                    formatter: function () {
                        const gradeMapping = {
                            1: 'Very Poor',
                            2: 'Poor',
                            3: 'Average',
                            4: 'Good',
                            5: 'Very Good'
                        };
                        return gradeMapping[this.value] || this.value;
                    }
                }
            },
            tooltip: {
                shared: true,
                formatter: function () {
                    const gradeMapping = {
                        1: 'Very Poor',
                        2: 'Poor',
                        3: 'Average',
                        4: 'Good',
                        5: 'Very Good'
                    };
                    let tooltipText = `${this.points[0].category}<br>`;
                    this.points.forEach(point => {
                        tooltipText += `<b>${gradeMapping[point.y] || point.y}</b><br>`;
                    });
                    return tooltipText;
                }
            },
            series: [{
                name: '',
                data: {{ json_encode($BeginningofLesson) }}
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

    @if(!is_null($survey) && !is_null($survey->UsesColdCalling))
        Highcharts.chart('TeachingTechniques', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Uses Cold Calling', 'Uses Call & Response','Uses Everybody Writes', 'Uses NOC', 'Uses Popcorning'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'circle',
                lineWidth: 0,
                min: 1,
                tickInterval: 1,
                labels: {
                    formatter: function () {
                        const gradeMapping = {
                            1: 'Very Poor',
                            2: 'Poor',
                            3: 'Average',
                            4: 'Good',
                            5: 'Very Good'
                        };
                        return gradeMapping[this.value] || this.value;
                    }
                }
            },
            tooltip: {
                shared: true,
                formatter: function () {
                    const gradeMapping = {
                        1: 'Very Poor',
                        2: 'Poor',
                        3: 'Average',
                        4: 'Good',
                        5: 'Very Good'
                    };
                    let tooltipText = `${this.points[0].category}<br>`;
                    this.points.forEach(point => {
                        tooltipText += `<b>${gradeMapping[point.y] || point.y}</b><br>`;
                    });
                    return tooltipText;
                }
            },
            series: [{
                name: '',
                data: {{ json_encode($TeachingTechniques) }}
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

    @if(!is_null($survey) && !is_null($survey->UsesColdCalling))
        Highcharts.chart('ClassHandling', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Pace of Speech', 'Volume of Speech','Excitement and Energy', 'Acknowledgement of Questions',
                             'Response to Off-topic Questions', 'Response to On-topic Questions', 'Ensured Breaks to keep Trainee Engagement',
                             'Ensured Screen Visibility'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'circle',
                lineWidth: 0,
                min: 1,
                tickInterval: 1,
                labels: {
                    formatter: function () {
                        const gradeMapping = {
                            1: 'Very Poor',
                            2: 'Poor',
                            3: 'Average',
                            4: 'Good',
                            5: 'Very Good'
                        };
                        return gradeMapping[this.value] || this.value;
                    }
                }
            },
            tooltip: {
                shared: true,
                formatter: function () {
                    const gradeMapping = {
                        1: 'Very Poor',
                        2: 'Poor',
                        3: 'Average',
                        4: 'Good',
                        5: 'Very Good'
                    };
                    let tooltipText = `${this.points[0].category}<br>`;
                    this.points.forEach(point => {
                        tooltipText += `<b>${gradeMapping[point.y] || point.y}</b><br>`;
                    });
                    return tooltipText;
                }
            },
            series: [{
                name: '',
                data: {{ json_encode($ClassHandling) }}
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

    @if(!is_null($survey) && !is_null($survey->UsesColdCalling))
        Highcharts.chart('ExercisesBreakoutTasks', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Understanding of Exercises', 'Clear Instructions', 'Check for Understanding', 'Utilized Support Staff'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'circle',
                lineWidth: 0,
                min: 1,
                tickInterval: 1,
                labels: {
                    formatter: function () {
                        const gradeMapping = {
                            1: 'Very Poor',
                            2: 'Poor',
                            3: 'Average',
                            4: 'Good',
                            5: 'Very Good'
                        };
                        return gradeMapping[this.value] || this.value;
                    }
                }
            },
            tooltip: {
                shared: true,
                formatter: function () {
                    const gradeMapping = {
                        1: 'Very Poor',
                        2: 'Poor',
                        3: 'Average',
                        4: 'Good',
                        5: 'Very Good'
                    };
                    let tooltipText = `${this.points[0].category}<br>`;
                    this.points.forEach(point => {
                        tooltipText += `<b>${gradeMapping[point.y] || point.y}</b><br>`;
                    });
                    return tooltipText;
                }
            },
            series: [{
                name: '',
                data: {{ json_encode($ExercisesBreakoutTasks) }}
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

    @if(!is_null($survey) && !is_null($survey->UsesColdCalling))
        Highcharts.chart('EndofLesson', {
            chart: { polar: true, type: 'line' },
            title: { text: '' },
            pane:  { size: '100%' },
            xAxis: {
                categories: ['Recap Learning Objectives', 'Homework Introduction', 'Thank Students', 'Thank Support Staff'],
                tickmarkPlacement: 'on',
                lineWidth: 0
            },
            yAxis: {
                gridLineInterpolation: 'circle',
                lineWidth: 0,
                min: 1,
                tickInterval: 1,
                labels: {
                    formatter: function () {
                        const gradeMapping = {
                            1: 'Very Poor',
                            2: 'Poor',
                            3: 'Average',
                            4: 'Good',
                            5: 'Very Good'
                        };
                        return gradeMapping[this.value] || this.value;
                    }
                }
            },
            tooltip: {
                shared: true,
                formatter: function () {
                    const gradeMapping = {
                        1: 'Very Poor',
                        2: 'Poor',
                        3: 'Average',
                        4: 'Good',
                        5: 'Very Good'
                    };
                    let tooltipText = `${this.points[0].category}<br>`;
                    this.points.forEach(point => {
                        tooltipText += `<b>${gradeMapping[point.y] || point.y}</b><br>`;
                    });
                    return tooltipText;
                }
            },
            series: [{
                name: '',
                data: {{ json_encode($EndofLesson) }}
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

    
</script>
@stop