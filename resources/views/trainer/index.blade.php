@extends('trainer.layout.app')
@section('title')
    <title>Trainer Dashboard | SOPS - School of Professional Skills</title>
@stop
@section('content')
<!-- Sale & Revenue Start -->
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <a href="{{ route('courses.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="bi bi-file-earmark-text fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">ACTIVE COURSES</p>
                            <h6 class="mb-0 sales-amount"> {{ $courses ?? 'N/A' }} </h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainers.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="bi bi-file-earmark fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Pending Tasks</p>
                            <h6 class="mb-0 sales-amount">{{ $tasks->count() ?? 'N/A' }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainees.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-thin fa-check-square fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Total Students</p>
                            <h6 class="mb-0 sales-amount">{{ $students ?? 'N/A' }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainees.index') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-solid fa-layer-group fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Today Checked Tasks</p>
                            <h6 class="mb-0 sales-amount">N/A</h6>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">QUICK ACTIONS</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <p>Join Class, Access Library, View Tasks</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">ANNOUNCEMENTS</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <p>Important Updates & Reminers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-secondary">Full Name</th>
                                <th class="text-secondary">Phone No</th>
                                <th class="text-secondary">Course Name</th>
                                <th class="text-secondary">Module</th>
                                <th class="text-secondary">Step No</th>
                                <th class="text-secondary">Submission Date</th>
                                <th class="text-secondary">Task</th>
                                <th class="text-secondary">Actions</th>
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
                                        <td class="align-middle">
                                            <a href="{{ asset('trainee/tasks/' . $task->file) }}" class="badges yellow-border text-center text-decoration-none" target="_blank">View Task</a>
                                        </td>
                                        <td>
                                            <div>
                                                <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{ route('trainer.tasks.check', $task->id) }}" >
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
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
@stop
