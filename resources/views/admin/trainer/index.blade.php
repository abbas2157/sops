@extends('admin.layout.app')
@section('title')
    <title>Trainers | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment text-center pb-2 mb-0">All Trainers</h3>
    </div>
    <div class="card border-0 card-shadow rounded-3 p-2 mt-4">
    <div class="card-header border-0 bg-white">
        <div class="row my-3">
            <div class="col-md-3 col-12 mt-2">
                <div class="input-search position-relative">
                    <input type="text" placeholder="Search Table" class="form-control rounded-3 subheading"/>
                    <span class="fa fa-search search-icon text-secondary"></span>
                </div>
            </div>
            <div class="col-md-9 col-12 text-end">
                <a href="#" class="btn create-btn rounded-3 mt-2">Filter <i class="bi bi-funnel"></i></a>
                <a href="#" class="btn rounded-3 mt-2 excel-btn">Excel <i class="bi bi-file-earmark-text"></i></a>
                <a href="#" class="btn pdf rounded-3 mt-2">Pdf <i class="bi bi-file-earmark"></i></a>
                <a href="{{ route('trainers.create') }}" class="btn create-btn rounded-3 mt-2">Create Trainer<i class="bi bi-plus-lg"></i></a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-secondary">Full Name</th>
                    <th class="text-secondary">Email</th>
                    <th class="text-secondary">Phone No</th>
                    <th class="text-secondary">Highest Qualification</th>
                    <th class="text-secondary">Areas of Expertise</th>
                    <th class="text-secondary">Years of Experience</th>
                    <th class="text-secondary">Assigned Course</th>
                    <th class="text-secondary">Status</th>
                    <th class="text-secondary">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($trainers->isNotEmpty())
                    @foreach($trainers as $train)
                    <tr>
                        <td class="align-middle">{{ $train->full_name ?? '' }}</td>
                        <td class="align-middle"><a href="mailto:{{ $train->email ?? '' }}" class="text-decoration-none">{{ $train->email ?? '' }}</a></td>
                        <td class="align-middle"><a href="tel:{{ $train->phone ?? '' }}" class="text-decoration-none">{{ $train->phone ?? '' }}</a></td>
                        <td class="align-middle">{{ $train->trainer->highest_qualification ?? '' }}</td>
                        <td class="align-middle">{{ $train->trainer->areas_of_expertise ?? '' }}</td>
                        <td class="align-middle">{{ $train->trainer->years_of_experience ?? '' }}</td>
                        <td class="align-middle">{{ $train->trainer->course->name ?? '' }}</td>
                        <td class="align-middle">
                            @if(is_null($train->email_verified_at))
                                <span class="btn create-btn rounded-3 text-center">Pending</span>
                            @else
                                <span class="badges green-border text-center">Verified</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <div>
                                <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">
                                        <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                        Edit Trainer
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-1" alt=""/>
                                        Delete Trainer
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="align-middle text-center">
                        No Course Found
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    </div>
</div>
@stop
@section('js')
@stop