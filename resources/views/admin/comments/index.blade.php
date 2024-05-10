@extends('admin.layout.app')
@section('title')
    <title>Comments | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">Comments</h3>
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
                            <th style="width:10%" class="align-middle">Course Name</th>
                            <th class="align-middle">Step Name</th>
                            <th class="align-middle">Comment</th>
                            <th class="align-middle">User Name</th>
                            <th class="align-middle">Status</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($comments->isNotEmpty())
                            @foreach ($comments as $comment)
                                <tr>

                                    <td class="align-middle">{{ $comment->module_step->course->name ?? '' }}</td>
                                    <td class="align-middle" style="white-space: normal;">
                                        {{ $comment->module_step->title ?? '' }}</td>
                                    <td class="align-middle" style="white-space: normal;">{{ $comment->text ?? '' }}</td>

                                    <td class="align-middle">{{ $comment->user_name ?? '' }}</td>
                                    <td class="align-middle">
                                        @if ($comment->show == '1')
                                            <span class="badges green-border text-center">Active</span>
                                        @else
                                            <span class="btn rounded-3 mt-2 excel-btn  text-center">BLOCKED</span>
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

                                                <a class="dropdown-item"
                                                    href="" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                                                    <img src="{{ asset('assets/img/edit-2.svg') }}" class="img-fluid me-1"
                                                        style="    width: 17%;" alt="" />
                                                    Edit comment
                                                </a>
                                                <a class="dropdown-item" href="javascript:;">
                                                    <img src="{{ asset('assets/img/plus-circle.svg') }}"
                                                        class="img-fluid me-1" style="width: 17%;" alt=""
                                                        onclick="$('#comments_destroy').submit();" />
                                                    Delete comment
                                                </a>
                                                <form id="comments_destroy"
                                                    action="{{ route('admin.comments.destroy', $comment->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 50%">Create Course</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                                            </div>
                                            <div class="modal-body">
                                                <form enctype="multipart/form-data" id="" method="post" action="{{ route('admin.comments.update', $comment->id) }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group mt-2">
                                                        <label for="exampleFormControlInput2" class="mb-1">Course Image</label>
                                                        <select class="form-control form-select subheading mt-2" aria-label="Default select example" id="exampleFormControlInput2" name="show">
                                                            <option value="0" {{ $comment->show == '0' ? 'selected' : '' }}>Block</option>
                                                            <option value="1" {{ $comment->show == '1' ? 'selected' : '' }}>Active</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn save-btn text-white mt-4">Create</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="align-middle text-center">
                                    No Course Found
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
        {!! $comments->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@stop
@section('js')
@stop
