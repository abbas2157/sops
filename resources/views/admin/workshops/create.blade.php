<!-- Modal STart -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="all-adjustment pb-2 mb-0" style="width: 50%">Create Workshop</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.workshops.store') }}">
                    @csrf
                    @method('POST')
                    {{-- <input type="hidden" name="google_token" value="{{ Session::get('google_token') ?? '' }}"> --}}
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="mb-1">Workshop Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control subheading" id="exampleFormControlInput1" placeholder="Workshop Title" required />
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleFormControlInput1" class="mb-1">Workshop Date</label>
                        <input type="date" name="workshop_date" class="form-control subheading" min="{{date('Y-m-d')}}" id="exampleFormControlInput1" placeholder="Workshop Date" required />
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleFormControlInput1" class="mb-1">Workshop Time</label>
                        <input type="time" name="workshop_time" class="form-control subheading" id="exampleFormControlInput1" placeholder="Workshop Time" required />
                    </div>
                    <div class="form-group mt-2">
                        <label class="mb-1">Trainer Name</label>
                        <select class="form-control form-select subheading mt-2" name="trainer_id" id="trainer_id" required>
                            <option disabled selected>Select Trainer</option>
                            @if($trainers->isNotEmpty())
                                @foreach($trainers as $trainer)
                                    <option value="{{ $trainer->id ?? '' }}">{{ $trainer->user->full_name ?? '' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label class="mb-1">Workshop Type</label>
                        <select class="form-control form-select subheading mt-1" name="type" id="workshop_type" required>
                            <option>Online</option>
                            <option>Onsite</option>
                        </select>
                    </div>
                    <div class="form-group mt-2 d-none" id="address-show">
                        <label for="exampleFormControlInput11" class="mb-1">Workshop Onsite Address</label>
                        <input type="text" name="address" class="form-control subheading" id="exampleFormControlInput11" placeholder="Workshop Onsite Address"/>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-4">Create Workshop</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Modal End -->