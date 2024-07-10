@extends('trainer.layout.app')
@section('title')
    <title>Batch Students | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid pt-4 px-4 mb-5">
        <div class="border-bottom">
            <h3 class="all-adjustment pb-2 mb-0" style="width:100%">Add Students to Batch ({{ $batch->code ?? '' }})</h3>
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
                        <a href="{{ route('trainer.batches') }}" class="btn create-btn rounded-3 mt-2">Back To Batches<i class="bi bi-funnel"></i></a>
                        <a href="{{ route('trainer.courses') }}" class="btn rounded-3 mt-2 excel-btn"> Back to Courses</a>
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
                            <th class="text-secondary">Course Name</th>
                            <th class="text-secondary">Joined Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($students->isNotEmpty())
                            @foreach ($students as $std)
                                <tr>
                                    <td class="align-middle">{{ $std->student->full_name ?? '' }}</td>
                                    <td class="align-middle"><a href="mailto:{{ $std->student->email ?? '' }}"
                                            class="text-decoration-none">{{ $std->student->email ?? '' }}</a></td>
                                    <td class="align-middle"><a href="tel:{{ $std->student->phone ?? '' }}"
                                            class="text-decoration-none">{{ $std->student->phone ?? '' }}</a></td>
                                    <td class="align-middle">{{ $std->course->name ?? '' }}</td>
                                    <td class="align-middle">{{ $std->created_at->format('M d, Y') ?? '' }}</td>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="12" class="align-middle text-center">
                                    No user Found
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
