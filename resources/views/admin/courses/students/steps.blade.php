@extends('admin.layout.app')
@section('title')
    <title>All {{ $course->name ?? '' }}'s Steps | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment text-center pb-2 mb-0" style="width: auto;">All {{ $user->full_name ?? '' }}'s Steps (Trainer : {{ $course->tainer->user->full_name ?? '' }})</h3>
    </div>
    <div class="row mt-4">
        <div class="col-md-12 ">
            <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
                <li class="nav-item col-md-2 mt-1" role="presentation">
                    <button class="shopping-items nav-link active me-2 w-100" id="pills-intro-tab" data-bs-toggle="pill" data-bs-target="#pills-intro" type="button" role="tab" aria-controls="pills-intro" aria-selected="true">
                        INTRO
                    </button>
                </li>
                <li class="nav-item col-md-2 mt-1" role="presentation">
                    <button class="nav-link shopping-items w-100" id="pills-fundamental-tab" data-bs-toggle="pill" data-bs-target="#pills-fundamental" type="button" role="tab" aria-controls="pills-fundamental" aria-selected="false">
                        FUNDAMENTAL
                    </button>
                </li>
                <li class="nav-item col-md-2 mt-1" role="presentation">
                    <button class="nav-link shopping-items w-100" id="pills-full-skill-tab" data-bs-toggle="pill" data-bs-target="#pills-full-skill" type="button" role="tab" aria-controls="pills-full-skill" aria-selected="false">
                        FULL SKILL
                    </button>
                </li>
                <li class="nav-item text-center col-md-2 mt-1">
                    <a href="{{ route('admin.students',['uuid' => $course->uuid]) }}" class="nav-link shopping-items w-100" >
                    <i class="fa-solid fa-backward"></i> Back
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-intro" role="tabpanel" aria-labelledby="pills-intro-tab" tabindex="0">
                    <div class="card card-shadow border-0 mt-4 rounded-3 p-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="fw-bold">
                                    <tr>
                                        <th>Step No</th>
                                        <th>Title</th>
                                        <th>Given Assignment</th>
                                        <th>Submitted Assignment</th>
                                        <th>Submitted Date</th>
                                        <th>Assignment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($steps->isNotEmpty())
                                        @foreach($steps as $stp)
                                            @if($stp->step->type == 'Intro')
                                                <tr>
                                                    <td class="align-middle">
                                                        <span class="badges tier-one-bg text-center rounded-3">{{ $stp->step->steps_no ?? '' }}</span>
                                                    </td>
                                                    <td class="align-middle">{{ $stp->step->title ?? '' }}</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ asset('course/steps/assignments/'.$stp->step->assignment ) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ asset('trainee/tasks/'.$stp->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">{{ $stp->created_at->format('M d, Y') ?? '' }}</td>
                                                    <td class="align-middle">
                                                        @if($stp->status == 'Pending')
                                                            <span class="badges yellow-border text-center">Pending</span>
                                                        @elseif($stp->status == 'Checking')
                                                            <span class="badges blue-border text-center">Checking</span>
                                                        @elseif($stp->status == 'Pass')
                                                            <span class="badges green-border text-center">Pass</span>
                                                        @else
                                                            <span class="badges red-border text-center">Fail</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <div>
                                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="align-middle text-center">
                                                No Intro Module Found
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-fundamental" role="tabpanel" aria-labelledby="pills-fundamental-tab" tabindex="0">
                    <div class="card card-shadow border-0 mt-4 rounded-3 p-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="fw-bold">
                                    <tr>
                                        <th>Step No</th>
                                        <th>Title</th>
                                        <th>Given Assignment</th>
                                        <th>Submitted Assignment</th>
                                        <th>Submitted Date</th>
                                        <th>Assignment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($steps->isNotEmpty())
                                        @foreach($steps as $stp)
                                            @if($stp->step->type == 'Fundamental')
                                                <tr>
                                                    <td class="align-middle">
                                                        <span class="badges tier-one-bg text-center rounded-3">{{ $stp->step->steps_no ?? '' }}</span>
                                                    </td>
                                                    <td class="align-middle">{{ $stp->step->title ?? '' }}</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ asset('course/steps/assignments/'.$stp->step->assignment ) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ asset('trainee/tasks/'.$stp->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">{{ $stp->created_at->format('M d, Y') ?? '' }}</td>
                                                    <td class="align-middle">
                                                        @if($stp->status == 'Pending')
                                                            <span class="badges yellow-border text-center">Pending</span>
                                                        @elseif($stp->status == 'Checking')
                                                            <span class="badges blue-border text-center">Checking</span>
                                                        @elseif($stp->status == 'Pass')
                                                            <span class="badges green-border text-center">Pass</span>
                                                        @else
                                                            <span class="badges red-border text-center">Fail</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <div>
                                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="align-middle text-center">
                                                No Intro Module Found
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-full-skill" role="tabpanel" aria-labelledby="pills-full-skill-tab" tabindex="0">
                    <div class="card card-shadow border-0 mt-4 rounded-3 p-2">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="fw-bold">
                                    <tr>
                                        <th>Step No</th>
                                        <th>Title</th>
                                        <th>Given Assignment</th>
                                        <th>Submitted Assignment</th>
                                        <th>Submitted Date</th>
                                        <th>Assignment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($steps->isNotEmpty())
                                        @foreach($steps as $stp)
                                            @if($stp->step->type == 'Full Skill')
                                                <tr>
                                                    <td class="align-middle">
                                                        <span class="badges tier-one-bg text-center rounded-3">{{ $stp->step->steps_no ?? '' }}</span>
                                                    </td>
                                                    <td class="align-middle">{{ $stp->step->title ?? '' }}</td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ asset('course/steps/assignments/'.$stp->step->assignment ) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <a href="{{ asset('trainee/tasks/'.$stp->file) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">{{ $stp->created_at->format('M d, Y') ?? '' }}</td>
                                                    <td class="align-middle">
                                                        @if($stp->status == 'Pending')
                                                            <span class="badges yellow-border text-center">Pending</span>
                                                        @elseif($stp->status == 'Checking')
                                                            <span class="badges blue-border text-center">Checking</span>
                                                        @elseif($stp->status == 'Pass')
                                                            <span class="badges green-border text-center">Pass</span>
                                                        @else
                                                            <span class="badges red-border text-center">Fail</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <div>
                                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="align-middle text-center">
                                                No Intro Module Found
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
@stop
@section('js')
@stop
