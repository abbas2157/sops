@extends('admin.layout.app')
@section('title')
    <title>Trainees | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment text-center pb-2 mb-0">All Trainees</h3>
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
                    <a href="{{ route('trainees.create') }}" class="btn save-btn text-white rounded-3 mt-2">Create Trainee <i class="bi bi-plus-lg text-white"></i></a>
                </div>
            </div>
        </div>
        @include('partials.alerts')
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-secondary">Full Name</th>
                        <th class="text-secondary">Gender</th>
                        <th class="text-secondary">Email</th>
                        <th class="text-secondary">Phone No</th>
                        <th class="text-secondary">City Name</th>
                        <th class="text-secondary">Skills of Experience</th>
                        <th class="text-secondary">Created By</th>
                        <th class="text-secondary">Created at</th>
                        <th class="text-secondary">Status</th>
                        <th class="text-secondary">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($trainees->isNotEmpty())
                        @foreach($trainees as $trainee)
                        <tr>
                            <td class="align-middle">{{ $trainee->full_name ?? '' }}</td>
                            <td class="align-middle">{{ $trainee->u_trainee->gender ?? '' }}</td>
                            <td class="align-middle"><a href="mailto:{{ $trainee->email ?? '' }}" class="text-decoration-none">{{ $trainee->email ?? '' }}</a></td>
                            <td class="align-middle"><a href="tel:{{ $trainee->phone ?? '' }}" class="text-decoration-none">{{ $trainee->phone ?? '' }}</a></td>

                            <td class="align-middle">{{ $trainee->u_trainee->city_from ?? '' }}</td>
                            <td class="align-middle">{{ $trainee->u_trainee->skill_experience ?? '' }}</td>
                            <td class="align-middle">{{ $trainee->createdby->full_name ?? '' }}</td>
                            <td class="align-middle">{{ $trainee->created_at->format('M d, Y') ?? '' }}</td>
                            <td class="align-middle">
                                @if(is_null($trainee->email_verified_at))
                                    <span class="badges blue-border text-center">Pending</span>
                                @else
                                    @if($trainee->status == 'active')
                                        <span class="badges green-border text-center">Active</span>
                                    @else
                                        <span class="badges red-border text-center">BLOCKED</span>
                                    @endif
                                @endif
                            </td>
                            <td class="align-middle">
                                <div>
                                    <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('admin.payments',$trainee->uuid) }}">
                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                            Payments
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.tasks',['ststus' => 'Pending','user' => $trainee->id]) }}">
                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                            Pending Tasks
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.reports',$trainee->uuid) }}">
                                            <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                            Reports
                                        </a>
                                        <a class="dropdown-item" href="{{route('trainees.edit',$trainee->id)}}">
                                            <img src="{{ asset('assets/img/edit-2.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                            Edit Trainee
                                        </a>
                                        <form action="{{ route('trainees.destroy', $trainee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">
                                                <img src="{{ asset('assets/img/plus-circle.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
<<<<<<< HEAD
                                                Delete Trainee
=======
                                                Delete Trainee Permanently
>>>>>>> 3acb4d94be3e2ee7da0edcbc85577beee00a3708
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10" class="align-middle text-center">
                            No Trainee Found
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    {!! $trainees->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
@stop
@section('js')
@stop
