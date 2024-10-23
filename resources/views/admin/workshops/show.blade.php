@extends('admin.layout.app')
@section('title')
    <title>Registerations | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment pb-2 mb-0">All Registerations</h3>
        </div>
        <div class="card border-0 card-shadow rounded-3 p-2 mt-4 mb-3">
            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-3 col-12 mt-2">
                        <div class="input-search position-relative">
                            <input type="text" placeholder="Search Table" class="form-control rounded-3 subheading" />
                            <span class="fa fa-search search-icon text-secondary"></span>
                        </div>
                    </div>
                    <div class="col-md-9 col-12 text-end">
                    </div>
                </div>
            </div>
            @include('partials.alerts')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-secondary">Workshop Title</th>
                            <th class="text-secondary">Full Name</th>
                            <th class="text-secondary">Email</th>
                            <th class="text-secondary">Phone No</th>
                            <th class="text-secondary">Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($registerations->isNotEmpty())
                            @foreach ($registerations as $user)
                                <tr>
                                    <td class="align-middle">{{ $workshop->title ?? '' }}</td>
                                    <td class="align-middle">{{ $user->name ?? '' }}</td>
                                    <td class="align-middle">
                                        <a href="mailto:{{ $user->email ?? '' }}" class="text-decoration-none">{{ $user->email ?? '' }}</a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="tel:{{ $user->phone ?? '' }}" class="text-decoration-none">{{ $user->phone ?? '' }}</a>
                                    </td>
                                    <td class="align-middle">{{ $user->created_at->format('M d, Y') ?? '' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="align-middle text-center">
                                    No Registerations Found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {!! $registerations->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@stop
@section('js')
@stop
