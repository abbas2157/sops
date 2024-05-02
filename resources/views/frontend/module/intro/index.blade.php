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
                    <h1 class=" h6 text-center text-lg-start text-white">Welcome Mudassar Abbas,</h1>
                    <h1 class=" h2 text-center text-lg-start text-white">Your Intro to Web Development Course</h1>
                    <p class="text-white">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-gray-100 py-6">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="container">
                <h1 class="mb-4 h2 text-center text-lg-start">Your steps</h1>
                <!-- Lists -->
                <div class="row">
                    <!-- Course Card -->
                    <div class="col">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="card shadow row g-0 flex-sm-row overflow-hidden">
                                    <div class="card-body col-sm-8">
                                        <h6 class="mb-2">
                                            <a class="text-reset" href="#">Step 1 : A Complete Beginner’s Guide to JavaScript</a>
                                        </h6>
                                        <div class="d-flex lh-sm mb-2">
                                            <p class="fs-sm mb-2">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                        </div>
                                        <a class="btn btn-success" type="submit">Go to Step 1</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card shadow row g-0 flex-sm-row overflow-hidden">
                                    <div class="card-body col-sm-8">
                                        <h6 class="mb-2">
                                            <a class="text-reset" href="#">Step 2 : A Complete Beginner’s Guide to JavaScript</a>
                                        </h6>
                                        <div class="d-flex lh-sm mb-2">
                                            <p class="fs-sm mb-2">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p>
                                        </div>
                                        <a href="{{ route('course.detail',['uuid'=> '9ea9e638-c92b-46f5-97c2-60c04139de72']) }}" class="btn btn-success" type="submit">Go to Step 2</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Lists -->
            </div>
        </div>
    </section>
</main>
@stop