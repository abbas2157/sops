@extends('trainee.layout.app')
@section('title')
    <title>Trainee Dashboard | SOPS - School of Professional Skills</title>
@stop
@section('content')
<!-- Sale & Revenue Start -->
<div class="container-fluid px-4">
    <div class="border-bottom mt-4">
        <h3 class="all-adjustment pb-2 mb-0">My Courses</h3>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">ANNOUNCEMENTS</h3>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12 mt-2">
                                <h6>Important Updates & Reminders</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-8">
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
                                {{ $loop->index+1}} - {{ $item->course->name ?? 'No Course' }} 
                                - {{ $item->batch->title ?? 'No Batch' }}
                                ({{ $item->batch->code ?? 'No code' }})
                                -  {{ date('M d, Y',strtotime($item->class_date)) }} {{ date('h:i:s A',strtotime($item->class_time)) }}
                                [<a href="{{ $item->call_link ?? '' }}" class="text-decoration-none mt-1">Join</a>]
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

                <div class="row mt-1">
                    <div class="col-md-12 mt-2">
                        <h6>Library Documents</h6>
                    </div>
                </div>
                @if($libraries->isNotEmpty())
                    @foreach ($libraries as $item)
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mb-0">
                                    [{{ $item->version ?? ''}}] - {{ $item->title ?? 'No Doc' }} 
                                    - {{ $item->batch->title ?? 'No Batch' }}
                                    ({{ $item->batch->code ?? 'No code' }})
                                    -  {{ date('M d, Y',strtotime($item->created_at)) }}
                                    [<a href="{{ asset('library/document/'.$item->document) }}">Download</a>] - 
                                    [<a href="{{ asset('library/document/'.$item->document) }}">View</a>] 
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No Class Found</p> 
                @endif
            </div>
        </div>
        <div class="col-md-4">
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
                                        {{ $loop->index+1}} - {{ $item->course->name ?? 'No Course' }} 
                                        - {{ $item->batch->title ?? 'No Batch' }}
                                        ({{ $item->batch->code ?? 'No code' }})
                                        -  {{ date('M d, Y',strtotime($item->class_date)) }} {{ date('h:i:s A',strtotime($item->class_time)) }}
                                        [<a href="{{ $item->call_link ?? '' }}" class="text-decoration-none mt-1">Join</a>]
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No Class Found</p>                        
                        @endif
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <a href="{{ route('trainee.library',['course' => $course->uuid]) }}" class="text-decoration-none mt-3"> Access Library
                        </a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <a href="{{ route('trainee.tasks',['course' => $course->uuid]) }}" class="text-decoration-none mt-3"> View Tasks
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card-shadow border rounded align-items-center p-3">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="border-bottom" style="width: 100%;">
                            <h3 class="all-adjustment pb-2 mb-0" style="width: 100%;">Tasks</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <div class="card-shadow border rounded align-items-center p-3">
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Technical Tasks</h6>
                                        </div>
                                    </div>
                                    @if($tasks->isNotEmpty())
                                        @foreach ($tasks as $item)
                                            @if($item->type == 'Technincal')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="mb-0">
                                                            {{ $loop->index + 1}} - {{ $item->title ?? 'No Doc' }} 
                                                            - {{ $item->batch->title ?? 'No Batch' }}
                                                            ({{ $item->batch->code ?? 'No code' }})
                                                            -  {{ date('M d, Y',strtotime($item->created_at)) }}
                                                            [<a href="{{ asset('library/document/'.$item->file) }}">Download</a>] - 
                                                            [<a href="">Submit Response</a>] 
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <p>No Task Found</p> 
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="card-shadow border rounded align-items-center p-3">
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Personal Development Tasks</h6>
                                        </div>
                                    </div>
                                    @if($tasks->isNotEmpty())
                                        @foreach ($tasks as $item)
                                            @if($item->type == 'Personal Development')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="mb-0">
                                                            {{ $loop->index + 1}} - {{ $item->title ?? 'No Doc' }} 
                                                            - {{ $item->batch->title ?? 'No Batch' }}
                                                            ({{ $item->batch->code ?? 'No code' }})
                                                            -  {{ date('M d, Y',strtotime($item->created_at)) }}
                                                            [<a href="{{ asset('library/document/'.$item->document) }}">Download</a>] - 
                                                            [<a href="{{ asset('library/document/'.$item->document) }}">View</a>] 
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <p>No Task Found</p> 
                                    @endif
                                </div>
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