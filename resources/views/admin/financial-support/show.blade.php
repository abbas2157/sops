@extends('admin.layout.app')
@section('title')
    <title>Add Remarks | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid py-5 px-4">
        <div class="border-bottom">
            <h3 class="all-adjustment pb-2 mb-0" style="width: 30%;">Add Remarks</h3>
        </div>
        <form enctype="multipart/form-data" id="myform" method="post" action="{{ route('admin.financial-support.update',$supports->id) }}">
            @csrf
            @method('POST')
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Student Name </th>
                                            <th>Student Phone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">{{ $supports->user->full_name ?? '' }}</td>
                                            <td class="align-middle">
                                                <a href="tel:{{ $supports->user->phone ?? '' }}" class="text-decoration-none">{{ $supports->user->phone ?? '' }}</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Course Name </th>
                                            <th>Student Education</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">{{ $supports->course->name ?? '' }}</td>
                                            <td class="align-middle"> {{ $supports->level_of_education ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Annual Income</th>
                                            <th>Can Pay </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">{{ $supports->currency ?? '' }} {{ $supports->annual_income ?? '' }}</td>
                                            <td class="align-middle">{{ $supports->currency ?? '' }} {{ $supports->amount_you_can_pay ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Empoyee Status </th>
                                            <th>Applied Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">{{ $supports->employee_status ?? '' }}</td>
                                            <td class="align-middle">{{ $supports->created_at->format('M d, Y') ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr >
                                            <th colspan="2">Reason applied for aid </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr colspan="2">
                                            <td colspan="2" class="align-middle">{{ $supports->financial_aid ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr >
                                            <th colspan="2">Course Goals </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr >
                                            <td colspan="2" class="align-middle">{{ $supports->your_goals ?? '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label class="mb-1">Amount he can pay.</label>
                                        <input type="text" readonly class="form-control subheading" value="{{ $supports->currency ?? '' }} {{ $supports->amount_you_can_pay ?? '' }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1" class="mb-1">Amount He Must Pay</label>
                                        <input type="number" class="form-control subheading" name="amount_must_pay" placeholder="Amount He Must Pay" value="{{ $supports->amount_must_pay ?? '' }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="decision" id="decision" value="">
                    @if($supports->status == 'Pending')
                        <button type="submit" class="btn save-btn text-white mt-3 accept" >Accept</button>
                        <button type="submit" class="btn save-btn text-white mt-3 decline">Decline</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')
@stop
