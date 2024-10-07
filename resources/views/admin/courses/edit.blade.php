@extends('admin.layout.app')
@section('title')
    <title>Update Course | SOPS - School of Professional Skills</title>
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />
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
                <div class="col-md-9">
                    @include('partials.alerts')
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control subheading mt-2" placeholder="Name" id="exampleFormControlSelect1" value="{{ $course->name ?? '' }}" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect3">Total Modules <span class="text-danger">*</span></label>
                                        <input type="text" name="lectures" class="form-control subheading mt-2"  placeholder="Total Lectures" id="exampleFormControlSelect3" value="{{ $course->lectures ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="interactive_sessions">Interactive Sessions <span class="text-danger">*</span></label>
                                        <input type="text" name="interactive_sessions" class="form-control subheading mt-2" placeholder="10" id="interactive_sessions" value="{{ $course->interactive_sessions ?? '' }}"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="intro_module">Intro Module <span class="text-danger">*</span></label>
                                        <input type="text" name="intro_module" class="form-control subheading mt-2"  placeholder="Self-paced" id="intro_module" value="{{ $course->intro_module ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="fundamentals_module">Fundamentals Module <span class="text-danger">*</span></label>
                                        <input type="text" name="fundamentals_module" class="form-control subheading mt-2" placeholder="Zoom-based" id="fundamentals_module" value="{{ $course->fundamentals_module ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="full_skill_development">Full Skill Development Module <span class="text-danger">*</span></label>
                                        <input type="text" name="full_skill_development" class="form-control subheading mt-2"  placeholder="Zoom-based" id="full_skill_development" value="{{ $course->full_skill_development ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Skill Level <span class="text-danger">*</span></label>
                                        <select class="form-control form-select subheading mt-2" aria-label="Default select example" id="exampleFormControlSelect1" name="skill_level">
                                            <option {{ $course->skill_level == 'Introductory' ?? '' }}>Introductory</option>
                                            <option {{ $course->skill_level == 'Advanced' ?? '' }}>Advanced</option>
                                            <option {{ $course->skill_level == 'Expert' ?? '' }}>Expert</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="language">Language <span class="text-danger">*</span></label>
                                        <input type="text" name="language" class="form-control subheading mt-2"
                                            id="language" value="{{ $course->language ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Certificate <span class="text-danger">*</span></label>
                                        <select class="form-control form-select subheading mt-2"  name="certificate">
                                            <option {{ $course->certificate == 'Yes' ?? '' }}>Yes</option>
                                            <option {{ $course->certificate == 'No' ?? '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="duration">Total Duration <span class="text-danger">*</span></label>
                                        <input type="text" name="duration" class="form-control subheading mt-2"
                                            id="duration" value="{{ $course->duration ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Short Description </label>
                                        <textarea style="display:none" id="description" name="description">{!! $course->description ?? '' !!}</textarea>
                                        <div id="editor" style="height: 250px">{!! $course->description ?? '' !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 rounded-3 card-shadow">
                        <div class="card-header bg-white p-1">
                            <p class="m-0 fw-bold">Course Picture</p>
                        </div>
                        <div class="card-body">
                            <div class="file-upload m-0" style="padding: 0.5rem .5rem;">
                                <input class="file-input" type="file" name="image"/>
                                <img src="dasheets/img/upload-btn.svg" class="img-fluid" alt="" />
                                <div class="mt-2 subheading">
                                    Drag and Drop to upload or
                                </div>
                                <button class="btn create-btn mt-2">Select Image</button>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-3 border-0 card-shadow mt-2">
                        <div class="card-body">
                            <div class="row fw-bold">
                                <div class="col-md-12">
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
                                        <div class="col-md-10">
                                            <label for="list">List This Course?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-3 border-0 card-shadow mt-2">
                        <div class="card-body">
                            <div class="form-group fw-bold">
                                <label for="detail_url">Detail URL (Website) <span class="text-danger">*</span></label>
                                <input type="text" name="detail_url" class="form-control subheading mt-2"
                                    id="detail_url" value="{{ $course->detail_url ?? '' }}" />
                            </div>
                            <div class="form-group fw-bold mt-1">
                                <label for="price">Course Price<span class="text-danger">*</span></label>
                                <input type="text" name="price" class="form-control subheading mt-2"
                                    id="price" value="{{ $course->price ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <button class="btn save-btn text-white mt-3">Update Course</button>
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
    const toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        ['link', 'image', 'video', 'formula'],

        [{ 'header': 1 }, { 'header': 2 }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }], 
        [{ 'direction': 'rtl' }],

        [{ 'size': ['small', false, 'large', 'huge'] }],
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

        [{ 'color': [] }, { 'background': [] }],
        [{ 'font': [] }],
        [{ 'align': [] }],

        ['clean']
    ];
    const quill = new Quill('#editor', {
        modules: {
        toolbar: toolbarOptions
    },
        theme: 'snow'
    });
    quill.on('text-change', () => {
        const delta = quill.getSemanticHTML();
        $('#description').html(delta);
    });
</script>
@stop
