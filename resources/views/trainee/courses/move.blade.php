@extends('trainee.layout.app')
@section('title')
    <title>More Courses | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid px-4">
        <div class="row mt-4">
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
                                    @if(in_array($course->id, $left_course_ids))
                                        <a class="text-decoration-none ps-3" onclick="$('#move_course').submit();" href="javascript:;">Move Back</a>
                                        <form id="move_course" action="{{ route('trainee.courses.move.perform') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $from_course->id ?? '' }}" name="from">
                                            <input type="hidden" value="{{ $course->id ?? '' }}" name="to">
                                            <input type="hidden" value="move_back" name="type">
                                        </form>
                                    @else
                                        <a class="text-decoration-none ps-3" onclick="$('#move_course').submit();" href="javascript:;">Move To</a>
                                        <form id="move_course" action="{{ route('trainee.courses.move.perform') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $from_course->id ?? '' }}" name="from">
                                            <input type="hidden" value="{{ $course->id ?? '' }}" name="to">
                                        </form>
                                    @endif
                                    
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
@stop
