@if($my_courses->isNotEmpty())
    @foreach($my_courses as $my)
    <div class="col-md-4 mt-2">
        <div class="card-shadow border rounded align-items-center p-3">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="border-bottom" style="width: 100%;">
                        <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 100%;">{{ $my->course->name ?? '' }}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="row">
                        <div class="col-md-9 p-3">
                            <div class=""><a href="{{ route('course', ['uuid' => $my->course->uuid, 'type' => '1']) }}" class=" text-decoration-none">1. Continue Intro Module</a></div>
                            @if($my->fundamental)
                                <div class="mt-1">
                                    <a href="{{ route('trainee.courses.show', ['uuid' => $my->course->uuid, 'type' => 'fundamental']) }}" class="text-decoration-none">2. Continue Fundamental Module</a>
                                </div>
                            @else
                                <div class="mt-1">2. Continue Fundamental Module <i class="fa-solid fa-lock"></i></div>
                            @endif
                            @if($my->full_skill)
                                <div class="mt-1">
                                    <a href="javascript:;" class=" text-decoration-none">3. Continue Full Skill Module</a>
                                </div>
                            @else
                                <div class="mt-1">3. Continue Full Skill Module <i class="fa-solid fa-lock"></i></div>
                            @endif
                        </div>
                        <div class="col-md-3 p-3">
                            <img src="{{ asset('images/courses/'.$my->course->image) }}" style="width: 100%;" alt="">
                        </div>
                        <div class="col-md-12 text-center p-3">
                            <a href="{{ route('trainee.tasks.show',$my->id) }}" class="btn save-btn text-white mt-2">See Submitted Assignments</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    No Course Found
@endif