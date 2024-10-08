@extends('admin.layout.app')
@section('title')
    <title>Create Trainer | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid py-5 px-4">
    <div class="border-bottom"> <h3 class="all-adjustment text-center pb-2 mb-0">Create Trainer</h3></div>
    <form enctype="multipart/form-data" id="" method="post" action="{{ route('trainers.store') }}">
        @csrf
        @method('POST')
        <div class="row mt-4">
            <div class="col-md-8">
                @include('partials.alerts')
                <div class="card rounded-3 border-0 card-shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect1">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control subheading mt-2" placeholder="Name" id="exampleFormControlSelect1" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect2">Last Name </label>
                                    <input type="text" name="last_name" class="form-control subheading mt-2" placeholder="Last Name (optinal)" id="exampleFormControlSelect2"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect3">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control subheading mt-2" placeholder="Email" id="exampleFormControlSelect3" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect4">Phone </label>
                                    <input type="text" name="phone" class="form-control subheading mt-2" placeholder="Phone Number (optinal)" id="exampleFormControlSelect4"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control form-select subheading mt-2" required name="gender" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="date_of_birth" >Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control subheading mt-2" id="date_of_birth" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect1">Trainer Description </label>
                                    <textarea name="description" class="form-control subheading mt-1" id="exampleFormControlTextarea1" placeholder="Trainer Description (optinal)" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card rounded-3 mt-4 border-0 card-shadow">
                    <div class="card-body">
                        <div class="row fw-bold">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="highest_qualification">Highest Qualification <span class="text-danger">*</span></label>
                                    <select name="highest_qualification" id="highest_qualification" class="form-control form-select subheading mt-1" required="">
                                        <option value="bsc">BSc</option>
                                        <option value="msc">MSc</option>
                                        <option value="phd">PhD</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="areas_of_expertise">Areas of Expertise <span class="text-danger">*</span></label>
                                    <select name="areas_of_expertise" id="areas_of_expertise" class="form-control form-select subheading mt-1" required="">
                                        <option value="Web Development">Web Development</option>
                                        <option value="Mobile Development">Mobile Development</option>
                                        <option value="Data Science">Data Science</option>
                                        <option value="Digital Marketing">Digital Marketing</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="years_of_experience">Years of Experience <span class="text-danger">*</span></label>
                                    <input type="number" name="years_of_experience" class="form-control subheading mt-2" placeholder="Years of Experience" id="years_of_experience" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="course_id">Assign Course <span class="text-danger">*</span></label>
                                    <select class="form-control form-select subheading mt-2" name="course_id" id="course_id" required>
                                        @if($courses->isNotEmpty())
                                            @foreach($courses as $course)
                                                <option value="{{ $course->id ?? '' }}">{{ $course->name ?? '' }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-3 card-shadow">
                    <div class="card-header bg-white p-3">
                        <p class="m-0 fw-bold">Profile Picture</p>
                    </div>
                    <div class="card-body">
                        <div class="file-upload">
                            <input class="file-input" name="profile_picture" type="file" accept="images/*" />
                            <img src="{{ asset('assets/img/upload-btn.svg') }}" class="img-fluid" alt=""/>
                            <div class="mt-2 subheading">
                                Drag and Drop to upload or
                            </div>
                            <button class="btn create-btn mt-2">Select Image</button>
                        </div>
                    </div>
                </div>
                <div class="card rounded-3 border-0 mt-3 card-shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group fw-bold">
                                    <label for="curriculum_vitae" cl>Curriculum Vitae <span class="text-danger">*</span></label>
                                    <input type="file" name="curriculum_vitae" class="form-control subheading mt-2" id="curriculum_vitae" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn save-btn text-white mt-3">Create Trainer</button>
                <a href="{{ route('trainers.index') }}" class="btn rounded-3 mt-3 excel-btn"> Back to Listing</a>
            </div>
        </div>
    </form>
</div>
@stop
@section('js')
<script>
    // Calculate the date 15 years ago from today
    function calculateMaxDate() {
        const today = new Date();
        const year = today.getFullYear() - 15;  // Subtract 15 years
        const month = ('0' + (today.getMonth() + 1)).slice(-2);  // Add 1 because months are zero-indexed
        const day = ('0' + today.getDate()).slice(-2);
        return `${year}-${month}-${day}`;
    }

    // Set the max attribute of the date input
    document.getElementById('date_of_birth').max = calculateMaxDate();
</script>
@stop