@extends('admin.layout.app')
@section('title')
    <title>Users | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment text-center pb-2 mb-0">All Users</h3>
    </div>
    <div class="card border-0 card-shadow rounded-3 p-2 mt-4 mb-3">
        <div class="card-header border-0 bg-white">
            <div class="row my-3">
                <div class="col-md-3 col-12 mt-2">
                    <div class="input-search position-relative">
                        <input type="text" placeholder="Search Table" class="form-control rounded-3 subheading"/>
                        <span class="fa fa-search search-icon text-secondary"></span>
                    </div>
                </div>
                <div class="col-md-9 col-12 text-end">
                    <a href="#" class="btn create-btn rounded-3 mt-2">Filter <i class="bi bi-funnel"></i></a>
                    <a href="#" class="btn rounded-3 mt-2 excel-btn">Excel <i class="bi bi-file-earmark-text"></i></a>
                    <a href="#" class="btn pdf rounded-3 mt-2">Pdf <i class="bi bi-file-earmark"></i></a>
                </div>
            </div>
        </div>
        @include('partials.alerts')
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-secondary">Full Name</th>
                        <th class="text-secondary">Email</th>
                        <th class="text-secondary">Phone No</th>
                        <th class="text-secondary">Created At</th>
                        <th class="text-secondary">Role</th>
                        <th class="text-secondary">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->isNotEmpty())
                        @foreach($users as $user)
                        <tr>
                            <td class="align-middle">{{ $user->full_name ?? '' }}</td>
                            <td class="align-middle"><a href="mailto:{{ $user->email ?? '' }}" class="text-decoration-none">{{ $user->email ?? '' }}</a></td>
                            <td class="align-middle"><a href="tel:{{ $user->phone ?? '' }}" class="text-decoration-none">{{ $user->phone ?? '' }}</a></td>
                                    <td class="align-middle">{{ $user->created_at->format('M d, Y') ?? '' }}</td>

                            <td class="align-middle">
                                @if($user->type == 'admin')
                                    <span class="badges red-border text-center">Admin</span> 
                                @elseif($user->type == 'trainer')
                                    <span class="badges yellow-border text-center">Trainer</span> 
                                @else
                                    <span class="badges blue-border text-center">Trainee</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if(is_null($user->email_verified_at))
                                    <span class="badges yellow-border text-center">Pending</span>
                                @else
                                    @if($user->status == 'active')
                                        <span class="badges green-border text-center">Active</span>
                                    @else
                                        <span class="badges red-border text-center">BLOCKED</span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10" class="align-middle text-center">
                            No user Found
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
@stop
@section('js')
@stop
