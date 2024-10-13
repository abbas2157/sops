@extends('trainer.layout.app')
@section('title')
    <title>Add Remarks | SOPS - School of Professional Skills</title>
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.0/dist/quill.snow.css" rel="stylesheet" />
@stop
@section('content')
    <div class="container-fluid py-5 px-4">
        <div class="border-bottom">
            <h3 class="all-adjustment pb-2 mb-0" style="width: 30%;">Add Remarks</h3>
        </div>
        <form enctype="multipart/form-data" method="post" action="{{ route('trainer.tasks.remarks.store',$task->id) }}">
            @csrf
            @method('POST')
            <input type="hidden" name="task_id" value="{{ $task->id ?? '' }}">
            <input type="hidden" name="course_id" value="{{ $task->course_id ?? '' }}">
            <input type="hidden" name="user_id" value="{{ $task->user_id ?? '' }}">
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            @if(request()->get('type') == 'intro')
                                @include('trainer.remarks.partials.assignment-table')
                            @else
                                <p><b>Class : </b>{{ $task->class->title ?? '' }}</p>
                                @include('trainer.remarks.partials.task-table')
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Completion Grading</label>
                                        <select class="form-control form-select subheading mt-1"  name="completion_grade">
                                            <optgroup label="Completed">
                                                <option value="3">The student has complete all of the course work.</option>
                                            </optgroup>
                                            <optgroup label="Nearly Completed">
                                                <option value="2">The student has completed 90% or more of the course work.</option>
                                            </optgroup>
                                            <optgroup label="Only Started">
                                                <option value="1">The student has completed less than 90% of the course work.</option>
                                            </optgroup>
                                            <optgroup label="Not Started">
                                                <option value="0">The student has not started the course work.</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Assessment Grading</label>
                                        <select class="form-control form-select subheading mt-1"  name="assessment_grade">
                                            <optgroup label="Very Good">
                                                <option value="4">The student excelled at the assesment.</option>
                                            </optgroup>
                                            <optgroup label="Good">
                                                <option value="3">Good.</option>
                                            </optgroup>
                                            <optgroup label="Average">
                                                <option value="2">Average</option>
                                            </optgroup>
                                            <optgroup label="Poor">
                                                <option value="1">Poor.</option>
                                            </optgroup>
                                            <optgroup label="Very Poor">
                                                <option value="0">Very Poor</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <textarea style="display:none" id="description" name="remarks"></textarea>
                                    <div class="form-group fw-bold">
                                        <label for="description">Add Remarks </label>
                                        <div id="editor" style="height: 200px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-3">Add Remarks</button>
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
    quill.on('text-change', () => {
        const delta = quill.getSemanticHTML();
        $('#description').html(delta);
    });
</script>
@stop
