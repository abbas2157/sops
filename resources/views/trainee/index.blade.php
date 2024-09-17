@extends('trainee.layout.app')
@section('title')
    <title>Trainee Dashboard | SOPS - School of Professional Skills</title>
@stop
@section('content')
<!-- Sale & Revenue Start -->
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <a href="javascript:;" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="bi bi-file-earmark-text fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">ENROLLED COURSES</p>
                            <h6 class="mb-0 sales-amount"> {{ $my_courses->count() ?? 'N/A' }} </h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="javascript:;" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="bi bi-file-earmark fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">PENDING TASKS</p>
                            <h6 class="mb-0 sales-amount">{{ $tasks->where('status','Pending')->count() ?? 'N/A' }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="javascript:;" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-solid fa-layer-group fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">PASSED TASKS</p>
                            <h6 class="mb-0 sales-amount">{{ $tasks->where('status','Pass')->count() ?? 'N/A' }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="javascript:;" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-solid fa-layer-group fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">FAILED TASKS</p>
                            <h6 class="mb-0 sales-amount">{{ $tasks->where('status','Fail')->count() ?? 'N/A' }}</h6>
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
                        <div class="row mt-2">
                            <div class="col-md-12 mt-2">
                                <h6>Join Today Zoom Class:</h6>
                            </div>
                        </div>
                        @if(!empty($t_classes))
                            @foreach ($t_classes as $item)
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ $item->call_link ?? '' }}" class="text-decoration-none mt-3">
                                            {{ $loop->index+1}} - {{ $item->course->name ?? 'No Course' }}
                                            - {{ $item->batch->title ?? 'No Batch' }}
                                            ({{ $item->batch->code ?? 'No code' }})
                                            -  {{ date('M d, Y',strtotime($item->class_date)) }} {{ date('h:i:s A',strtotime($item->class_time)) }}
                                            (Join)
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No Class Foun</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">ZOOM CLASSES</h3>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 mt-2">
                        <h6>Upcoming Zoom Classes :</h6>
                    </div>
                </div>
                @if(!empty($u_classes))
                    @foreach ($u_classes as $item)
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ $item->call_link ?? '' }}" class="text-decoration-none mt-3">
                                    {{ $loop->index+1}} - {{ $item->course->name ?? 'No Course' }}
                                    - {{ $item->batch->title ?? 'No Batch' }}
                                    ({{ $item->batch->code ?? 'No code' }})
                                    -  {{ date('M d, Y',strtotime($item->class_date)) }} {{ date('h:i:s A',strtotime($item->class_time)) }}
                                    (Join)
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No Class Found</p>
                @endif
                <div class="row mt-1">
                    <div class="col-md-12 mt-2">
                        <h6>Previous Zoom Classes :</h6>
                    </div>
                </div>
                @if(!empty($p_classes))
                    @foreach ($p_classes as $item)
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-0">
                                    {{ $loop->index + 1}} - {{ $item->course->name ?? 'No Course' }}
                                    - {{ $item->batch->title ?? 'No Batch' }}
                                    ({{ $item->batch->code ?? 'No code' }})
                                    -  {{ date('M d, Y',strtotime($item->class_date)) }} {{ date('h:i:s A',strtotime($item->class_time)) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No Class Found</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="border-bottom mt-4">
                    <h3 class="all-adjustment pb-2 mb-0">My Courses</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
                            <li class="nav-item col-md-2 mt-1" role="presentation">
                            <button class="shopping-items nav-link active me-2 w-100" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                IN-PROGRESS
                            </button>
                            </li>
                            <li class="nav-item col-md-2 mt-1" role="presentation">
                            <button class="nav-link shopping-items w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                COMPLETED
                            </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                @include('trainee.partials.in-progress-list')
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                No Course Found
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->
@stop
