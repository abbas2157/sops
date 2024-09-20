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
                            <th class="text-secondary">Full Name</th>
                            <th class="text-secondary">Email</th>
                            <th class="text-secondary">Phone No</th>
                            <th class="text-secondary">Created At</th>
                            <th class="text-secondary">Role</th>
                            <th class="text-secondary">Status</th>
                            <th class="text-secondary">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                                <tr>
                                    <td class="align-middle">{{ $user->full_name ?? '' }}</td>
                                    <td class="align-middle"><a href="mailto:{{ $user->email ?? '' }}"
                                            class="text-decoration-none">{{ $user->email ?? '' }}</a></td>
                                    <td class="align-middle"><a href="tel:{{ $user->phone ?? '' }}"
                                            class="text-decoration-none">{{ $user->phone ?? '' }}</a></td>
                                    <td class="align-middle">{{ $user->created_at->format('M d, Y') ?? '' }}</td>

                                    <td class="align-middle">
                                        @if ($user->type == 'admin')
                                            <span class="badges red-border text-center">Admin</span>
                                        @elseif($user->type == 'trainer')
                                            <span class="badges yellow-border text-center">Trainer</span>
                                        @else
                                            <span class="badges blue-border text-center">Trainee</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if (is_null($user->email_verified_at))
                                            <span class="badges yellow-border text-center">Pending</span>
                                        @else
                                            @if ($user->status == 'active')
                                                <span class="badges green-border text-center">Active</span>
                                            @else
                                                <span class="badges red-border text-center">BLOCKED</span>
                                            @endif
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
                                                <a class="dropdown-item"href="javascript:;" onclick="document.getElementById('forgot_password').submit();">
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 8%;" alt=""/>
                                                        Send Reset Password Mail
                                                </a>
                                                <form id="forgot_password" action="{{ route('admin.forgot-password.email') }}" method="post" style="display:none;">
                                                    @csrf
                                                    @method('POST') <!-- Use PATCH or PUT for updates -->
                                                    <input type="hidden" name="email" value="{{ $user->email}}">
                                                </form>
                                                <a class="dropdown-item" href="javascript:;" onclick="document.getElementById('courses_destroy_{{ $user->id }}').submit();">
                                                    <img src="{{ asset('assets/img/edit-2.svg') }}" class="img-fluid me-1" style="width: 8%;" alt="" />
                                                    @if ($user->status == 'active')
                                                        BLOCK
                                                    @else
                                                        Active
                                                    @endif
                                                </a>
                                                <form id="courses_destroy_{{ $user->id ?? ''}}" action="{{ route('users.update', $user->id) }}" method="post" style="display:none;">
                                                    @csrf
                                                    @method('PATCH') <!-- Use PATCH or PUT for updates -->
                                                    <input type="hidden" name="status" value="{{ $user->status == 'active' ? 'block' : 'active' }}">
                                                </form>

                                            </div>
                                        </div>
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
