@extends('admin.layout.app')
@section('title')
    <title>Workshops | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment pb-2 mb-0">Workshops</h3>
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
                        Create Workshop <i class="bi bi-plus-lg text-white"></i>
                    </button>
                </div>
            </div>
        </div>
        @include('partials.alerts')
        <div class="table-responsive p-2">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">Registeration Link</th>
                    <th class="align-middle">Workshop Title</th>
                    <th class="align-middle">Workshop Date</th>
                    <th class="align-middle">Workshop Time</th>
                    <th class="align-middle">Workshop Type</th>
                    <th class="align-middle">Link or Address</th>
                    <th class="align-middle">Created By</th>
                    <th class="align-middle">Created at</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($workshops->isNotEmpty())
                    @foreach($workshops as $workshop)
                        <tr>
                            <td class="align-middle">
                                <input type="hidden" value="{{ $workshop->workshop_link ?? '' }}" id="copyText_{{ $workshop->id ?? '' }}" >
                                <i class="bi bi-file-earmark-text fs-6" style="cursor: copy;" onclick="copyToClipboard({{ $workshop->id ?? '' }})"></i> 
                                <a target="_blank" href="{{ route('workshop.register', $workshop->uuid) }}">Register link</a>
                            </td>
                            <td class="align-middle">
                                {{ $workshop->title ?? '' }}
                            </td>
                            <td class="align-middle">{{ $workshop->workshop_date ?? 'No Limit' }}</td>
                            <td class="align-middle">{{ $workshop->workshop_time ?? 'No Date' }}</td>
                            <td class="align-middle">{{ $workshop->type ?? '' }}</td>
                            <td class="align-middle">
                                @if($workshop->type == 'Online')
                                    <input type="hidden" value="{{ $workshop->workshop_link ?? '' }}" id="copyText_{{ $workshop->id ?? '' }}" >
                                    <i class="bi bi-file-earmark-text fs-6" style="cursor: copy;" onclick="copyToClipboard({{ $workshop->id ?? '' }})"></i> 
                                    <a target="_blank" href="{{ $workshop->workshop_link ?? '' }}">Start Workshop</a>
                                @else
                                    {{ $workshop->address ?? '' }}
                                @endif
                            </td>
                            <td class="align-middle">{{ $workshop->createdby->full_name ?? '' }}</td>
                            <td class="align-middle">{{ $workshop->created_at->format('M d, Y') ?? '' }}</td>
                            <td class="align-middle" >
                                <div>
                                    <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                        {{-- <a class="dropdown-item" href="{{ route('courses.edit', $workshop->id) }}">
                                            <img src="{{ asset('assets/img/edit-2.svg') }}" class="img-fluid me-1" style="    width: 10%;" alt="" />
                                            Edit Course
                                        </a> --}}
                                        {{-- <a class="dropdown-item" href="javascript:;" onclick="$('#coupon_destroy').submit();">
                                            <img src="{{ asset('assets/img/plus-circle.svg') }}" class="img-fluid me-1" style="width: 10%;" alt="" />
                                            Delete workshop
                                        </a> --}}
                                        {{-- <form id="coupon_destroy" action="{{ route('admin.workshops.destroy',$workshop->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="align-middle text-center">
                            No workshop Found
                        </td>
                    </tr>
                @endif
            </tbody>
            </table>
        </div>
    </div>
    {!! $workshops->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
@include('admin.workshops.create')
@stop
@section('js')
<script>
    $('#workshop_type').change(function(){
        if($(this).val() == 'Onsite') {
            $('#address-show').removeClass('d-none');
        }
        else {
            $('#address-show').addClass('d-none');
        }
    });
    function copyToClipboard(id) {
        var copyText = document.getElementById("copyText_"+id);
        copyText.select();
        navigator.clipboard.writeText(copyText.value) .then(() => { }) .catch(err => { });
    }
</script>
@stop
