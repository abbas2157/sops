@extends('frontend.layout.app')
@section('title')
    <title>{{ $intro->title ?? '' }} | SOPS - School of Professional Skills</title>
@stop
@section('content')
    <main>
        <!-- section -->
        <div class="section pt-lg-8 bg-primary pb-lg-12">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 position-relative">
                        <h1 class="text-white pe-6">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</h1>
                        <p class="text-white text-opacity-75 fs-lg">{{ $intro->short_description ?? '' }}.</p>
                        {{-- <div class="nav small">
                            <div class="text-white text-opacity-75">Last Update
                                {{ $intro->updated_at->format('M d, Y') ?? '' }}</div>
                            <div class="vr bg-white mx-3 my-1"></div>
                            <div class="text-white text-opacity-75"><i class="fa fa-users"></i> 0 already enrolled</div>
                            <div class="vr bg-white mx-3 my-1"></div>
                            <div class="text-white text-opacity-75"><i class="fa-regular fa-comment"></i> 0/5 (0 Reviews)
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end section --><!-- section -->
        <section class="bg-gray-100 section pt-0">
            <div class="container">
                <div class="row flex-row-reverse gy-4">
                    <!-- Sidebar -->
                    {{-- <div class="col-lg-3">
                        <div class="course-detail-sidebar">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-2">
                                        <h3 class="m-0">Course Details</h3>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-outline-primary mt-2" href="#">Enroll Now</a>
                                    </div>
                                    <ul class="list-group list-group-flush pt-3">
                                        <li class="list-group-item d-flex align-items-center px-0">
                                            <i class="fa-regular fa-clock text-primary me-2"></i>
                                            <h6 class="m-0">Duration</h6>
                                            <span class="fs-sm ms-auto">{{ $course->duration ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center px-0">
                                            <i class="fa-solid fa-book text-primary me-2"></i>
                                            <h6 class="m-0">Lectures</h6>
                                            <span class="fs-sm ms-auto">{{ $course->lectures ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center px-0">
                                            <i class="fa-solid fa-sliders text-primary me-2"></i>
                                            <h6 class="m-0">Skill level</h6>
                                            <span class="fs-sm ms-auto">{{ $course->skill_level ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center px-0">
                                            <i class="fa-solid fa-users text-primary me-2"></i>
                                            <h6 class="m-0">Enrolled</h6>
                                            <span class="fs-sm ms-auto">0 Stud.</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center px-0">
                                            <i class="fa-solid fa-microphone-lines text-primary me-2"></i>
                                            <h6 class="m-0">Language</h6>
                                            <span class="fs-sm ms-auto">{{ $course->language ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center px-0">
                                            <i class="fa-solid fa-award text-primary me-2"></i>
                                            <h6 class="m-0">Certificate</h6>
                                            <span class="fs-sm ms-auto">{{ $course->certificate ?? '' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End Sidebar --><!-- Tabbar -->
                    <div class="col-lg-12">
                        <div class="course-detail-tab bg-white shadow-sm rounded border border-gray-100">
                            <ul class="nav nav-tabs course-nav-tabs" id="course_detail_tab" role="tablist">
                                <li class="nav-item" role="presentation"><button class="nav-link active" id="overview-tab"
                                        data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button"
                                        role="tab" aria-controls="overview-tab-pane" aria-selected="true">Overview &
                                        Video</button></li>
                                {{-- <li class="nav-item" role="presentation"><button class="nav-link" id="assignment-tab"
                                        data-bs-toggle="tab" data-bs-target="#assignment-tab-pane" type="button"
                                        role="tab" aria-controls="assignment-tab-pane" aria-selected="false">Submit
                                        Assignment</button></li> --}}
                                {{-- <li class="nav-item" role="presentation"><button class="nav-link" id="instructor-tab"
                                        data-bs-toggle="tab" data-bs-target="#instructor-tab-pane" type="button"
                                        role="tab" aria-controls="instructor-tab-pane"
                                        aria-selected="false">Instructors</button></li>
                                <li class="nav-item" role="presentation"><button class="nav-link" id="reviews-tab"
                                        data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button"
                                        role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Student
                                        Reviews</button></li> --}}
                            </ul>
                            <div class="tab-content" id="course_detail_tabContent">
                                <!-- Tab 1 -->
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                    @if(!is_null($intro->video))
                                        <div class="row mt-3 mb-4">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <iframe style="width:100%" height="445" src="{{ $intro->video ?? '' }}"></iframe>
                                            </div>
                                        </div>
                                    @endif
                                    <h2 class="mb-4">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</h2>
                                    {!! $intro->description ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card shadow mt-2">
                            <div class="card-body"> 
                                <div class="row mt-3">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="h5 m-0">Your Assignment for this Class</h5>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                            </div>
                                        </div>
                                        @if(!is_null($intro->assignment))
                                            <div class="card shadow-sm px-3 py-3 mb-4">
                                                <div class="row">
                                                    <div class="col-xs-2 col-sm-2 col-md-1">
                                                        <img src="{{ asset('frontend/img/file.png') }}" style="width: 100%;"
                                                            alt="" class="me-3">
                                                    </div>
                                                    <div class="col-xs-8 col-sm-8 col-md-9">
                                                        <div class="mt-2">
                                                            <h5 class="mb m-0-0 h6">{{ $intro->assignment ?? '' }}</h5>
                                                            <p class="mb-0 fs-xs">Download this Assigment</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 col-sm-1 col-md-1">
                                                        <div class="mt-2">
                                                            <a href="{{ asset('course/steps/assignments/' . $intro->assignment) }}"
                                                                class="text-muted text-decoration-none mt-3" target="_blank"
                                                                role="button">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($assignments->isNotEmpty())
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="h5 m-0">Your Submitted Tasks</h5>
                                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                                </div>
                                            </div>
                                        @endif
                                        @foreach ($assignments as $assign)
                                            <div class="card shadow-sm px-3 py-3 mb-3">
                                                <div class="row">
                                                    <div class="col-xs-2 col-sm-2 col-md-1">
                                                        <img src="{{ asset('frontend/img/file.png') }}" style="width: 100%;"
                                                            alt="" class="me-3">
                                                    </div>
                                                    <div class="col-xs-8 col-sm-8 col-md-9">
                                                        <div class="mt-2">
                                                            <h5 class="mb m-0-0 h6">{{ $assign->file ?? '' }}</h5>
                                                            <p class="mb-0 fs-xs">Your Submitted Task (Status : {{ $assign->status ?? '' }})</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 col-sm-1 col-md-1">
                                                        <div class="mt-2">
                                                            <a href="{{ asset('trainee/tasks/' . $assign->file) }}"
                                                                class="text-muted text-decoration-none mt-3" target="_blank"
                                                                role="button">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-1 col-sm-1 col-md-1">
                                                        <div class="mt-2" style="cursor: pointer;">
                                                            <a onclick="$('#task_destroy').submit();"
                                                                class="text-muted text-decoration-none mt-3">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                        <form id="task_destroy"
                                                            action="{{ route('assignments.destroy', $assign->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if (!$assignments->isNotEmpty() && !is_null($intro->assignment))
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h3 class="h3  m-0">Upload Your Task</h3>
                                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-6">
                                                            <div class="card shadow-sm px-3 py-3 mb-4">
                                                                <form enctype="multipart/form-data" id="assignment_form"
                                                                    method="post" action="{{ route('assignments.store') }}">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <input type="hidden" name="type" value="Course">
                                                                    <input type="hidden" name="course_id"
                                                                        value="{{ $course->id ?? '' }}">
                                                                    <input type="hidden" name="step_id"
                                                                        value="{{ $intro->id ?? '' }}">
                                                                    <input type="hidden" name="user_id"
                                                                        value="{{ Auth::user()->id ?? '' }}">
                                                                    <input style="display:none" type="file"
                                                                        name="assignment" id="assignment"
                                                                        accept="application/*" />
                                                                    <div class="text-center" id="upload-file"
                                                                        style="cursor: pointer;">
                                                                        <div class="subheading">Select File</div>
                                                                        <i class="fa fa-upload"></i>
                                                                        <div class="mt-2 subheading"> Upload your Assignment
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card shadow mt-2">
                            <div class="card-body"> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="h5 m-0">Write Comments</h3>
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                        <form method="POST" action="{{ route('comments.store') }}">
                                            @csrf
                                            <input type="hidden" name="type" value="Course">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">
                                            <input type="hidden" name="user_name" value="{{ Auth::user()->full_name ?? '' }}">
                                            <input type="hidden" name="course_id" value="{{ $course->id ?? '' }}">
                                            <input type="hidden" name="step_id" value="{{ $intro->id ?? '' }}">
                                            <div class="mt-2">
                                            <textarea class="form-control" name="text" id="text" style="height: 100px" placeholder="Write Comments"></textarea>
                                                <div class="col-md-4 mt-3 mb-2">
                                                    <button class="btn btn-primary">Add Comment</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-md-12 mt-2 text-center" >
                                        <h3 class="h5  m-0 m-0">All Comments</h3>
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                    </div>
                                    <div class="col-md-12">
                                        <ul class="list-group list-group-flush">
                                            @foreach ($comments as $comment)
                                                <li class="list-group-item px-0 text-body">
                                                    <div class="card shadow-sm px-3 py-3 mb-1"> 
                                                        <div class="align-items-center">
                                                            <div class="row">
                                                                <div class="col-md-1 text-center ps-3 py-1">
                                                                    <div class="avatar-lg shadow p-1 rounded-circle">
                                                                        <img src="{{ asset('frontend/img/team-8.jpg') }}" title="{{ $review->reviewer_name ?? '' }}" alt="" class="rounded-circle">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-10 ps-5 py-1">
                                                                    <div class="">
                                                                        <h6 class="mb-1 fw-500">{{ $comment->user_name ?? '' }}  <span class="text-warning small">({{ $comment->created_at->format('M d, Y') ?? '' }})</span></h6>
                                                                    </div>
                                                                    <p class="m-0">{{ $comment->text ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @foreach ($comment->replies as $reply)
                                                    <li class="list-group-item px-0 text-body ps-5">
                                                        <div class="row">
                                                            <div class="col-md-1 ps-3 py-1">
                                                                <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-vert pull-right"  alt="">
                                                            </div>
                                                            <div class="col-md-11">
                                                                <div class="card shadow-sm px-3 py-3 mb-1"> 
                                                                    <div class="align-items-center">
                                                                        <div class="row">
                                                                            <div class="col-md-1 text-center ps-3 py-1">
                                                                                <div class="avatar-lg shadow p-1 rounded-circle">
                                                                                    <img src="{{ asset('frontend/img/team-8.jpg') }}" title="{{ $reply->user_name ?? '' }}" alt="" class="rounded-circle">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-10 ps-5 py-1">
                                                                                <div class="">
                                                                                    <h6 class="mb-1 fw-500">{{ $reply->user_name ?? '' }}  <span class="text-warning small">({{ $reply->created_at->format('M d, Y') ?? '' }})</span></h6>
                                                                                </div>
                                                                                <p class="m-0">{{ $reply->text ?? '' }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@stop
@section('js')
    <script>
        @if ($errors->has('success'))
            $.toast({
                position: 'bottom-right', 
                heading: 'Note !',
                text: "{{ $errors->first('success') }}",
                icon: 'info',
                loader: true,
                loaderBg: '#9EC600',
                showHideTransition: 'fade', 
                allowToastClose: true, 
                hideAfter: 8000, 
                stack: 5, 
            });
        @endif
        @if ($errors->has('error'))
            $.toast({
                position: 'bottom-right', 
                heading: 'Note !',
                text: "{{ $errors->first('error') }}",
                icon: 'warning',
                loader: true,
                loaderBg: '#9EC600',
                showHideTransition: 'fade', 
                allowToastClose: true, 
                hideAfter: 3000, 
                stack: 5, 
            });
        @endif
        $('#upload-file').click(function(){
            $('#assignment').trigger('click');
        });
        $('#assignment').on('change', function(){
            $(this).closest('form').submit();
        });
    </script>
@stop
