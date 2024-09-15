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
            <h3 class="all-adjustment pb-2 mb-0">More Courses</h3>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="row">
                    @if ($courses->isNotEmpty())
                        @foreach ($courses as $course)
                            <div class="col-md-3">
                                <div class="card-shadow border rounded align-items-center" style="position: relative;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="badgecs">PKR 15,000</div>
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
    <!-- Sale & Revenue End -->
@stop
