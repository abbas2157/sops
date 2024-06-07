@extends('admin.layout.app')
@section('title')
    <title>Pending Tasks | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">All Pending Tasks</h3>
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
                        <a href="#" class="btn create-btn rounded-3 mt-2">Filter <i class="bi bi-funnel"></i></a>
                        <a href="#" class="btn rounded-3 mt-2 excel-btn">Excel <i
                                class="bi bi-file-earmark-text"></i></a>
                        <a href="#" class="btn pdf rounded-3 mt-2">Pdf <i class="bi bi-file-earmark"></i></a>
                    </div>
                </div>
            </div>
            @include('partials.alerts')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Phone No</th>
                            <th>Course Name</th>
                            <th>Module</th>
                            <th>Step No</th>
                            <th>Submission Date</th>
                            <th>Given Assignment</th>
                            <th>Submitted Assignment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tasks->isNotEmpty())
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="align-middle">{{ $task->user->full_name ?? '' }}</td>
                                    <td class="align-middle">
                                        <a href="tel:{{ $task->user->phone ?? '' }}" class="text-decoration-none">{{ $task->user->phone ?? '' }}</a>
                                    </td>
                                    <td class="align-middle">{{ $task->course->name ?? '' }}</td>
                                    <td class="align-middle">{{ $task->step->type ?? '' }}</td>
                                    <td class="align-middle">{{ $task->step->steps_no ?? '' }}</td>
                                    <td class="align-middle">{{ $task->created_at->format('M d, Y') ?? '' }}</td>
                                    <td class="align-middle text-center">
                                        <a href="{{ asset('course/steps/assignments/'.$task->step->assignment ) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ asset('trainee/tasks/'.$task->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <div>
                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('admin.tasks.check', $task->id) }}" >
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 20%;" alt=""/>
                                                    Add Remarks
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
        {!! $tasks->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@stop
@section('js')
@stop
