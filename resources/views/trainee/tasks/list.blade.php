@extends('trainee.layout.app')
@section('title')
    <title>Class Tasks | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment pb-2 mb-0" style="width : 100%">Class ({{ $class->title ??  'No Class' }})'s Tasks</h3>
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
                <div class="col-md-8 col-12 text-end"></div>
            </div>
        </div>
        @include('partials.alerts')
        <div class="table-responsive p-2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="align-middle">Task Type</th>
                        <th class="align-middle">Title</th>
                        <th class="align-middle">Course Name</th>
                        <th class="align-middle">Batch Title</th>
                        <th class="align-middle">Class Name</th>
                        <th class="align-middle">Download</th>
                        <th class="align-middle">Uploaded Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    {{-- {!! $librar->withQueryString()->links('pagination::bootstrap-5') !!} --}}
</div>
@stop
@section('js')
@stop
