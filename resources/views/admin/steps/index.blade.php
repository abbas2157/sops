@extends('admin.layout.app')
@section('title')
    <title>Intro Modules | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
    <h3 class="all-adjustment text-center pb-2 mb-0 cutomer-management">
        {{ $course->name ?? '' }}'s Intro 
    </h3>
    </div>

    <div class="card card-shadow border-0 mt-4 rounded-3 p-2">
    <div class="card-header bg-white border-0 rounded-3">
        <div class="row my-3">
            <div class="col-md-4 col-12">
                <div class="input-search position-relative">
                    <input type="text" id="search" placeholder="Search Table" class="form-control rounded-3 subheading"/>
                    <span class="fa fa-search search-icon text-secondary"></span>
                </div>
            </div>
            <div class="col-md-8 col-12 text-end">
                <a href="{{ route('steps.create',['id' => $course->uuid]) }}" class="btn create-btn rounded-3 mt-2" >Create Step <i class="bi bi-plus-lg"></i></a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="fw-bold">
                <tr>
                    <th>Step No</th>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Created at</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($intros->isNotEmpty())
                    @foreach($intros as $intro)
                        <tr>
                            <td class="align-middle"><span class="badges tier-one-bg text-center rounded-3">{{ $intro->steps_no ?? '' }}</span></td>
                            <td class="align-middle">{{ $intro->title ?? '' }}</td>
                            <td class="align-middle">{{ $intro->createdby->name ?? '' }}</td>
                            <td class="align-middle">{{ $intro->created_at ?? '' }}</td>
                            <td class="align-middle">
                                @if($intro->lock == 1)
                                    <span class="badges green-border text-center">Open</span>
                                @else
                                    <span class="badges red-border text-center">Lock</span>
                                @endif
                            </td>
                            <td class="align-middle">
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="align-middle text-center">
                            No Intro Module Found
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    </div>
</div>
@stop
@section('js')
<script>
</script>
@stop