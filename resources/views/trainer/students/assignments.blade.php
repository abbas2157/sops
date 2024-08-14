@extends('trainer.layout.app')
@section('title')
    <title>Assignments | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">All Assignments</h3>
        </div>
        @include('trainer.partials.dashboard.assignments')
    </div>
@stop
@section('js')
@stop
