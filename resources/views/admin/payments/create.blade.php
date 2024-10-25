<!-- Modal STart -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header border-0">
            <h3 class="all-adjustment pb-2 mb-0" style="width: 50%">Add Payments</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.payments.store',$user->uuid) }}">
                @csrf
                @method('POST')
                <input type="hidden" value="" id="payment" name="payment_id">
                <div class="form-group mt-2"> 
                    <label class="mb-1">Select Gateway</label>
                    <select class="form-control form-select subheading mt-1" name="gateway">
                        <option>Jazz Cash</option>
                        <option>Easypaisa</option>
                        <option>Bank</option>
                        <option>By Hand</option>
                        <option>ID CARD</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlSelect1" class="mb-1" >Add Receipt</label>
                    <input type="file" name="receipt" class="form-control subheading" required>
                </div>
                <button type="submit" class="btn save-btn text-white mt-4">Update Payment</button>
            </form>
        </div>
        </div>
    </div>
</div>
    <!-- Modal End -->
