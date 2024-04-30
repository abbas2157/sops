@extends('trainee.layout.app')
@section('title')
    <title>Trainee Dashboard | SOPS - School of Professional Skills</title>
@stop
@section('content')
<!-- Sale & Revenue Start -->
<div class="container-fluid px-4">
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
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <div class="card-shadow border rounded align-items-center p-3">
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <div class="border-bottom" style="width: 100%;">
                                            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 100%;">Web Developement</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-2 text-center">
                                        <img src="{{ asset('assets/img/overview.png') }}" style="width: 30%;" alt="">
                                        <p>60% - Completed</p>
                                        <a class="btn save-btn text-white mt-2"> Continue Intro Module</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="card-shadow border rounded align-items-center p-3">
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <div class="border-bottom" style="width: 100%;">
                                            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 100%;">Web Developement</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-2 text-center">
                                        <img src="{{ asset('assets/img/overview.png') }}" style="width: 30%;" alt="">
                                        <p>60% - Completed</p>
                                        <a class="btn save-btn text-white mt-2"> Continue Intro Module</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="card-shadow border rounded align-items-center p-3">
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <div class="border-bottom" style="width: 100%;">
                                            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 100%;">Web Developement</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-2 text-center">
                                        <img src="{{ asset('assets/img/overview.png') }}" style="width: 30%;" alt="">
                                        <p>60% - Completed</p>
                                        <a class="btn save-btn text-white mt-2"> Continue Intro Module</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
@stop