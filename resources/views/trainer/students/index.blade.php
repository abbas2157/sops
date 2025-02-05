@extends('trainer.layout.app')
@section('title')
    <title>Students | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom ">
            <h3 class="all-adjustment text-center pb-2 mb-0">All Students</h3>
        </div>
        <div class="card border-0 card-shadow rounded-3 p-2 mt-4 mb-3">
            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-3 col-12 mt-2">
                        <div class="input-search position-relative">
                            <input type="text" placeholder="Search Table" class="form-control rounded-3 subheading" />
                            <span class="fa fa-search search-icon text-secondary"></span>
                        </div>
                    </div>
                    <div class="col-md-9 col-12 text-end">
                    </div>
                </div>
            </div>
            @include('partials.alerts')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-secondary">Full Name</th>
                            <th class="text-secondary">Email</th>
                            <th class="text-secondary">Phone No</th>
                            <th class="text-secondary">Course Name</th>
                            <th class="text-secondary">Joined Date</th>
                            <th class="text-secondary">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($students->isNotEmpty())
                            @foreach ($students as $user)
                                <tr>
                                    <td class="align-middle">{{ $user->full_name ?? '' }}</td>
                                    <td class="align-middle"><a href="mailto:{{ $user->email ?? '' }}"
                                            class="text-decoration-none">{{ $user->email ?? '' }}</a></td>
                                    <td class="align-middle"><a href="tel:{{ $user->phone ?? '' }}"
                                            class="text-decoration-none">{{ $user->phone ?? '' }}</a></td>
                                    <td class="align-middle">{{ $user->trainee->trainee_status->trainee_course->name ?? '' }}</td>
                                    <td class="align-middle">{{ $user->created_at->format('M d, Y') ?? '' }}</td>
                                    <td class="align-middle">
                                        <div>
                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('trainer.students.tasks',$user->uuid) }}?type=intro" >
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                                    View Intro Assignments
                                                </a>
                                                <a class="dropdown-item" href="{{ route('trainer.survey',$user->uuid) }}">
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                                    General Assessment
                                                </a>
                                                <a class="dropdown-item" href="{{ route('trainer.students.tasks',$user->uuid) }}?type=fundamental" >
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                                    View Tasks
                                                </a>
                                                <a class="dropdown-item" href="{{ route('trainer.reports',$user->uuid) }}">
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                                    Reports
                                                </a>
                                               
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="align-middle text-center">
                                    No Record Found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {!! $students->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@stop
@section('js')
@stop
