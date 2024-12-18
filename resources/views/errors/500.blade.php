@extends('errors.layout.app')
@section('title')
    <title> 500 Not Found | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5 text-center">
    <h1>500 - Page Not Found</h1>
    <p>Sorry, the page you are looking for does not exist.</p>
    @if(Auth::user()->type == 'admin')
        <a href="{{ url('admin') }}">Return to Home</a>
    @elseif(Auth::user()->type == 'trainee')
        <a href="{{ url('trainee') }}">Return to Home</a>
    @elseif(Auth::user()->type == 'trainer')
        <a href="{{ url('trainer') }}">Return to Home</a>
    @endif
</div>
@stop
@section('js')
@stop
