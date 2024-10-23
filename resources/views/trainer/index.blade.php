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
                    <a href="" class="text-decoration-none">
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
                    <a href="" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="bi bi-file-earmark fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Pending Tasks</p>
                            <h6 class="mb-0 sales-amount">{{ $assignments->count() + $tasks->count() }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="{{ route('trainer.students') }}" class="text-decoration-none">
                    <div class="card-shadow border rounded d-flex align-items-center p-3">
                        <i class="fa-solid fa-layer-group fs-2"></i>
                        <div class="ms-3">
                            <p class="mb-1 fs-6 text-muted subheading">Total Students</p>
                            <h6 class="mb-0 sales-amount">{{ $students ?? 'N/A' }}</h6>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 mt-4">
                    <a href="" class="text-decoration-none">
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
    @if($workshops->isNotEmpty())
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card-shadow border rounded align-items-center p-3">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="border-bottom" style="width: 100%;">
                                <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Workshops</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="table-responsive p-2">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Registeration Link</th>
                                        <th class="align-middle">Workshop Title</th>
                                        <th class="align-middle">Workshop Date</th>
                                        <th class="align-middle">Workshop Time</th>
                                        <th class="align-middle">Workshop Type</th>
                                        <th class="align-middle">Link or Address</th>
                                        <th class="align-middle">Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($workshops->isNotEmpty())
                                        @foreach($workshops as $workshop)
                                            <tr>
                                                <td class="align-middle">
                                                    <input type="hidden" value="{{ $workshop->workshop_link ?? '' }}" id="copyText_{{ $workshop->id ?? '' }}" >
                                                    <i class="bi bi-file-earmark-text fs-6" style="cursor: copy;" onclick="copyToClipboard({{ $workshop->id ?? '' }})"></i> 
                                                    <a target="_blank" href="{{ route('workshop.register', $workshop->uuid) }}">Register link</a>
                                                </td>
                                                <td class="align-middle">
                                                    {{ $workshop->title ?? '' }}
                                                </td>
                                                <td class="align-middle">{{ date('M d, Y',strtotime($workshop->workshop_date)) }}</td>
                                                <td class="align-middle">{{ date('h:i:s A',strtotime($workshop->workshop_time)) }}</td>
                                                <td class="align-middle">{{ $workshop->type ?? '' }}</td>
                                                <td class="align-middle">
                                                    @if($workshop->type == 'Online')
                                                        <input type="hidden" value="{{ $workshop->workshop_link ?? '' }}" id="copyText_{{ $workshop->id ?? '' }}" >
                                                        <i class="bi bi-file-earmark-text fs-6" style="cursor: copy;" onclick="copyToClipboard({{ $workshop->id ?? '' }})"></i> 
                                                        <a target="_blank" href="{{ $workshop->workshop_link ?? '' }}">Start Workshop</a>
                                                    @else
                                                        {{ $workshop->address ?? '' }}
                                                    @endif
                                                </td>
                                                <td class="align-middle">{{ $workshop->created_at->format('M d, Y') ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="align-middle text-center">
                                                No workshop Found
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
    @endif
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
    @include('trainer.partials.dashboard.assignments')
    @include('trainer.partials.dashboard.tasks')
</div>
<!-- Sale & Revenue End -->
@stop
