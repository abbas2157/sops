@extends('admin.layout.app')
@section('title')
    <title>All {{ $course->name ?? '' }}'s Students | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid pt-4 px-4 mb-5">
    <div class="border-bottom">
        <h3 class="all-adjustment text-center pb-2 mb-0" style="width: 30%;">All {{ $course->name ?? '' }}'s Students</h3>
    </div>
    <div class="card border-0 card-shadow rounded-3 p-2 mt-4">
    <div class="card-header border-0 bg-white">
        <div class="row my-3">
            <div class="col-md-3 col-12 mt-2">
                <div class="input-search position-relative">
                    <input type="text" placeholder="Search Table" class="form-control rounded-3 subheading"/>
                    <span class="fa fa-search search-icon text-secondary"></span>
                </div>
            </div>
            <div class="col-md-9 col-12 text-end">
                <a href="{{ route('courses.index') }}" class="btn rounded-3 mt-2 excel-btn"> Back To Courses</a>
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
                    <th class="text-secondary">Joined Date</th>
                    {{-- <th class="text-secondary">Course Status</th> --}}
                    <th class="text-secondary">Payment Status</th>
                    <th class="text-secondary">Action</th>
                </tr>
            </thead>
            <tbody>
                @if($students->isNotEmpty())
                    @foreach($students as $student)
                    <tr>
                        <td class="align-middle">{{ $student->user->full_name ?? '' }}</td>
                        <td class="align-middle">{{ $student->trainee->gender ?? '' }}</td>
                        <td class="align-middle"><a href="mailto:{{ $student->user->email ?? '' }}" class="text-decoration-none">{{ $student->user->email ?? '' }}</a></td>
                        <td class="align-middle"><a href="tel:{{ $student->user->phone ?? '' }}" class="text-decoration-none">{{ $student->user->phone ?? '' }}</a></td>
                        <td class="align-middle">{{ $student->trainee->city_from ?? '' }}</td>
                        <td class="align-middle">{{ $student->trainee->skill_experience ?? '' }}</td>
                        <td class="align-middle">{{ $student->created_at->format('M d, Y') ?? '' }}</td>
                        {{-- <td class="align-middle">
                            @if ($student->status == 'Processing')
                                <span class="badges yellow-border text-center ps-1 pe-1">Processing</span>
                            @else
                                <span class="badges green-border text-center ps-1 pe-1">Completed</span>
                            @endif
                        </td> --}}
                        <td class="align-middle">
                            @if(!is_null($student->user->pending_payment) && $student->user->pending_payment->course_id == $course->id) 
                                <span class="badges yellow-border text-center">Pending</span>
                            @elseif(!is_null($student->user->coupon_payment) && $student->user->coupon_payment->course_id == $course->id) 
                                <span class="badges yellow-border text-center">Coupon</span>
                            @else
                                <span class="badges green-border text-center">Paid</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <div>
                                <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu p-2 ps-0" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="">
                                        <i class="fa-solid fa-xmark"></i> Remove Student
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.students.steps',['uuid' => $course->uuid,'id' => $student->user_id]) }}">
                                        <i class="fa-solid fa-eye"></i> Check Status
                                    </a>
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
</div>
@stop
@section('js')
@stop
