@extends('admin.layout.app')
@section('title')
    <title>Batch Trainers | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment pb-2 mb-0" style="width:100%">Add Trainers to Batch ({{ $batch->code ?? '' }})</h3>
        </div>
        <div class="card border-0 card-shadow rounded-3 p-2 mt-4 mb-3">
            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-3 col-12 mt-2">
                        <div class="input-search position-relative">
                            <input type="text" placeholder="Search Table" class="form-control rounded-3 subheading" />
                            <span class="fa fa-search search-icon text-secondary"></span>
                        </div>
                    </div>
                    <div class="col-md-9 col-12 text-end">
                        <a href="javascript:;" id="addTrainer" class="btn save-btn text-white rounded-3 mt-2"><i class="bi bi-plus-lg text-white"> </i> Add Trainers</a>
                        <a href="{{ route('admin.batches.index') }}" class="btn rounded-3 mt-2 excel-btn">Back To Batches</a>
                        <a href="{{ route('courses.index') }}" class="btn rounded-3 mt-2 excel-btn"> Back to Courses</a>
                    </div>
                </div>
            </div>
            @include('partials.alerts')
            <div class="table-responsive">
                <form enctype="multipart/form-data" id="batchForm" method="post" action="{{ route('admin.batch-trainers.store') }}">
                    @csrf
                    <input type="hidden" name="batch_id" value="{{ request()->id ?? '' }}">
                    <input type="hidden" name="course_module" value="{{ $batch->type ?? '' }}">
                    <input type="hidden" name="course_id" value="{{ $batch->course_id ?? '' }}">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="align-middle">
                                    <label for="AllTrainers" class="checkbox">
                                    <input class="checkbox__input" type="checkbox" id="AllTrainers">
                                    <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                        <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)" rx="3"></rect>
                                        <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9"></path>
                                    </svg>
                                    </label>
                                </th>
                                <th class="text-secondary">Full Name</th>
                                <th class="text-secondary">Email</th>
                                <th class="text-secondary">Phone No</th>
                                <th class="text-secondary">Course Name</th>
                                <th class="text-secondary">Module</th>
                                <th class="text-secondary">Joined Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($trainers->isNotEmpty())
                                @foreach ($trainers as $user)
                                    <tr>
                                        <td class="align-middle">
                                            <label for="myCheckbox{{ $user->trainer->id ?? '' }}" class="checkbox">
                                                <input class="checkbox__input singleTrainer" value="{{ $user->trainer->id ?? '' }}" name="trainers[]" type="checkbox" {{ (in_array($user->trainer->id,$joined))?'checked':'' }} id="myCheckbox{{ $user->trainer->id ?? '' }}">
                                                <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                                <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="rgba(76, 73, 227, 1)" rx="3"></rect>
                                                <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none" stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9"></path>
                                                </svg>
                                            </label>
                                        </td>
                                        <td class="align-middle">{{ $user->full_name ?? '' }}</td>
                                        <td class="align-middle"><a href="mailto:{{ $user->email ?? '' }}" class="text-decoration-none">{{ $user->email ?? '' }}</a></td>
                                        <td class="align-middle"><a href="tel:{{ $user->phone ?? '' }}" class="text-decoration-none">{{ $user->phone ?? '' }}</a></td>
                                        <td class="align-middle">{{ $batch->course->name ?? '' }}</td>
                                        <td class="align-middle">{{ $batch->type ?? '' }}</td>
                                        <td class="align-middle">{{ $user->created_at->format('M d, Y') ?? '' }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12" class="align-middle text-center">
                                        No user Found
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@stop
@section('js')
<script>
    $('#AllTrainers').click(function(){
        if($("#AllTrainers").prop('checked') == false) {
            $(".singleTrainer").prop('checked',false);
        }
        else {
            $(".singleTrainer").prop('checked',true);
        }
    });
    $('#addTrainer').click(function(){
        $('#batchForm').submit();
    });
    </script>
@stop
