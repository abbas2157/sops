@extends('admin.layout.app')
@section('title')
    <title>Reviews | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">Reviews</h3>
        </div>
        <div class="card card-shadow border-0 mt-4 rounded-3 mb-3">
            <div class="card-header bg-white border-0 rounded-3">
                <div class="row my-3">
                    <div class="col-md-4 col-12">
                        <div class="input-search position-relative">
                            <input type="text" id="search" placeholder="Search Table"
                                class="form-control rounded-3 subheading" />
                            <span class="fa fa-search search-icon text-secondary"></span>
                        </div>
                    </div>
                    <div class="col-md-8 col-12 text-end">
                    </div>
                </div>
            </div>
            @include('partials.alerts')
            <div class="table-responsive p-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="align-middle">Step No</th>
                            <th style="width:10%" class="align-middle">Course Name</th>
                            <th class="align-middle">Module</th>
                            <th class="align-middle">Review</th>
                            <th class="align-middle">Rating</th>
                            <th class="align-middle">User Name</th>
                            <th class="align-middle">Status</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($reviews->isNotEmpty())
                            @foreach ($reviews as $review)
                                <tr>

                                    <td class="align-middle">
                                        <span class="badges tier-one-bg text-center rounded-3">{{ $review->module_step->steps_no ?? '' }}</span>
                                    </td>
                                    <td class="align-middle" style="white-space: normal;">{{ $review->module_step->course->name ?? '' }}</td>
                                    <td class="align-middle" style="white-space: normal;">{{ $review->module_step->type ?? '' }}</td>
                                    <td class="align-middle" style="white-space: normal;">{{ $review->review_text ?? '' }}</td>
                                    <td class="align-middle" style="white-space: normal;">
                                        @php 
                                            $star = ['Very Poor','Poor','Good','Very Good','Excellent']; 
                                            $rating = (int) $review->rating - 1;
                                        @endphp
                                        {{ $star[$rating] }}
                                    </td>
                                    <td class="align-middle">{{ $review->reviewer_name ?? '' }}</td>
                                    <td class="align-middle">
                                        @if ($review->show == '1')
                                            <span class="badges green-border text-center">Published</span>
                                        @else
                                            <span class="btn rounded-3 mt-2 excel-btn  text-center">Not Published</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div>
                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                @if ($review->show == '1')
                                                    <a class="dropdown-item" href="{{ route('admin.reviews.show', $review->id) }}?show=0">
                                                        <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 17%;" alt=""/> Hide
                                                    </a>
                                                @else
                                                    <a class="dropdown-item" href="{{ route('admin.reviews.show', $review->id) }}?show=1">
                                                        <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 17%;" alt=""/> Publish 
                                                    </a>
                                                @endif
                                                <a class="dropdown-item" href="javascript:;">
                                                    <img src="{{ asset('assets/img/plus-circle.svg') }}" class="img-fluid me-1" style="width: 17%;" alt="" onclick="$('#comments_destroy').submit();" />
                                                    Delete comment
                                                </a>
                                                <form id="comments_destroy" action="{{ route('admin.reviews.destroy', $review->id) }}" method="post">
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
                                    No Course Found
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
        {!! $reviews->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@stop
@section('js')
@stop
