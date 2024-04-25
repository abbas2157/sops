@extends('admin.layout.app')
@section('title')
    <title>Courses | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment text-center pb-2 mb-0">Courses</h3>
    </div>
    <div class="card card-shadow border-0 mt-4 rounded-3">
    <div class="card-header bg-white border-0 rounded-3">
        <div class="row my-3">
        <div class="col-md-4 col-12">
            <div class="input-search position-relative">
            <input
                type="text"
                placeholder="Search Table"
                class="form-control rounded-3 subheading"
            />
            <span
                class="fa fa-search search-icon text-secondary"
            ></span>
            </div>
        </div>

        <div class="col-md-8 col-12 text-end">
            <button
            class="btn create-btn rounded-3 mt-2"
            data-bs-target="#exampleModalToggle"
            data-bs-toggle="modal"
            >
            Create <i class="bi bi-plus-lg"></i>
            </button>
        </div>
        </div>
    </div>
    <div class="table-responsive p-2">
        <table class="table">
        <thead>
            <tr>
                <th class="align-middle">Course Name</th>
                <th class="align-middle">Course UUID</th>
                <th class="align-middle">Course Description</th>
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($courses->isNotEmpty())
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->name ?? '' }}</td>
                        <td>{{ $course->uuid ?? '' }} </td>
                        <td>{{ $course->description ?? '' }}</td>
                        <td>
                            <div class="d-flex gap-1 justify-content-start">
                                <img src="{{ asset('assets/img/edit-2.svg') }}" class="btn p-0 me-2 ms-0" alt="" />
                                <img src="{{ asset('assets/img/plus-circle.svg') }}" onclick="$('#courses_destroy').submit();" class="btn p-0 m-0" alt=""/>
                                <form id="courses_destroy" action="{{ route('courses.destroy',$course->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
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
@include('admin.courses.create')
@stop
@section('js')
@stop