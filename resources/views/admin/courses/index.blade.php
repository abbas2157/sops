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
                    <input type="text" id="search" placeholder="Search Table" class="form-control rounded-3 subheading"/>
                    <span class="fa fa-search search-icon text-secondary"></span>
                </div>
            </div>
            <div class="col-md-8 col-12 text-end">
                <button class="btn create-btn rounded-3 mt-2" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"> 
                    Create Course <i class="bi bi-plus-lg"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="table-responsive p-2">
        <table class="table">
        <thead>
            <tr>
                <th class="align-middle">Course Name</th>
                <th class="align-middle">Course Description</th>
                <th class="align-middle">Course Steps</th>
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($courses->isNotEmpty())
                @foreach($courses as $course)
                    <tr>
                        <td class="align-middle">{{ $course->name ?? '' }}</td>
                        <td class="align-middle">{{ $course->description ?? '' }}</td>
                        <td> <span class="btn create-btn rounded-3 text-center">Intro Module</span> </td>
                        <td class="align-middle">
                            <div>
                                <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('intro-modules.index',['id' => $course->uuid ]) }}">
                                        <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 17%;" alt=""/>
                                        Intro Module
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <img src="{{ asset('assets/img/plus-circle.svg') }}" class="img-fluid me-1" style="width: 17%;" alt="" onclick="$('#courses_destroy').submit();"/>
                                        Delete Course
                                    </a>
                                    <form id="courses_destroy" action="{{ route('courses.destroy',$course->id) }}" method="post">
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
<script>
    $("#search").on("keyup paste change", function() {
    var value = $(this).val().toLowerCase();
    $("table tr").each(function(index) {
        if (index != 0) {
            $row = $(this);
            var id = $row.find("td:first").text();
            if (id.toLowerCase().indexOf(value) != 0) {
                $(this).hide();
            }
            else {
                $(this).show();
            }
        }
    });
});
    </script>
@stop