@extends('frontend.layout.app')
@section('title')
    <title>Course | SOPS - School of Professional Skills</title>
@stop
@section('content')
<main>
    <div class="py-3 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 my-2">
                    <h1 class=" h6 text-center text-lg-start text-white">Welcome {{ Auth::user()->full_name ?? '' }},</h1>
                    <h1 class=" h2 text-center text-lg-start text-white">Your Intro to {{ $course->name ?? '' }} Course</h1>
                    <p class="text-white">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-gray-100 py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="mb-4 h2 text-center text-lg-start">Your steps</h1>
                    @if($intros->isNotEmpty())
                        @foreach($intros as $intro)
                            @if($intro->lock == 1)  
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="card shadow row g-0 flex-sm-row overflow-hidden">
                                        <div class="card-body">
                                            <h6 class="mb-2">
                                                <a class="text-reset" href="{{ route('course.detail',['uuid'=> $intro->uuid]) }}">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</a>
                                            </h6>
                                            <div class="d-flex lh-sm mb-2">
                                                <p class="fs-sm mb-2"> {{ $intro->short_description ?? '' }}</p>
                                            </div>
                                            <a href="{{ route('course.detail',['uuid'=> $intro->uuid]) }}" class="btn btn-success" type="submit">Go to {{ $intro->steps_no ?? '' }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="card shadow row g-0 flex-sm-row overflow-hidden">
                                        <div class="card-body" style="opacity: 0.8;">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <h6 class="mt-1">
                                                        <a class="text-reset" href="Javascrip:;">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</a>
                                                    </h6>
                                                </div>
                                                <div class="col-md-1"><i class="fa-solid fa-lock"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="align-middle text-center">
                                No Intro Module Found
                            </td>
                        </tr>
                    @endif
                </div>
                <div class="col-md-3">
                    <div class="">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="d-flex align-items-start pb-2">
                                    <h3 class="m-0">Rs. 0.0<del class="text-muted fs-lg ps-2">Rs. 0.0</del></h3>
                                    <span class="px-2 py-2 lh-1 ms-auto bg-primary text-white rounded fs-xs">0% off</span>
                                </div>
                                <div class="d-flex flex-column pt-3">
                                    <a class="btn btn-primary" href="#">Buy Now</a> 
                                    <a class="btn btn-outline-primary mt-2" href="#">Enroll Now</a>
                                </div>
                                <ul class="list-group list-group-flush pt-3">
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-regular fa-clock text-primary me-2"></i>
                                        <h6 class="m-0">Duration</h6>
                                        <span class="fs-sm ms-auto">3 Months</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-book text-primary me-2"></i>
                                        <h6 class="m-0">Lectures</h6>
                                        <span class="fs-sm ms-auto">0</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-sliders text-primary me-2"></i>
                                        <h6 class="m-0">Skill level</h6>
                                        <span class="fs-sm ms-auto">Beginner</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-users text-primary me-2"></i>
                                        <h6 class="m-0">Enrolled</h6>
                                        <span class="fs-sm ms-auto">0 Stud.</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                    <i class="fa-solid fa-microphone-lines text-primary me-2"></i>
                                        <h6 class="m-0">Language</h6>
                                        <span class="fs-sm ms-auto">English</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-award text-primary me-2"></i>
                                        <h6 class="m-0">Certificate</h6>
                                        <span class="fs-sm ms-auto">Yes</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@stop