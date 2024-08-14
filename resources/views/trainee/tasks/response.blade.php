<!-- Modal STart -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header border-0">
            <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 100%">Upload Task Response</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="" method="post" action="{{ route('trainee.tasks.response') }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <input type="hidden" value="" name="task_id" id="task_id">
                    <label for="exampleFormControlInput1" class="mb-1">Upload Task <span class="text-danger">*</span></label>
                    <input type="file" name="file" class="form-control subheading" required/>
                </div>
                <button type="submit" class="btn save-btn text-white mt-4">Upload</button>
            </form>
        </div>
        </div>
    </div>
</div>

