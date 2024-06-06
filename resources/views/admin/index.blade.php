@extends('admin.layout.app')
@section('title')
    <title>Admin Dashboard | SOPS - School of Professional Skills</title>
@stop
@section('content')
<!-- Sale & Revenue Start -->
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <a href="{{ route('courses.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="bi bi-file-earmark-text fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">ENROLLED COURSES</p>
                            <h6 class="mb-0 sales-amount">{{ $courses ?? 0 }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainers.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa fa-users fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">ACTIVE TRAINERS</p>
                            <h6 class="mb-0 sales-amount">{{ $users->where('type','trainer')->count() ?? 0 }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainees.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa fa-user fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">ACTIVE TRAINEES</p>
                            <h6 class="mb-0 sales-amount">{{ $users->where('type','trainee')->count() ?? 0 }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('admin.tasks',['ststus' => 'Pending']) }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-solid fa-layer-group fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">PENDING TASKS</p>
                            <h6 class="mb-0 sales-amount">{{ $tasks->count() ?? 0 }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">MOST FAMOUS COURSE</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <p>Not Found Courses</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">ANNOUNCEMENTS</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <p>Important Updates & Reminers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
@stop