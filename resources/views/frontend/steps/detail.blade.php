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
                    <div class="nav small">
                        <div class="text-white text-opacity-75">Last Update {{ $intro->updated_at->format('M d, Y') ?? '' }}</div>
                        <div class="vr bg-white mx-3 my-1"></div>
                        <div class="text-white text-opacity-75"><i class="fa fa-users"></i> 0 already enrolled</div>
                        <div class="vr bg-white mx-3 my-1"></div>
                        <div class="text-white text-opacity-75"><i class="fa-regular fa-comment"></i> 0/5 (0 Reviews)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section --><!-- section -->
    <section class="bg-gray-100 section pt-0">
        <div class="container">
            <div class="row flex-row-reverse gy-4">
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="course-detail-sidebar">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="d-flex align-items-start pb-2">
                                    <h3 class="m-0">Rs. 0.0<del class="text-muted fs-lg ps-2">Rs. 0.0</del></h3>
                                    <span class="px-2 py-2 lh-1 ms-auto bg-primary text-white rounded fs-xs">0% off</span>
                                </div>
                                <div class="d-flex flex-column pt-3">
                                    <a class="btn btn-primary" href="#">Buy Now</a> 
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
                </div>
                <!-- End Sidebar --><!-- Tabbar -->
                <div class="col-lg-9">
                    <div class="course-detail-tab bg-white shadow-sm rounded border border-gray-100">
                        <ul class="nav nav-tabs course-nav-tabs" id="course_detail_tab" role="tablist">
                            <li class="nav-item" role="presentation"><button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Overview & Video</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="instructor-tab" data-bs-toggle="tab" data-bs-target="#instructor-tab-pane" type="button" role="tab" aria-controls="instructor-tab-pane" aria-selected="false">Instructors</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Student Reviews</button></li>
                        </ul>
                        <div class="tab-content" id="course_detail_tabContent">
                            <!-- Tab 1 -->
                            <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                <div class="row mt-3 mb-4">
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-md-12"><iframe style="width:100%" height="445" src="{{ $intro->video ?? '' }}"></iframe></div>
                                </div>
                                <h2 class="mb-4">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</h2>
                                {!! $intro->description ?? '' !!}
                            </div>
                            <!-- Tab 3 -->
                            <div class="tab-pane fade" id="instructor-tab-pane" role="tabpanel" aria-labelledby="instructor-tab" tabindex="0">
                                <h5 class="mb-4">About the instructors</h5>
                                @foreach($intro->course->trainer as $trainer)
                                <div class="align-items-center">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="avatar-xxl shadow p-1 rounded-circle">
                                                @if(is_null($trainer->user->profile_picture))
                                                    <img src="{{ asset('frontend/img/team-8.jpg') }}" title="" alt="" class="rounded-circle">
                                                @else
                                                    <img src="{{ asset('profile_pictures/'.$trainer->user->profile_picture) }}" title="" alt="" class="rounded-circle">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <h6 class="mb-1">{{ $trainer->user->name ?? '' }} {{ $trainer->user->last_name ?? '' }}</h6>
                                                        <span>{{ $trainer->areas_of_expertise ?? '' }}, {{ $trainer->years_of_experience ?? '' }} Years</span>
                                                    </div>
                                                    <div class="nav small py-1">
                                                        <div>
                                                            <i class="fa-solid fa-star text-primary"></i> 0 Instructor rating
                                                        </div>
                                                        <div class="vr mx-3 my-1"></div>
                                                        <div>
                                                            <i class="fa-regular fa-comment text-primary"></i> 0 reviews
                                                        </div>
                                                        <div class="vr mx-3 my-1"></div>
                                                        <div>
                                                            <i class="fa fa-users text-primary"></i> 0 students
                                                        </div>
                                                        <div class="vr mx-3 my-1"></div>
                                                        <div>
                                                            <i class="fa fa-file text-primary"></i> 1 courses
                                                        </div>
                                                    </div>
                                                    <p>{{ $trainer->description ?? '' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Tab 4 -->
                            <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                                <h5 class="mb-4">Student Feedback</h5>
                                @php
                                    $count = $reviews->count();
                                @endphp
                                <div class="row gy-4 pb-4">
                                    <div class="col-sm-5">
                                        <div class="bg-primary px-3 py-4 d-flex flex-column align-items-center justify-content-center rounded">
                                            <div class="display-4 text-white">{{ $count ?? 0 }}</div>
                                            <div class="d-flex text-warning">
                                                <i class="mx-1 {{ ($count >= 1) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                                <i class="mx-1 {{ ($count >= 2) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                                <i class="mx-1 {{ ($count >= 3) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                                <i class="mx-1 {{ ($count >= 4) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                                <i class="mx-1 {{ ($count >= 5) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                            </div>
                                            <span class="text-white text-opacity-75">{{ $count ?? 0 }} REVIEWS</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <ul class="list-unstyled m-0">
                                            <li class="d-flex align-items-center pb-3">
                                                <h6 class="m-0 col-4 col-sm-3 fw-400">Excellent</h6>
                                                <div class="px-1 px-sm-3 col">
                                                <div class="progress w-100" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                </div>
                                                <h6 class="m-0 col-2 text-end fw-400 col-sm-1">0%</h6>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <h6 class="m-0 col-4 col-sm-3 fw-400">Very Good</h6>
                                                <div class="px-1 px-sm-3 col">
                                                <div class="progress w-100" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                </div>
                                                <h6 class="m-0 col-2 text-end fw-400 col-sm-1">0%</h6>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <h6 class="m-0 col-4 col-sm-3 fw-400">Good</h6>
                                                <div class="px-1 px-sm-3 col">
                                                <div class="progress w-100" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                </div>
                                                <h6 class="m-0 col-2 text-end fw-400 col-sm-1">0%</h6>
                                            </li>
                                            <li class="d-flex align-items-center pb-3">
                                                <h6 class="m-0 col-4 col-sm-3 fw-400">Poor</h6>
                                                <div class="px-1 px-sm-3 col">
                                                <div class="progress w-100" style="height: 5px;">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                </div>
                                                <h6 class="m-0 col-2 text-end fw-400 col-sm-1">0%</h6>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <h6 class="m-0 col-4 col-sm-3 fw-400">Very Poor</h6>
                                                <div class="px-1 px-sm-3 col">
                                                <div class="progress w-100" style="height: 5px;">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                </div>
                                                <h6 class="m-0 col-2 text-end fw-400 col-sm-1">0%</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach($reviews as $review)
                                    <li class="list-group-item px-0 text-body">
                                        <div class="align-items-center">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="avatar-lg shadow p-1 rounded-circle">
                                                        <img src="{{ asset('frontend/img/team-8.jpg') }}" title="{{ $review->reviewer_name ?? '' }}" alt="" class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="col-md-11">
                                                    <div class="">
                                                        <h6 class="mb-1 fw-500">{{ $review->reviewer_name ?? '' }}</h6>
                                                        <div class="d-flex text-warning small">
                                                            <i class="mx-1 {{ ($review->rating >= 1) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                                            <i class="mx-1 {{ ($review->rating >= 2) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                                            <i class="mx-1 {{ ($review->rating >= 3) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                                            <i class="mx-1 {{ ($review->rating >= 4) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                                            <i class="mx-1 {{ ($review->rating >= 5) ? 'fa-solid' : 'fa-regular'  }} fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p class="m-0">{{ $review->review_text ?? '' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <form method="POST" action="{{ route('reviews.store') }}">
                                    @csrf
                                    <input type="hidden" name="type" value="Course">
                                    <input type="hidden" name="course_id" value="{{ $course->id ?? '' }}">
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <h3 class="h1">Write Review</h3>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label class="form-label">Add Rating</label> 
                                            <select class="form-select" name="rating" required>   
                                                <option value="5">Excellent</option>
                                                <option value="4">Very Good</option>
                                                <option value="3">Good</option>
                                                <option value="2">Poor</option>
                                                <option value="1">Very Poor</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" name="review_text" id="review_text" style="height: 100px" placeholder="Comments"></textarea> 
                                                <label for="review_text">Write Review</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12"><button class="btn btn-primary w-100">Write Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tabbar -->
            </div>
        </div>
    </section>
   
</main>
@stop