@extends('trainer.layout.app')
@section('title')
    <title>Add Remarks | SOPS - School of Professional Skills</title>
@stop
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
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
                                        <select class="form-control form-select subheading mt-1" id="completion_grade"  name="completion_grade">
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
                                                <option value="0" selected>The student has not started the course work.</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">Assessment Grading</label>
                                        <select class="form-control form-select subheading mt-1" id="assessment_grade"  name="assessment_grade" disabled>
                                            <optgroup label="Very Good">
                                                <option value="4">The student excelled at the assessment achieving all goals in the most optimal way with little to no help or issues</option>
                                            </optgroup>
                                            <optgroup label="Good">
                                                <option value="3">The student achieved all of the goals in a sub-optimal way with a little help Average - The student achieved all of the goals in a sub-optimal way and with some help.</option>
                                            </optgroup>
                                            <optgroup label="Average">
                                                <option value="2"> The student achieved all of the goals in a sub-optimal way and with some help.</option>
                                            </optgroup>
                                            <optgroup label="Poor">
                                                <option value="1">The student achieved the goals but only with significant help or the student could not achieve some of the goals.</option>
                                            </optgroup>
                                            <optgroup label="Very Poor">
                                                <option value="0">The student could not complete the goals of the assessment. The student did not do the assessment</option>
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
                                        <div id="summernote"></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#completion_grade').change(function(){
            if($(this).val() >= 2) {
                $('#assessment_grade').prop('disabled',false);
            }
            else {
                $('#assessment_grade').prop('disabled',true);
            }
        });
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
