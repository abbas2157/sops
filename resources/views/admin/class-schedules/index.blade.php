@extends('admin.layout.app')
@section('title')
    <title>All Class Schedules | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment pb-2 mb-0">Class Schedules</h3>
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
                <div class="col-md-8 col-12 text-end">
                    <a href="{{ route('courses.index') }}" class="btn rounded-3 mt-2 excel-btn"> Back to Courses</a>
                    <a href="{{ route('admin.class-schedules.create',['course' => request()->course,'batch' => request()->batch]) }}" class="btn save-btn text-white rounded-3 mt-2"> Create Class <i class="bi bi-plus-lg text-white"></i> </a>
                </div>
            </div>
        </div>
        @include('partials.alerts')
        <div class="table-responsive p-2">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">Class Title</th>
                    <th class="align-middle">Course Name</th>
                    <th class="align-middle">Module Type</th>
                    <th class="align-middle">Batch Name</th>
                    <th class="align-middle">Class Date</th>
                    <th class="align-middle">Class Time</th>
                    <th class="align-middle">Class Link</th>
                    <th class="align-middle">Created By</th>
                    <th class="align-middle">Created at</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($classes->isNotEmpty())
                    @foreach($classes as $class)
                        <tr>
                            <td class="align-middle">{{ $class->title ?? '' }}</td>
                            <td class="align-middle">{{ $class->course->name ?? '' }} </td>
                            <td class="align-middle">{{ $class->type ?? '' }} </td>
                            <td class="align-middle">{{ $class->batch->title ?? '' }} </td>
                            <td class="align-middle">{{ $class->class_date ?? '' }}</td>
                            <td class="align-middle">{{ $class->class_time ?? '' }}</td>
                            <td class="align-middle">{{ $class->call_link ?? '' }}</td>
                            <td class="align-middle">{{ $class->createdby->full_name ?? '' }}</td>
                            <td class="align-middle">{{ $class->created_at->format('M d, Y') ?? '' }}</td>
                            <td class="align-middle" >
                                <div>
                                    <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">
                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 17%;" alt=""/>
                                            Add Task
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.batches.edit', $class->id) }}">
                                            <img src="{{ asset('assets/img/edit-2.svg') }}" class="img-fluid me-1" style="    width: 17%;" alt="" />
                                            Edit Class
                                        </a>

                                        <a class="dropdown-item" href="javascript:;">
                                            <img src="{{ asset('assets/img/plus-circle.svg') }}" class="img-fluid me-1" style="width: 17%;" alt="" onclick="$('#courses_destroy').submit();"/>
                                            Delete Class
                                        </a>
                                        <form id="courses_destroy" action="{{ route('admin.batches.destroy',$class->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="12" class="align-middle text-center">
                            No Class Found
                        </td>
                    </tr>
                @endif

            </tbody>
            </table>
        </div>
    </div>
    {!! $classes->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
@stop
@section('js')
@stop
