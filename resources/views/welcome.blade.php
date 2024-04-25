@extends('admin.layout.app')
@section('title')
    <title>Dashboard | SOPS - School of Professional Skills</title>
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
                        <img src="{{ asset('assets/img/content-sale.svg') }}" class="img-fluid text-center" alt=""/>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Enroll Courses</p>
                            <h6 class="mb-0 sales-amount">10</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainers.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <img src="{{ asset('assets/img/content-sale.svg') }}" class="img-fluid text-center" alt=""/>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Trainer</p>
                            <h6 class="mb-0 sales-amount">10</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainees.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <img src="{{ asset('assets/img/content-sale.svg') }}" class="img-fluid text-center" alt=""/>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Trainee</p>
                            <h6 class="mb-0 sales-amount">10</h6>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
@stop