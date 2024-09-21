@extends('trainee.layout.app')
@section('title')
    <title>More Courses | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid px-4">
        <div class="border-bottom mt-4">
            <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
                <li class="nav-item col-md-2 mt-1" role="presentation">
                    <button class="shopping-items nav-link active me-2 w-100" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        MY COURSES
                    </button>
                </li>
                <li class="nav-item col-md-2 mt-1" role="presentation">
                    <button class="nav-link shopping-items w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        MORE COURSES
                    </button>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12 mt-4">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        @include('trainee.partials.in-progress-list')
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="row">
                            @if ($courses->isNotEmpty())
                                @foreach ($courses as $course)
                                    <div class="col-md-3">
                                        <div class="course-box border rounded align-items-center" style="position: relative;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="badgecs">PKR {{ $course->price ?? '00' }}</div>
                                                    <img src="{{ asset('assets/img/course-bg.png') }}" class="course-img">
                                                    <img src="{{ asset('assets/img/logo.png') }}" class="logo-place">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3 class="mt-5 ps-3 course-name"> {{ $course->name ?? '' }}</h3>
                                                    <p class="ps-3">School of Professional Skills</p class="ps-3">
                                                </div>
                                            </div>
                                            <div class="row mt-5 mb-3">
                                                <div class="col-md-12">
                                                   <a class="text-decoration-none ps-3" target="_blank" href="{{ $course->detail_url ?? '' }}">View Detail</a>
                                                   <a class="text-decoration-none ps-3" target="_blank" href="{{ route('trainee.courses.join',['uuid'=> $course->uuid]) }}">Enroll here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                No Course Found
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->
@stop
