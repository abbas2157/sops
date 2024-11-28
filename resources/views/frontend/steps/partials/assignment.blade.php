<div class="card shadow mt-2">
    <div class="card-body">
        <div class="row mt-3">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                @if(!is_null($intro->assignment))
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="h5">Your Assignment for this Class</h5>
                            {{-- <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p> --}}
                        </div>
                    </div>
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
                            <h5 class="h5 ">Your Submitted Tasks</h5>
                            {{-- <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p> --}}
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
                @if ($assign->status == 'Fail')
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="h3">Upload Your Task</h3>
                            {{-- <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p> --}}
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
                                            <input type="hidden" name="course_id" value="{{ $course->id ?? '' }}">
                                            <input type="hidden" name="step_id" value="{{ $intro->id ?? '' }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">
                                            <input style="display:none" type="file" name="assignment" id="assignment" accept="application/*" />
                                            <div class="text-center" id="upload-file"
                                                style="cursor: pointer;">
                                                <div class="subheading">Select File</div>
                                                <i class="fa fa-upload"></i>
                                                <div class="mt-2 subheading"> Upload your Assignment </div>
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