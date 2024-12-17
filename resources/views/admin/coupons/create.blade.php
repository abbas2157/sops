<!-- Modal STart -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header border-0">
            <h3 class="all-adjustment pb-2 mb-0" style="width: 50%">Create Coupon</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.coupons.store') }}">
                @csrf
                @method('POST')
                <div class="form-group ">
                    <label class="mb-1">Coupon Type</label>
                    <select class="form-control form-select subheading mt-1" name="type" id="coupon_type">
                        <option>General</option>
                        <option>Course</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlInput1" class="mb-1">Coupon Code <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control subheading" id="exampleFormControlInput1" placeholder="Code" required/>
                </div>
                <div class="form-group mt-2" id="limit-show">
                    <label for="exampleFormControlInput1" class="mb-1">Coupon Use Limit </label>
                    <input type="number" name="limit" class="form-control subheading" id="exampleFormControlInput1" placeholder="Limit (If you want)"/>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlInput1" class="mb-1">Last Date (optional)</label>
                    <input type="date" name="last_date" class="form-control subheading" id="exampleFormControlInput1" placeholder="Last Date (If you want)"/>
                </div>
                <div class="form-group mt-2 d-none" id="course-show">
                    <label class="mb-1">Coupon Name</label>
                    <select class="form-control form-select subheading mt-2" name="course_id" id="course_id">
                        <option disabled selected>Select Course</option>
                        @if($courses->isNotEmpty())
                            @foreach($courses as $course)
                                <option value="{{ $course->id ?? '' }}">{{ $course->name ?? '' }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn save-btn text-white mt-4">Create Coupon</button>
            </form>
        </div>
        </div>
    </div>
</div>
    <!-- Modal End -->