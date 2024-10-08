@extends('frontend.layout.app')
@section('title')
    <title>Course | SOPS - School of Professional Skills</title>
@stop
@section('content')

<main>
    <div class="py-3 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 my-2">
                    <h1 class=" h6 text-center text-lg-start text-white">Welcome {{ Auth::user()->full_name ?? '' }},</h1>
                    <h1 class=" h2 text-center text-lg-start text-white">Your Intro to {{ $course->name ?? '' }} Course</h1>
                    <p class="text-white">{!! nl2br($course->description) !!}</p>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-gray-100 py-6">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="mb-4 h2 text-center text-lg-start">Your steps</h1>
                    @if($intros->isNotEmpty())
                        @php $next = 0; $i = 1; @endphp
                        @foreach($intros as $intro)
                            @if($intro->trainee_assignment_count == 1 || $next == 1 || $i == 1)
                                @php
                                    $next = $intro->trainee_assignment_count;
                                    $i++;
                                @endphp
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="card shadow row g-0 flex-sm-row overflow-hidden">
                                            <div class="card-body">
                                                <h6 class="mb-2">
                                                    <a class="text-reset" href="{{ route('course.detail',['uuid'=> $intro->uuid]) }}">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</a>
                                                </h6>
                                                <div class="d-flex lh-sm mb-2">
                                                    <p class="fs-sm mb-2"> {{ $intro->short_description ?? '' }}</p>
                                                </div>
                                                @if($intro->trainee_assignment_count == 1)
                                                    <div class="mb-2">
                                                        <p class="text-success fs-sm mb-2"> Work submitted. We will check your work as soon as we can.</p>
                                                    </div>
                                                @endif
                                                <a href="{{ route('course.detail',['uuid'=> $intro->uuid]) }}" class="btn btn-primary" type="submit">Go to {{ $intro->steps_no ?? '' }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="card shadow row g-0 flex-sm-row overflow-hidden">
                                            <div class="card-body" style="opacity: 0.8;">
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <h6 class="mt-1">
                                                            <a class="text-reset" href="Javascrip:;">{{ $intro->steps_no ?? '' }} : {{ $intro->title ?? '' }}</a>
                                                        </h6>
                                                    </div>
                                                    <div class="col-md-1"><i class="fa-solid fa-lock"></i> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="align-middle text-center">
                                No Steps Found.
                            </td>
                        </tr>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="d-flex align-items-start pb-2">
                                    <h3 class="m-0">Course Details</h3>
                                </div>
                                <hr />
                                @if($complete && $payment && $support == 0)
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-outline-primary mt-1" href="{{ route('financial-support', $course->uuid) }}">Financial Support</a>
                                    </div>
                                @endif
                                <ul class="list-group list-group-flush pt-1">
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-cubes text-primary me-2"></i>
                                        <h6 class="m-0">Total Modules</h6>
                                        <span class="fs-sm ms-auto">{{ $course->lectures ?? '0' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-business-time text-primary me-2"></i>
                                        <h6 class="m-0">Total Duration</h6>
                                        <span class="fs-sm ms-auto">{{ $course->duration ?? '0 Months' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-network-wired text-primary me-2"></i>
                                        <h6 class="m-0">Intro Module</h6>
                                        <span class="fs-sm ms-auto">{{ $course->intro_module ?? '0 Months' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-code-compare text-primary me-2"></i>
                                        <h6 class="m-0">Fundamentals</h6>
                                        <span class="fs-sm ms-auto">{{ $course->fundamentals_module ?? '0 Months' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-code text-primary me-2"></i>
                                        <h6 class="m-0">Full Skill Development</h6>
                                        <span class="fs-sm ms-auto">{{ $course->full_skill_development ?? '0 Months' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-face-meh text-primary me-2"></i>
                                        <h6 class="m-0">Interactive Sessions</h6>
                                        <span class="fs-sm ms-auto">{{ $course->interactive_sessions ?? '0' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-database text-primary me-2"></i>
                                        <h6 class="m-0">Skill level</h6>
                                        <span class="fs-sm ms-auto">{{ $course->skill_level ?? 'No Level' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                    <i class="fa-solid fa-microphone-lines text-primary me-2"></i>
                                        <h6 class="m-0">Language</h6>
                                        <span class="fs-sm ms-auto">{{ $course->language ?? 'No Lang' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <i class="fa-solid fa-award text-primary me-2"></i>
                                        <h6 class="m-0">Certificate</h6>
                                        <span class="fs-sm ms-auto">{{ $course->certificate ?? 'No Found' }}</span>
                                    </li>
                                </ul>
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
        document.getElementById("assignment").onchange = function() {
            document.getElementById("assignment_form").submit();
        };
        document.getElementById("upload-file").onclick = function() {
            $('#assignment').trigger('click');
        };
    </script>
@stop
