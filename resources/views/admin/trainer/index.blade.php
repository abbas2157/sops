@extends('admin.layout.app')
@section('title')
    <title>Trainers | SOPS - School of Professional Skills</title>
@stop
@section('css')
<style>
    .align-middle, .text-secondary
    {
        white-space:nowrap;
    }
</style>
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">All Trainers</h3>
        </div>
        <div class="card border-0 card-shadow rounded-3 p-2 mt-4">
            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-3 col-12 mt-2">
                        <div class="input-search position-relative">
                            <input type="text" placeholder="Search Table" class="form-control rounded-3 subheading" />
                            <span class="fa fa-search search-icon text-secondary"></span>
                        </div>
                    </div>
                    <div class="col-md-9 col-12 text-end">
                        <a href="#" class="btn create-btn rounded-3 mt-2">Filter <i class="bi bi-funnel"></i></a>
                        <a href="#" class="btn rounded-3 mt-2 excel-btn">Excel <i
                                class="bi bi-file-earmark-text"></i></a>
                        <a href="#" class="btn pdf rounded-3 mt-2">Pdf <i class="bi bi-file-earmark"></i></a>
                        <a href="{{ route('trainers.create') }}" class="btn create-btn rounded-3 mt-2">Create Trainer <i
                                class="bi bi-plus-lg"></i></a>
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
                            <th class="text-secondary">Areas of Expertise</th>
                            <th class="text-secondary">Assigned Course</th>
                            <th class="text-secondary">Created By</th>
                            <th class="text-secondary">Created at</th>
                            <th class="text-secondary">Status</th>
                            <th class="text-secondary">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($trainers->isNotEmpty())
                            @foreach ($trainers as $train)
                                <tr>
                                    <td class="align-middle">{{ $train->full_name ?? '' }}</td>
                                    <td class="align-middle">{{ $train->trainer->gender ?? '' }}</td>
                                    <td class="align-middle"><a href="mailto:{{ $train->email ?? '' }}"
                                            class="text-decoration-none">{{ $train->email ?? '' }}</a></td>
                                    <td class="align-middle" style="white-space:nowrap;"><a href="tel:{{ $train->phone ?? '' }}" class="text-decoration-none">{{ $train->phone ?? '' }}</a></td>
                                    <td class="align-middle">{{ $train->trainer->areas_of_expertise ?? '' }}</td>
                                    <td class="align-middle">{{ $train->trainer->course->name ?? '' }}</td>
                                    <td class="align-middle">{{ $train->trainer->createdby->full_name ?? '' }}</td>
                                    <td class="align-middle">{{ $train->created_at->format('M d, Y') ?? '' }}</td>
                                    <td class="align-middle">
                                        @if (is_null($train->email_verified_at))
                                            <span class="btn create-btn rounded-3 text-center">Pending</span>
                                        @else
                                            @if($train->status == 'Active')
                                                <span class="badges green-border text-center">Active</span>
                                            @else
                                                <span class="btn rounded-3 mt-2 excel-btn  text-center">BLOCKED</span>
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
                                                @if ($train->trainer)
                                                    <a class="dropdown-item"
                                                        href="{{ asset('trainer/cv/' . $train->trainer->curriculum_vitae) }}">
                                                        <img src="{{ asset('assets/img/eye.svg') }}" class="img-fluid me-1"
                                                            style="width: 17%;" alt="" />
                                                        View CV
                                                    </a>
                                                @endif
                                                <a class="dropdown-item" href="{{ route('trainers.edit', $train->id) }}">
                                                    <img src="{{ asset('assets/img/edit-2.svg') }}" class="img-fluid me-1"
                                                        style="    width: 17%;" alt="" />
                                                    Edit Trainer
                                                </a>
                                                <form action="{{ route('trainers.destroy', $train->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        <img src="{{ asset('assets/img/plus-circle.svg') }}" class="img-fluid me-1" style="width: 17%;" alt=""/>
                                                        Delete Trainer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="12" class="align-middle text-center">
                                    No Trainer Found
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
@stop
