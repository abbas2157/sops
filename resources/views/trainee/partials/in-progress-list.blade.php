@if($my_courses->isNotEmpty())
    <div class="row">
        @foreach($my_courses as $my)
            <div class="col-md-3">
                <div class="course-box border rounded align-items-center" style="position: relative;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="badgecs">PKR {{ $my->course->price ?? '00' }}</div>
                            <img src="{{ asset('assets/img/course-bg.png') }}" class="course-img">
                            <img src="{{ asset('assets/img/logo.png') }}" class="logo-place">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mt-5 ps-3 course-name"> {{ $my->course->name ?? '00' }}</h3>
                            <p class="ps-3">School of Professional Skills</p class="ps-3">
                        </div>
                    </div>
                    <div class="row ps-3">
                        <div class="col-md-12 mb-3">
                            <div class=""><a href="{{ route('course', ['uuid' => $my->course->uuid, 'type' => '1']) }}" class=" text-decoration-none">Continue Intro Module</a></div>
                            @if($my->fundamental)
                                <div class="mt-1">
                                    <a href="{{ route('trainee.courses.show', ['uuid' => $my->course->uuid, 'type' => 'fundamental']) }}" class="text-decoration-none">Continue Fundamental Module</a>
                                </div>
                            @else
                                <div class="mt-1">Continue Fundamental Module <i class="fa-solid fa-lock"></i></div>
                            @endif
                            @if($my->full_skill)
                                <div class="mt-1">
                                    <a href="javascript:;" class=" text-decoration-none">Continue Full Skill Module</a>
                                </div>
                            @else
                                <div class="mt-1">Continue Full Skill Module <i class="fa-solid fa-lock"></i></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    No Course Found
@endif