@extends('admin.layout.app')
@section('title')
    <title>Financial Support | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment pb-2 mb-0">Financial Support</h3>
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
                            <th class="text-secondary">Phone No</th>
                            <th class="text-secondary">Course Name</th>
                            <th class="text-secondary">Education</th>
                            <th class="text-secondary">Empoyee Status</th>
                            <th class="text-secondary">Annual Income</th>
                            <th class="text-secondary">Can Pay</th>
                            <th class="text-secondary">Applied Date</th>
                            <th class="text-secondary">Status</th>
                            <th class="text-secondary">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($supports->isNotEmpty())
                            @foreach ($supports as $support)
                                <tr>
                                    <td class="align-middle">{{ $support->user->full_name ?? '' }}</td>
                                    <td class="align-middle"><a href="tel:{{ $support->user->phone ?? '' }}"
                                            class="text-decoration-none">{{ $support->user->phone ?? '' }}</a></td>
                                    <td class="align-middle">{{ $support->course->name ?? '' }}</td>
                                    <td class="align-middle">{{ $support->level_of_education ?? '' }}</td>
                                    <td class="align-middle">{{ $support->employee_status ?? '' }}</td>
                                    <td class="align-middle">{{ $support->currency ?? '' }} {{ $support->annual_income ?? '' }}</td>
                                    <td class="align-middle">{{ $support->currency ?? '' }} {{ $support->amount_you_can_pay ?? '' }}</td>
                                    <td class="align-middle">{{ $support->created_at->format('M d, Y') ?? '' }}</td>
                                    <td class="align-middle">
                                        @if ($support->status == 'Pending')
                                            <span class="badges yellow-border text-center">Pending</span>
                                        @elseif ($support->status == 'Accepted')
                                            <span class="badges green-border text-center">Accepted</span>
                                        @else
                                            <span class="badges red-border text-center">Desclined</span>
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
                                                <a class="dropdown-item" href="{{ route('admin.payments',$support->user->uuid) }}">
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                                    Payments
                                                </a>
                                                <a class="dropdown-item" href="{{ route('admin.financial-support.show',$support->id) }}">
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 10%;" alt=""/>
                                                    Make Decision
                                                </a>
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
        {!! $supports->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@stop
@section('js')
@stop
