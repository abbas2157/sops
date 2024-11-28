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
                    </div>
                </div>
            </div>
        </div>
        <section class="bg-gray-100 section pt-0">
            <div class="container">
                <div class="row flex-row-reverse gy-4">
                    <div class="col-lg-12">
                        <div class="course-detail-tab bg-white shadow-sm rounded border border-gray-100">
                            <ul class="nav nav-tabs course-nav-tabs" id="course_detail_tab" role="tablist">
                                <li class="nav-item" role="presentation"><button class="nav-link active" id="overview-tab"
                                        data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button"
                                        role="tab" aria-controls="overview-tab-pane" aria-selected="true">Details</button></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('course',['uuid' => $course->uuid, 'type' => 1]) }}"><i class="fa-solid fa-arrow-left-to-arc text-primary me-2"></i> Go Back</a></li>
                            </ul>
                            <div class="tab-content" id="course_detail_tabContent">
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                    @if(!is_null($intro->video))
                                        <div class="row mt-3 mb-4">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <iframe style="width:100%" height="445" src="{{ $intro->video ?? '' }}"></iframe>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <h2 class="mb-4">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</h2>
                                            {!! $intro->description ?? '' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @include('frontend.steps.partials.assignment')
                    </div>
                    <div class="col-lg-12">
                        @include('frontend.steps.partials.help')
                    </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card shadow mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <h3 class="h5 m-0">Write Comments</h3>
                                        <p>Only feedback regarding assignment will be provided in the comment section below</p>
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
                                    <div class="col-md-12 mt-2" >
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <h3 class="h5  m-0 m-0">All Comments</h3>
                                                <p>Only feedback regarding assignment will be provided in the comment section below</p>
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
