<!-- Modal STart -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header border-0">
            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 50%">Create Batch</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.batches.store') }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="mb-1">Batch Code <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control subheading" id="exampleFormControlInput1" placeholder="Batch Code" required/>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlInput1" class="mb-1">Batch Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control subheading" id="exampleFormControlInput1" placeholder="Name" required/>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlInput2" class="mb-1">Duration</label>
                    <select class="form-control form-select subheading mt-1" name="duration">
                        <option>One Week</option>
                        <option>Two Weeks</option>
                        <option>Three Weeks</option>
                        <option>Four Weeks</option>
                        <option>One Month</option>
                        <option>Two Month</option>
                        <option>Three Month</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlInput2" class="mb-1">Course Module</label>
                    <select class="form-control form-select subheading mt-1" name="type">
                        <option>Fundamental</option>
                        <option>Full Skill</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlInput2" class="mb-1">Course Module</label>
                    <select class="form-control form-select subheading mt-1" name="course_id">
                        @if($courses->isNotEmpty())
                            @foreach($courses as $course)
                                <option value="{{ $course->id ?? '' }}" {{ (request()->has('id') && $course->id == request()->id)? 'selected' : ''  }}>{{ $course->name ?? '' }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn save-btn text-white mt-4">Create</button>
            </form>
        </div>
        </div>
    </div>
</div>
    <!-- Modal End -->