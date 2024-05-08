@extends('trainee.layout.app')
@section('title')
    <title>Trainee Dashboard | SOPS - School of Professional Skills</title>
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
                            <h6 class="mb-0 sales-amount"> {{ $my_courses->count() ?? 'N/A' }} </h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainers.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="bi bi-file-earmark fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">ACTIVE COURSES</p>
                            <h6 class="mb-0 sales-amount">{{ $my_courses->count() ?? 'N/A' }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainees.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-thin fa-check-square fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">IN-PROGRESS COURSES</p>
                            <h6 class="mb-0 sales-amount">{{ $my_courses->count() ?? 'N/A' }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainees.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-solid fa-layer-group fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">COMPLETED COURSES</p>
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
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="border-bottom mt-4">
                    <h3 class="all-adjustment pb-2 mb-0">My Courses</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
                            <li class="nav-item col-md-2 mt-1" role="presentation">
                            <button class="shopping-items nav-link active me-2 w-100" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                IN-PROGRESS
                            </button>
                            </li>
                            <li class="nav-item col-md-2 mt-1" role="presentation">
                            <button class="nav-link shopping-items w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                FININSHED
                            </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                @if($my_courses->isNotEmpty())
                                    @foreach($my_courses as $my)
                                    <div class="col-md-4 mt-2">
                                        <div class="card-shadow border rounded align-items-center p-3">
                                            <div class="row">
                                                <div class="col-md-12 mt-2">
                                                    <div class="border-bottom" style="width: 100%;">
                                                        <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 100%;">{{ $my->course->name ?? '' }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mt-2 text-center">
                                                    <img src="{{ asset('images/courses/'.$my->course->image) }}" style="width: 30%;" alt="">
                                                    <p>20% Complete</p>
                                                    <a href="{{ route('course', ['uuid' => $my->course->uuid]) }}" class="btn save-btn text-white mt-2"> Continue Course</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    No Course Found
                                @endif
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                No Course Found
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
@stop