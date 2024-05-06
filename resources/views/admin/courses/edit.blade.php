@extends('admin.layout.app')
@section('title')
    <title>Update Course | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid py-5 px-4">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">Update Course</h3>
        </div>
        <form enctype="multipart/form-data" id="" method="post" action="{{ route('courses.update', $course->id) }}">
            @csrf
            @method('PUT')
            <div class="row mt-4">
                <div class="col-md-8">
                    @include('partials.alerts')
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control subheading mt-2"
                                            placeholder="Name" id="exampleFormControlSelect1" value="{{ $course->name }}"
                                            required />
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-group fw-bold">
                                            <label for="exampleFormControlSelect1">Short Description </label>
                                            <textarea name="description" class="form-control subheading mt-1" id="exampleFormControlTextarea1"
                                                placeholder="Short Description" rows="5">{{$course->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect3">Lectures <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="lectures" class="form-control subheading mt-2"
                                            placeholder="Lectures" id="exampleFormControlSelect3"
                                            value="{{ $course->lectures }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect3" class="">Course Image</label>
                                    <input type="file" name="image" class="form-control subheading mt-2"
                                        id="exampleFormControlInput2" />
                                </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="skill_level">Skill Level<span class="text-danger">*</span></label>
                                        <input type="text" name="skill_level" class="form-control subheading mt-2"
                                            id="skill_level" value="{{ $course->skill_level ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="language">Language<span class="text-danger">*</span></label>
                                        <input type="text" name="language" class="form-control subheading mt-2"
                                            id="language" value="{{ $course->language ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="certificate">Certificate<span class="text-danger">*</span></label>
                                        <input type="text" name="certificate" class="form-control subheading mt-2"
                                            id="certificate" value="{{ $course->certificate ?? '' }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="duration">Duration<span class="text-danger">*</span></label>
                                        <input type="text" name="duration" class="form-control subheading mt-2"
                                            id="duration" value="{{ $course->duration ?? '' }}" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card rounded-3 mt-4 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row fw-bold">

                                <div class="col-md-6">
                                    <div class="row">
                                    <div class="col-md-1">
                                        <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                            <input class="checkbox__input" type="checkbox" id="list" name="list"
                                                value="1" {{$course->list == '1' ? 'checked' : ''}}/>
                                            <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 22 22">
                                                <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                    stroke="rgba(76, 73, 227, 1)" rx="3" />
                                                <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                    stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                            </svg>
                                        </label>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="list">List</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn save-btn text-white mt-3">Update Course</button>
                    </div>

                </div>
            </div>

        </form>
    </div>
@stop
@section('js')
    <script></script>
@stop
