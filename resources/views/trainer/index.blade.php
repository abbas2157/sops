@extends('trainer.layout.app')
@section('title')
    <title>Trainer Dashboard | SOPS - School of Professional Skills</title>
@stop
@section('content')
<!-- Sale & Revenue Start -->
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <a href="" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="bi bi-file-earmark-text fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">ACTIVE COURSES</p>
                            <h6 class="mb-0 sales-amount"> {{ $courses ?? 'N/A' }} </h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="bi bi-file-earmark fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Pending Tasks</p>
                            <h6 class="mb-0 sales-amount">{{ $assignments->count() + $tasks->count() }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainer.students') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-solid fa-layer-group fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Total Students</p>
                            <h6 class="mb-0 sales-amount">{{ $students ?? 'N/A' }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-solid fa-layer-group fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Today Checked Tasks</p>
                            <h6 class="mb-0 sales-amount">N/A</h6>
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
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">QUICK ACTIONS</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <p>Join Class, Access Library, View Tasks</p>
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
    @include('trainer.partials.dashboard.assignments')
    @include('trainer.partials.dashboard.tasks')
</div>
<!-- Sale & Revenue End -->
@stop
