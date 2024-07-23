@extends('trainee.layout.app')
@section('title')
    <title>Documents Library | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment pb-2 mb-0" style="width: 100%">All Uploaded Documents</h3>
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
                    <a href="" class="btn rounded-3 mt-2 excel-btn"> Back to Course</a>
                    
                </div>
            </div>
        </div>
        @include('partials.alerts')
        <div class="table-responsive p-2">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">Version</th>
                    <th class="align-middle">Title</th>
                    <th class="align-middle">Batch Title</th>
                    <th class="align-middle">Course Name</th>
                    <th class="align-middle">Download</th>
                    <th class="align-middle">Uploaded Date</th>
                </tr>
            </thead>
            <tbody>
                @if($libraries->isNotEmpty())
                    @foreach($libraries as $library)
                        <tr>
                            <td class="align-middle">{{ $library->version ?? '' }}</td>
                            <td class="align-middle">{{ $library->title ?? '' }}</td>
                            <td class="align-middle">{{ $library->batch->title ?? '' }}</td>
                            <td class="align-middle">{{ $library->course->name ?? '' }} </td>
                            <td class="align-middle text-center">
                                <a href="{{ asset('library/document/'.$library->document) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="align-middle">{{ $library->created_at->format('M d, Y') ?? '' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="12" class="align-middle text-center">
                            No Library Found
                        </td>
                    </tr>
                @endif

            </tbody>
            </table>
        </div>
    </div>
    {{-- {!! $librar->withQueryString()->links('pagination::bootstrap-5') !!} --}}
</div>
@include('trainer.library.create')
@stop
@section('js')
@stop
