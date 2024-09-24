@extends('admin.layout.app')
@section('title')
    <title>Coupons | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment pb-2 mb-0">Coupons</h3>
    </div>
    <div class="card card-shadow border-0 mt-4 rounded-3 mb-3">
        <div class="card-header bg-white border-0 rounded-3">
            <div class="row my-3">
                <div class="col-md-4 col-12">
                    <div class="input-search position-relative">
                        <input type="text" id="search" placeholder="Search Table" class="form-control rounded-3 subheading"/>
                        <span class="fa fa-search search-icon text-secondary"></span>
                    </div>
                </div>
                <div class="col-md-8 col-12 text-end">
                    <button class="btn save-btn text-white rounded-3 mt-2" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                        Create Coupon <i class="bi bi-plus-lg text-white"></i>
                    </button>
                </div>
            </div>
        </div>
        @include('partials.alerts')
        <div class="table-responsive p-2">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">Coupon Code</th>
                    <th class="align-middle">Use Limit</th>
                    <th class="align-middle">Last Date</th>
                    <th class="align-middle">Coupon Type</th>
                    <th class="align-middle">Couse Name</th>
                    <th class="align-middle">Created By</th>
                    <th class="align-middle">Created at</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($coupons->isNotEmpty())
                    @foreach($coupons as $coupon)
                        <tr>
                            <td class="align-middle">
                                {{ $coupon->code ?? '' }}
                                <input type="hidden" value="{{ $coupon->code ?? '' }}" id="copyText_{{ $coupon->id ?? '' }}" >
                                <i class="bi bi-file-earmark-text fs-6" onclick="copyToClipboard({{ $coupon->id ?? '' }})"></i>
                            </td>
                            <td class="align-middle">{{ $coupon->limit ?? 'No Limit' }}</td>
                            <td class="align-middle">{{ $coupon->last_date ?? 'No Date' }}</td>
                            <td class="align-middle">{{ $coupon->type ?? '' }}</td>
                            <td class="align-middle">{{ $coupon->course->name ?? '' }}</td>
                            <td class="align-middle">{{ $coupon->createdby->full_name ?? '' }}</td>
                            <td class="align-middle">{{ $coupon->created_at->format('M d, Y') ?? '' }}</td>
                            <td class="align-middle" >
                                <div>
                                    <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                        {{-- <a class="dropdown-item" href="{{ route('courses.edit', $coupon->id) }}">
                                            <img src="{{ asset('assets/img/edit-2.svg') }}" class="img-fluid me-1" style="    width: 17%;" alt="" />
                                            Edit Course
                                        </a> --}}
                                        <a class="dropdown-item" href="javascript:;" onclick="$('#coupon_destroy').submit();">
                                            <img src="{{ asset('assets/img/plus-circle.svg') }}" class="img-fluid me-1" style="width: 17%;" alt="" />
                                            Delete Coupon
                                        </a>
                                        <form id="coupon_destroy" action="{{ route('admin.coupons.destroy',$coupon->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="align-middle text-center">
                            No Coupon Found
                        </td>
                    </tr>
                @endif
            </tbody>
            </table>
        </div>
    </div>
    {!! $coupons->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
@include('admin.coupons.create')
@stop
@section('js')
<script>
    $('#coupon_type').change(function(){
        if($(this).val() == 'Course') {
            $('#course-show').removeClass('d-none');
        }
        else {
            $('#course-show').addClass('d-none');
        }
    });
    function copyToClipboard(id) {
        var copyText = document.getElementById("copyText_"+id);
        copyText.select();
        navigator.clipboard.writeText(copyText.value) .then(() => { }) .catch(err => { });
    }
</script>
@stop
