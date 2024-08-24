@extends('trainer.layout.app')
@section('title')
    <title>All Task | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card-shadow border rounded align-items-center p-3">
                    <div class="border-bottom ">
                        <h3 class="all-adjustment pb-2 mb-0">All Task</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
                                <li class="nav-item col-md-2 mt-1" role="presentation">
                                <button class="shopping-items nav-link active me-2 w-100" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                    Technical
                                </button>
                                </li>
                                <li class="nav-item col-md-3 mt-1" role="presentation">
                                <button class="nav-link shopping-items w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                    Personal Development
                                </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Student Name</th>
                                                    <th>Course Name</th>
                                                    <th>Task Type</th>
                                                    <th>Class</th>
                                                    <th>Given Task</th>
                                                    <th>Due Date</th>
                                                    <th>Submitted Task</th>
                                                    <th>Submission Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($tasks->isNotEmpty())
                                                    @foreach ($tasks as $item)
                                                        @if($item->task->type == 'Technical')
                                                        <tr>
                                                            <td class="align-middle">{{ $item->user->full_name ?? '' }}</td>
                                                            <td class="align-middle">{{ $item->course->name ?? '' }}</td>
                                                            <td class="align-middle">{{ $item->task->type ?? '' }}</td>
                                                            <td class="align-middle">{{$item->class->title ?? '' }}</td>
                                                            <td class="align-middle text-center">
                                                                <a href="{{ asset('trainee/tasks/'.$item->task->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                            <td class="align-middle">{{ date("M d, Y",strtotime($item->task->due_date)) }}</td>
                                                            <td class="align-middle text-center">
                                                                <a href="{{ asset('trainee/tasks/'.$item->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                            </td>
                                                            <td class="align-middle">{{ $item->created_at->format('M d, Y') ?? '' }}</td>
                                                            <td class="align-middle">{{ $item->status ?? '' }}</td>
                                                            <td>
                                                                <div>
                                                                    <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <i class="fa-solid fa-ellipsis-v"></i>
                                                                    </a>
                                                                    @if($item->status == 'Pending')
                                                                    <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                                        <a class="dropdown-item" href="{{ route('trainer.tasks.remarks.create', $item->id) }}?type=fundamental" >
                                                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 20%;" alt=""/>
                                                                            Add Remarks
                                                                        </a>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="10" class="align-middle text-center">
                                                            No user Found
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Student Name</th>
                                                        <th>Course Name</th>
                                                        <th>Task Type</th>
                                                        <th>Class</th>
                                                        <th>Given Task</th>
                                                        <th>Due Date</th>
                                                        <th>Submitted Task</th>
                                                        <th>Submission Date</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($tasks->isNotEmpty())
                                                        @foreach ($tasks as $item)
                                                            @if($item->task->type = 'Personal Development')
                                                            <tr>
                                                                <td class="align-middle">{{ $item->user->full_name ?? '' }}</td>
                                                                <td class="align-middle">{{ $item->course->name ?? '' }}</td>
                                                                <td class="align-middle">{{ $item->task->type ?? '' }}</td>
                                                                <td class="align-middle">{{$item->class->title ?? '' }}</td>
                                                                <td class="align-middle text-center">
                                                                    <a href="{{ asset('trainee/tasks/'.$item->task->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                                        <i class="fa fa-download"></i>
                                                                    </a>
                                                                </td>
                                                                <td class="align-middle">{{ date("M d, Y",strtotime($item->task->due_date)) }}</td>
                                                                <td class="align-middle text-center">
                                                                    <a href="{{ asset('trainee/tasks/'.$item->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                                        <i class="fa fa-download"></i>
                                                                    </a>
                                                                </td>
                                                                <td class="align-middle">{{ $item->created_at->format('M d, Y') ?? '' }}</td>
                                                                <td class="align-middle">{{ $item->status ?? '' }}</td>
                                                                <td>
                                                                    <div>
                                                                        <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="fa-solid fa-ellipsis-v"></i>
                                                                        </a>
                                                                        @if($item->status == 'Pending')
                                                                        <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                                            <a class="dropdown-item" href="{{ route('trainer.tasks.remarks.create', $item->id) }}?type=fundamental" >
                                                                                <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 20%;" alt=""/>
                                                                                Add Remarks
                                                                            </a>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="10" class="align-middle text-center">
                                                                No user Found
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
@stop
