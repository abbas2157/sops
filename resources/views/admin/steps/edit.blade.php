@extends('admin.layout.app')
@section('title')
    <title>Create Intro Module | SOPS - School of Professional Skills</title>
@stop
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
@stop
@section('content')
    <div class="container-fluid py-5 px-4">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 30%;">Update {{ $course->name ?? '' }}'s Intro</h3>
        </div>
        <form enctype="multipart/form-data" id="" method="post" action="{{ route('steps.update',$step->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ $course->id ?? '' }}" name="course_id">
            <div class="row mt-4">
                <div class="col-md-9">
                    @include('partials.alerts')
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group fw-bold">
                                        <input type="hidden" name="course_id" id="" value="{{$step->course_id}}">
                                        <label for="exampleFormControlSelect1">Step No<span class="text-danger">*</span></label>
                                        <input type="text" name="steps_no" class="form-control subheading mt-2" readonly value="{{ $step->steps_no ?? '' }}" id="exampleFormControlSelect1" required />
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect2">Intro Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control subheading mt-2" placeholder="Title" id="exampleFormControlSelect2" required value="{{$step->title ?? ''}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Video</label>
                                        <input type="link" name="video" class="form-control subheading mt-2" placeholder="Video Link" id="exampleFormControlSelect1" value="{{$step->video ?? ''}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Short Description </label>
                                        <textarea name="short_description" class="form-control subheading mt-1" id="exampleFormControlTextarea1" placeholder="Short Description" rows="5">{!! $step->short_description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <textarea style="display:none" id="description" name="description"></textarea>
                                    <div class="form-group fw-bold">
                                        <label for="description">Description </label>
                                        <div id="summernote">{!! $step->description !!}</div>
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
                                            <option {{ $step->type == 'Intro' ? 'selected' : '' }}>Intro</option>
                                            {{-- <option {{ $step->type == 'Fundamental' ? 'selected' : '' }}>Fundamental</option>
                                            <option {{ $step->type == 'Full Skill' ? 'selected' : '' }}>Full Skill</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-3 border-0 card-shadow mt-3">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="assignment">Assignment <span class="text-danger"></span></label>
                                        <input type="file" name="assignment" class="form-control subheading mt-2" id="assignment"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-3 border-0 mt-3 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                        <input class="checkbox__input" type="checkbox" id="lock" name="lock" value="0" {{$step->lock == '0' ? 'checked' : ''}}/>
                                        <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                            <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                stroke="rgba(76, 73, 227, 1)" rx="3" />
                                            <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                        </svg>
                                    </label>
                                </div>
                                <div class="col-10">
                                    <label for="lock">By Default Lock?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-3">Update Intro</button>
                    <a href="{{ route('steps.index',['id' => request()->id, 'type' => 'Intro']) }}" class="btn rounded-3 mt-3 excel-btn">Back To Steps</a>
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 250,
            callbacks: {
                onChange: function(contents, $editable) {
                    console.log('onChange:', contents);
                    $('#description').html(contents);
                }
            }
        });
    });
</script>
@stop
