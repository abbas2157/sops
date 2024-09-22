@extends('admin.layout.app')
@section('title')
    <title>Payments | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment pb-2 mb-0">All Payments</h3>
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
                            <th class="text-secondary">Course Name</th>
                            <th class="text-secondary">Total Price</th>
                            <th class="text-secondary">Payment Gateway</th>
                            <th class="text-secondary">Payment Receipt</th>
                            <th class="text-secondary">Created Date</th>
                            <th class="text-secondary">Received By</th>
                            <th class="text-secondary">Payment Status</th>
                            <th class="text-secondary">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($payments->isNotEmpty())
                            @foreach ($payments as $payment)
                                <tr>
                                    <td class="align-middle">{{ $user->full_name ?? '' }}</td>
                                    <td class="align-middle">{{ $payment->course->name ?? '' }}</td>
                                    <td class="align-middle">{{ $payment->total_price ?? '' }}</td>
                                    <td class="align-middle">{{ $payment->gateway ?? '' }}</td>
                                    <td class="text-center align-middle">
                                        @if(!is_null($payment->receipt))
                                            <a href="{{ asset('receipts/'.$payment->receipt) }}" class="text-muted text-decoration-none mt-3" target="_blank"  role="button" >
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $payment->created_at->format('M d, Y') ?? '' }}</td>
                                    <td class="align-middle">{{ $payment->received_by->full_name ?? '' }}</td>
                                    <td class="align-middle">
                                        @if ($payment->status == 'Pending')
                                            <span class="badges yellow-border text-center">Pending</span>
                                        @else
                                            <span class="badges green-border text-center">Paid</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <div>
                                            <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-v"></i>
                                            </a>
                                            @if ($payment->status == 'Pending')
                                            <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="javascript:;" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-id="{{ $payment->id ?? '' }}">
                                                    <img src="{{ asset('assets/img/content-right-arrow.svg') }}" class="img-fluid me-1" style="width: 8%;" alt=""/>
                                                    Add Payment
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="align-middle text-center">
                                    No Payment Found
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.payments.create')
@stop
@section('js')
<script>
    $('.dropdown-item').click(function(){
        $('#payment').val($(this).attr('data-id'));
    })
</script>
@stop
