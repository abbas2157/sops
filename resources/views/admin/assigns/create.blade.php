<!-- Modal STart -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header border-0">
            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 100%">Trainers With Assign Courses</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.courses.assign.store') }}">
                @csrf
                @method('POST')
                <div class="form-group mt-2">
                    <label class="mb-1">Select Trainer</label>
                    <select class="form-control form-select subheading mt-1" name="trainer_id" required>
                        @if($trainers->isNotEmpty())
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id ?? '' }}" {{ (request()->has('id') && $trainer->id == request()->trainer)? 'selected' : ''  }}>{{ $trainer->name ?? '' }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label class="mb-1">Select Course</label>
                    <select class="form-control form-select subheading mt-1" name="course_id" required>
                        @if($courses->isNotEmpty())
                            @foreach($courses as $course)
                                <option value="{{ $course->id ?? '' }}" {{ (request()->has('id') && $course->id == request()->course)? 'selected' : ''  }}>{{ $course->name ?? '' }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label class="mb-1">Course Module</label>
                    <select class="form-control form-select subheading mt-1" name="type" required>
                        <option>Intro</option>
                        <option>Fundamental</option>
                        <option>Full Skill</option>
                    </select>
                </div>
                <button type="submit" class="btn save-btn text-white mt-4">Assign Course</button>
            </form>
        </div>
        </div>
    </div>
</div>
    <!-- Modal End -->