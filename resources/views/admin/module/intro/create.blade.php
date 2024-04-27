@extends('admin.layout.app')
@section('title')
    <title>Create Intro Module | SOPS - School of Professional Skills</title>
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />
@stop
@section('content')
    <div class="container-fluid py-5 px-4">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 30%;">Create {{ $course->name ?? '' }}'s Intro</h3>
        </div>
        <form enctype="multipart/form-data" id="" method="post" action="{{ route('trainees.store') }}">
            @csrf
            @method('POST')
            <div class="row mt-4">
                <div class="col-md-9">
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Step No<span class="text-danger">*</span></label>
                                        <input type="text" name="steps_no" class="form-control subheading mt-2" readonly value="Step {{ $intros+1 }}" id="exampleFormControlSelect1" required />
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect2">Intro Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control subheading mt-2" placeholder="Title" id="exampleFormControlSelect2" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Video<span class="text-danger">*</span></label>
                                        <input type="link" name="video" class="form-control subheading mt-2" placeholder="Video Link" id="exampleFormControlSelect1" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Short Description </label>
                                        <textarea name="short_description" class="form-control subheading mt-1" id="exampleFormControlTextarea1" placeholder="Short Description" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="description">Description </label>
                                        <div id="editor">
                                            <p>Hello World!</p>
                                            <p>Some initial <strong>bold</strong> text</p>
                                            <p><br /></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card rounded-3 border-0 mt-3 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="assignment">Assignment <span class="text-danger">*</span></label>
                                        <input type="file" name="assignment" class="form-control subheading mt-2" id="assignment" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-3">Create Intro</button>
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
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],
  ['link', 'image', 'video', 'formula'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];
  const quill = new Quill('#editor', {
    modules: {
    toolbar: toolbarOptions
  },
    theme: 'snow'
  });
</script>
@stop
