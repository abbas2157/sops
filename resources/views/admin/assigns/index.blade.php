@extends('admin.layout.app')
@section('title')
    <title>Course and Trainer | Assigned | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">All Trainers With Assign Courses</h3>
        </div>
        <div class="card card-shadow border-0 mt-4 rounded-3 mb-3 p-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group fw-bold">
                        <label for="course">Select Course</label>
                        <select class="form-control form-select subheading mt-2" id="course">
                            @if($courses->isNotEmpty())
                                <option disabled selected> Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id ?? '' }}" {{ ($course->id == request()->course) ? 'selected' : '' }}>{{ $course->name ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group fw-bold">
                        <label for="course">Select Trainer</label>
                        <select class="form-control form-select subheading mt-1" id="trainer">
                            <option disabled selected> Select Trainer</option>
                            @if($trainers->isNotEmpty())
                                @foreach($trainers as $trainer)
                                    <option value="{{ $trainer->id ?? '' }}" {{ (request()->has('trainer') && $trainer->id == request()->trainer)? 'selected' : ''  }}>{{ $trainer->name ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-2 pt-3">
                    <button id="search" class="btn save-btn text-white mt-3">Search</button>
                    <button id="clear" class="btn warning-btn text-white mt-3">Clear</button>
                </div>
            </div>
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
                        <a href="javascript:;" class="btn save-btn text-white rounded-3 mt-2" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                            Assign Course <i class="bi bi-plus-lg text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            @include('partials.alerts')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-secondary">Full Name</th>
                            <th class="text-secondary">Phone No</th>
                            <th class="text-secondary">Gender</th>
                            <th class="text-secondary">Areas of Expertise</th>
                            <th class="text-secondary">Course Name</th>
                            <th class="text-secondary">Module Type</th>
                            <th class="text-secondary">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($assigns->isNotEmpty())
                            @foreach ($assigns as $assign)
                                <tr>
                                    <td class="align-middle">{{ $assign->trainer->user->full_name ?? '' }}</td>
                                    <td class="align-middle"><a href="tel:{{ $assign->trainer->user->phone ?? '' }}" class="text-decoration-none">{{ $assign->trainer->user->phone ?? '' }}</a></td>
                                    <td class="align-middle">{{ $assign->trainer->gender ?? '' }}</td>
                                    <td class="align-middle">{{ $assign->trainer->areas_of_expertise ?? '' }}</td>
                                    <td class="align-middle">{{ $assign->course->name ?? '' }}</td>
                                    <td class="align-middle">{{ $assign->course_module ?? '' }}</td>
                                    <td class="align-middle">
                                        <div>
                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('admin.courses.assign.remove', $assign->id) }}">
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                                    Remove Trainer
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
        {!! $assigns->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
    @include('admin.assigns.create')
@stop
@section('js')
<script>
    $( document ).ready(function() {
        $('#search').click(function(){
            var url = '?';
            if ($('#course').val() != '' &&  $('#course').val() != undefined) {
                url += 'course='+$('#course').val();
            }
            if ($('#trainer').val() != '' &&  $('#trainer').val() != undefined) {
                url += '&trainer='+$('#trainer').val();
            }
            window.location.replace('{{ route("admin.courses.assign") }}' +  url);
        })
    });
    $(document).on("click", "#clear", function (e) {
        window.location.replace('{{ route("admin.courses.assign") }}');
    });
</script>
@stop
