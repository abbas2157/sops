@extends('trainer.layout.app')
@section('title')
    <title>My Courses | SOPS - School of Professional Skills</title>
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment text-center pb-2 mb-0">My Courses</h3>
    </div>
    <div class="card card-shadow border-0 mt-4 rounded-3 mb-3">
        <div class="card-header bg-white border-0 rounded-3">
            <div class="row my-3">
                <div class="col-md-4 col-12">
                    <div class="input-search position-relative">
                        <input type="text" id="search" placeholder="Search Table" class="form-control rounded-3 subheading"/>
                        <span class="fa fa-search search-icon text-secondary"></span>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.alerts')
        <div class="table-responsive p-2">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:10%" class="align-middle">Image</th>
                    <th class="align-middle">Course Name</th>
                    <th class="align-middle">Module Type</th>
                    <th class="align-middle">Assigned By</th>
                    <th class="align-middle">Assigned Date</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($courses->isNotEmpty())
                    @foreach($courses as $course)
                        <tr>
                            <td style="width:10%" class="align-middle"><img src="{{ asset('images/courses/'.$course->course->image) }}" style="width: 50%;" alt=""></td>
                            <td class="align-middle">{{ $course->course->name ?? '' }}</td>
                            <td class="align-middle">{{ $course->course_module ?? '' }}</td>
                            <td class="align-middle">{{ $course->assignedby->full_name ?? '' }}</td>
                            <td class="align-middle">{{ $course->created_at->format('M d, Y') ?? '' }}</td>
                            <td class="align-middle" >
                                <div>
                                    <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('trainer.batches',['id' => $course->id]) }}">
                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                            See Batches
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
