<!-- Modal STart -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header border-0">
            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 50%">Create Library</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.library.store') }}">
                @csrf
                @method('POST')
                <div class="form-group mt-2">
                    <input type="hidden" value="{{request()->batch}}" name="batch_id">
                    <input type="hidden" value="{{request()->course}}" name="course_id" >
                    <label for="exampleFormControlInput1" class="mb-1">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control subheading" id="exampleFormControlInput1" placeholder="Name" required/>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlSelect1" class="mb-1" >Description</label>
                    <textarea name="description" placeholder="Course Description" class="form-control subheading" rows="3" ></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlSelect1" class="mb-1" >image</label>
                    <input type="file" name="document[]" class="form-control subheading" multiple>
                </div>
                <button type="submit" class="btn save-btn text-white mt-4">Create</button>
            </form>
        </div>
        </div>
    </div>
</div>
    <!-- Modal End -->
