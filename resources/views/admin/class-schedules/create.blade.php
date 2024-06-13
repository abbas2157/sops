@extends('admin.layout.app')
@section('title')
    <title>Schedule Class | SOPS - School of Professional Skills</title>
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />
@stop
@section('content')
    <div class="container-fluid py-5 px-4">
        <div class="border-bottom">
            <h3 class="all-adjustment pb-2 mb-0" style="width: 30%;">Class Schedule </h3>
        </div>
        <form enctype="multipart/form-data" id="" method="post" action="{{ route('steps.store') }}">
            @csrf
            @method('POST')
            <input type="hidden" value="{{ $course->id ?? '' }}" name="course_id">
            <div class="row mt-4">
                <div class="col-md-9">
                    @include('partials.alerts')
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect2">Class Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control subheading mt-2" placeholder="Title" id="exampleFormControlSelect2" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Class Call Link<span class="text-danger">*</span></label>
                                        <input type="text" name="call_link" class="form-control subheading mt-2" placeholder="Class Call Link"  id="exampleFormControlSelect1" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect23">Class Date <span class="text-danger">*</span></label>
                                        <input type="date" name="class_date" class="form-control subheading mt-2" placeholder="Title" id="exampleFormControlSelect23" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect12">Class Time<span class="text-danger">*</span></label>
                                        <input type="time" name="class_time" class="form-control subheading mt-2" placeholder="Class Call Link"  id="exampleFormControlSelect12" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Select Module</label>
                                        <select class="form-control form-select subheading mt-1"
                                            aria-label="Default select example" id="exampleFormControlSelect1" name="type">
                                            <option>Fundamental</option>
                                            <option>Full Skill</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-3">Create Module</button>
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')

@stop
