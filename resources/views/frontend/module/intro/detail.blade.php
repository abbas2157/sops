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
                <div class="col-lg-12 position-relative">
                    <h1 class="text-white pe-6">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</h1>
                    <p class="text-white text-opacity-75 fs-lg">{{ $intro->short_description ?? '' }}.</p>
                    <div class="nav small">
                        <div class="text-white text-opacity-75">Last Update {{ $intro->updated_at->format('M d, Y') ?? '' }}</div>
                        <div class="vr bg-white mx-3 my-1"></div>
                        <div class="text-white text-opacity-75"><i class="fa fa-users"></i> 27 already enrolled</div>
                        <div class="vr bg-white mx-3 my-1"></div>
                        <div class="text-white text-opacity-75"><i class="fa-regular fa-comment"></i> 4/5 (120 Reviews)</div>
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
                <!-- <div class="col-lg-4">
                    <div class="course-detail-sidebar">
                        <div class="card shadow">
                            <div class="p-2">
                                <div class="position-relative"><img class="rounded" src="assets/img/pro-details.jpg" title="" alt=""> <a href="#" class="icon-lg btn btn-light p-0 position-absolute end-0 start-0 bottom-0 m-auto top-0 rounded-circle shadow-lg"><i class="fi-play"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-start pb-2">
                                <h3 class="m-0">$89.99<del class="text-muted fs-lg ps-2">$389.99</del></h3>
                                <span class="px-2 py-2 lh-1 ms-auto bg-primary text-white rounded fs-xs">87% off</span>
                                </div>
                                <p class="m-0 text-danger small"><i class="fi-clock"></i> 4 days left at this price!</p>
                                <div class="d-flex flex-column pt-3"><a class="btn btn-primary" href="#">Buy Now</a> <a class="btn btn-outline-primary mt-2" href="#">Enroll Now</a></div>
                                <ul class="list-group list-group-flush pt-3">
                                <li class="list-group-item d-flex align-items-center px-0">
                                    <i class="bi-clock text-primary me-2"></i>
                                    <h6 class="m-0">Duration</h6>
                                    <span class="fs-sm ms-auto">3 weeks</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center px-0">
                                    <i class="bi-book text-primary me-2"></i>
                                    <h6 class="m-0">Lectures</h6>
                                    <span class="fs-sm ms-auto">23</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center px-0">
                                    <i class="bi-watch text-primary me-2"></i>
                                    <h6 class="m-0">Deadline</h6>
                                    <span class="fs-sm ms-auto">11 Jan 2023</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center px-0">
                                    <i class="bi-sliders text-primary me-2"></i>
                                    <h6 class="m-0">Skill level</h6>
                                    <span class="fs-sm ms-auto">Beginner</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center px-0">
                                    <i class="fi-users text-primary me-2"></i>
                                    <h6 class="m-0">Enrolled</h6>
                                    <span class="fs-sm ms-auto">270 Stud.</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center px-0">
                                    <i class="bi-mic text-primary me-2"></i>
                                    <h6 class="m-0">Language</h6>
                                    <span class="fs-sm ms-auto">English</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center px-0">
                                    <i class="bi-award text-primary me-2"></i>
                                    <h6 class="m-0">Certificate</h6>
                                    <span class="fs-sm ms-auto">Yes</span>
                                </li>
                                </ul>
                                <div class="text-center pt-3"><a class="fw-600" href="#"><i class="bi-share me-3"></i>Share this cousrse</a></div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- End Sidebar --><!-- Tabbar -->
                <div class="col-lg-12">
                    <div class="course-detail-tab bg-white shadow-sm rounded border border-gray-100">
                        <ul class="nav nav-tabs course-nav-tabs" id="course_detail_tab" role="tablist">
                            <li class="nav-item" role="presentation"><button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Overview</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="instructor-tab" data-bs-toggle="tab" data-bs-target="#instructor-tab-pane" type="button" role="tab" aria-controls="instructor-tab-pane" aria-selected="false">Instructor</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Reviews</button></li>
                        </ul>
                        <div class="tab-content" id="course_detail_tabContent">
                            <!-- Tab 1 -->
                            <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                <h5 class="mb-4">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</h5>
                                <iframe style="width:100%" height="445" src="{{ $intro->video ?? '' }}"></iframe>
                                {!! $intro->description ?? '' !!}
                            </div>
                            <!-- Tab 3 -->
                            <div class="tab-pane fade" id="instructor-tab-pane" role="tabpanel" aria-labelledby="instructor-tab" tabindex="0">
                                <h5 class="mb-4">About the instructor</h5>
                                <div class="d-flex align-items-center">
                                <div class="avatar-xxl shadow p-1 rounded-circle"><img src="assets/img/team-8.jpg" title="" alt="" class="rounded-circle"></div>
                                <div class="ps-3">
                                    <h6 class="mb-1">Tatiana Maslany</h6>
                                    <span>Developer & UI Designer</span>
                                </div>
                                </div>
                                <div class="nav small py-4">
                                <div><i class="bi-star-fill text-primary"></i> 4.55 Instructor rating</div>
                                <div class="vr mx-3 my-1"></div>
                                <div><i class="bi-chat-right text-primary"></i> 1,533 reviews</div>
                                <div class="vr mx-3 my-1"></div>
                                <div><i class="fi-users text-primary"></i> 912 students</div>
                                <div class="vr mx-3 my-1"></div>
                                <div><i class="fi-play text-primary"></i> 19 courses</div>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <p>Remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                            <!-- Tab 4 -->
                            <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                                <h5 class="mb-4">Student Feedback</h5>
                                <div class="row gy-4 pb-4">
                                <div class="col-sm-5">
                                    <div class="bg-primary px-3 py-4 d-flex flex-column align-items-center justify-content-center rounded">
                                        <div class="display-4 text-white">4.6</div>
                                        <div class="d-flex text-warning"><i class="mx-1 bi-star-fill"></i> <i class="mx-1 bi-star-fill"></i> <i class="mx-1 bi-star-fill"></i> <i class="mx-1 bi-star-fill"></i> <i class="mx-1 bi-star-half"></i></div>
                                        <span class="text-white text-opacity-75">30 REVIEWS</span>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <ul class="list-unstyled m-0">
                                        <li class="d-flex align-items-center pb-3">
                                            <h6 class="m-0 col-4 col-sm-3 fw-400">Excellent</h6>
                                            <div class="px-1 px-sm-3 col">
                                            <div class="progress w-100" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            </div>
                                            <h6 class="m-0 col-2 text-end fw-400 col-sm-1">80%</h6>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <h6 class="m-0 col-4 col-sm-3 fw-400">Very Good</h6>
                                            <div class="px-1 px-sm-3 col">
                                            <div class="progress w-100" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            </div>
                                            <h6 class="m-0 col-2 text-end fw-400 col-sm-1">60%</h6>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <h6 class="m-0 col-4 col-sm-3 fw-400">Good</h6>
                                            <div class="px-1 px-sm-3 col">
                                            <div class="progress w-100" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            </div>
                                            <h6 class="m-0 col-2 text-end fw-400 col-sm-1">40%</h6>
                                        </li>
                                        <li class="d-flex align-items-center pb-3">
                                            <h6 class="m-0 col-4 col-sm-3 fw-400">Poor</h6>
                                            <div class="px-1 px-sm-3 col">
                                            <div class="progress w-100" style="height: 5px;">
                                                <div class="progress-bar" role="progressbar" style="width: 5%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            </div>
                                            <h6 class="m-0 col-2 text-end fw-400 col-sm-1">5%</h6>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <h6 class="m-0 col-4 col-sm-3 fw-400">Very Poor</h6>
                                            <div class="px-1 px-sm-3 col">
                                            <div class="progress w-100" style="height: 5px;">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            </div>
                                            <h6 class="m-0 col-2 text-end fw-400 col-sm-1">10%</h6>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0 text-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-lg shadow p-1 rounded-circle"><img src="assets/img/team-8.jpg" title="" alt="" class="rounded-circle"></div>
                                        <div class="ps-3">
                                            <h6 class="mb-1 fw-500">Tatiana Maslany</h6>
                                            <div class="d-flex text-warning small"><i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-half"></i></div>
                                        </div>
                                    </div>
                                    <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                </li>
                                <li class="list-group-item px-0 text-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-lg shadow p-1 rounded-circle"><img src="assets/img/team-8.jpg" title="" alt="" class="rounded-circle"></div>
                                        <div class="ps-3">
                                            <h6 class="mb-1 fw-500">Tatiana Maslany</h6>
                                            <div class="d-flex text-warning small"><i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-half"></i></div>
                                        </div>
                                    </div>
                                    <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                </li>
                                <li class="list-group-item px-0 text-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-lg shadow p-1 rounded-circle"><img src="assets/img/team-8.jpg" title="" alt="" class="rounded-circle"></div>
                                        <div class="ps-3">
                                            <h6 class="mb-1 fw-500">Tatiana Maslany</h6>
                                            <div class="d-flex text-warning small"><i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-half"></i></div>
                                        </div>
                                    </div>
                                    <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                </li>
                                <li class="list-group-item px-0 text-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-lg shadow p-1 rounded-circle"><img src="assets/img/team-8.jpg" title="" alt="" class="rounded-circle"></div>
                                        <div class="ps-3">
                                            <h6 class="mb-1 fw-500">Tatiana Maslany</h6>
                                            <div class="d-flex text-warning small"><i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-fill"></i> <i class="me-1 bi-star-half"></i></div>
                                        </div>
                                    </div>
                                    <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                                </li>
                                </ul>
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