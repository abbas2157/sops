@extends('admin.layout.app')
@section('title')
    <title>All Batches | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment pb-2 mb-0">Batches</h3>
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
                    <button class="btn save-btn text-white rounded-3 mt-2" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                        Create Batch <i class="bi bi-plus-lg text-white"></i>
                    </button>
                </div>
            </div>
        </div>
        @include('partials.alerts')
        <div class="table-responsive p-2">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">Batch Code</th>
                    <th class="align-middle">Batch Title</th>
                    <th class="align-middle">Batch Duration</th>
                    <th class="align-middle">Course Name</th>
                    <th class="align-middle">Modules Name</th>
                    <th class="align-middle">Created By</th>
                    <th class="align-middle">Created at</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($batches->isNotEmpty())
                    @foreach($batches as $batch)
                        <tr>
                            <td class="align-middle">{{ $batch->code ?? '' }}</td>
                            <td class="align-middle">{{ $batch->title ?? '' }}</td>
                            <td class="align-middle">{{ $batch->duration ?? '' }}</td>
                            <td class="align-middle">{{ $batch->course->name ?? '' }} </td>
                            <td class="align-middle">{{ $batch->type ?? '' }} </td>
                            <td class="align-middle">{{ $batch->createdby->full_name ?? '' }}</td>
                            <td class="align-middle">{{ $batch->created_at->format('M d, Y') ?? '' }}</td>
                            <td class="align-middle" >
                                <div>
                                    <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('admin.batch-trainers.index',['id' => $batch->id]) }}">
                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                            Add Trainers
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.batch-students.index',['id' => $batch->id]) }}">
                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                            Add Students
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.class-schedules.index',['course' => $batch->course_id, 'batch' => $batch->id]) }}">
                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                            Class Schedules
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.library.index',['course' => $batch->course_id, 'batch' => $batch->id]) }}">
                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                            Upload Document
                                        </a>
                                        {{-- <a class="dropdown-item" href="{{ route('admin.batches.edit', $batch->id) }}">
                                            <img src="{{ asset('assets/img/edit-2.svg') }}" class="img-fluid me-1" style="    width: 10%;" alt="" />
                                            Edit Batch
                                        </a> --}}

                                        <a class="dropdown-item" href="javascript:;" onclick="$('#batch_destroy').submit();">
                                            <img src="{{ asset('assets/img/plus-circle.svg') }}" class="img-fluid me-1" style="width: 10%;" alt="" />
                                            Delete Batch
                                        </a>
                                        <form id="batch_destroy" action="{{ route('admin.batches.destroy',$batch->id) }}" method="post">
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
                            No Batch Found
                        </td>
                    </tr>
                @endif

            </tbody>
            </table>
        </div>
    </div>
    {!! $batches->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
@include('admin.batches.create')
@stop
@section('js')
@stop
