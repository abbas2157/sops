@extends('trainee.layout.app')
@section('title')
    <title>Profile | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
@php
$trainee = Auth::user();
@endphp
<div class="container-fluid px-4">
    <div class="row mb-5">
        <div class="border-bottom my-4">
            <h3 class="all-adjustment text-center pb-2 mb-0">Profile</h3>
        </div>
        <div class="col-md-3 mb-2">
            <div class="card border-0 rounded-3 card-shadow h-100">
            <div class="card-body h-100">
                <div class="tab">
                    <button class="tablinks d-flex justify-content-between" id="defaultOpen"  onclick="openCity(event, 'Personal-Info')">
                        Profile Info
                        <img src="{{ asset('assets/img/profile-info.svg') }}" alt="" />
                    </button>
                    <button class="tablinks d-flex justify-content-between mt-2" id="detailOpen" onclick="openCity(event, 'Edit-Detail')">
                        Add Detail
                        <img src="{{ asset('assets/img/profile-info.svg') }}" alt="" />
                    </button>
                    <button class="tablinks d-flex justify-content-between mt-2" id="passwordOpen" onclick="openCity(event, 'Change-password')">
                        Change Password
                        <img src="{{ asset('assets/img/change-password.svg') }}" alt="" />
                    </button>

                </div>
            </div>
            </div>
        </div>
        <div class="col-md-9">
            <div id="Personal-Info" class="tabcontent">
                @include('partials.alerts')
                <div class="card rounded-3 border-0 card-shadow h-100">
                    <div class="card-body">
                        <div class="row personal-info-row">
                            <div class="col-md-3 col-xxl-2">
                                @if(is_null(Auth::user()->profile_picture))
                                    <img src="{{ asset('assets/img/profile-img.png') }}" class="img-fluid w-100 change-picture-btn profile-img" alt=""/>
                                @else
                                    <img src="{{ asset('profile_pictures/'.Auth::user()->profile_picture) }}" class="img-fluid w-100 change-picture-btn profile-img" style="border-radius: 50%;height: 100px;width: 100px !important;" alt=""/>
                                @endif
                            </div>
                            <div class="col-md-5 py-2">
                                <h4 class="mb-3 all-adjustment w-100 border-0">
                                    {{ Auth::user()->name ?? '' }}
                                </h4>
                                <p class="mb-0">{{ Auth::user()->email ?? '' }}</p>
                                <p class="mb-0">{{ Auth::user()->phone ?? '' }}</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <form enctype="multipart/form-data" id="profile_picture_form" method="post" action="{{ route('trainee.change-profile.picture') }}">
                                @csrf
                                    <input type="file" name="profile_picture" id="profile_picture" accept="images/*" onchange="form.submit()" class="fileInput" style="display: none"  required/>
                                    <button id="change-picture-btn" class="btn save-btn text-white rounded-3" type="button">
                                        Change Profile Picture
                                    </button>
                                </form>
                                <p class="remove-picture text-danger mt-2" style="cursor: pointer" >
                                    Remove Profile Picture
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('trainee.profile.perform') }}">
                    @csrf
                    <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
                        <div class="card-body h-100">
                            <h4 class="all-adjustment border-0 m-0">Personal Info</h4>
                            <p>Provide your personal info</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1" >First Name
                                        <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control subheading mt-2" value="{{ Auth::user()->name ?? '' }}" placeholder="Name" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1" >Last Name</label>
                                        <input type="text" class="form-control subheading mt-2" placeholder="Last Name" name="last_name"  value="{{ Auth::user()->last_name ?? '' }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
                        <div class="card-body h-100">
                        <h4 class="all-adjustment border-0 m-0">Contact Info</h4>
                        <p>Provide your Contact info</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect1">Email <span class="text-danger">*</span></label>
                                    <input type="email" disabled class="form-control subheading mt-2" value="{{ Auth::user()->email ?? '' }}" placeholder="MonaLissa@mail.com"
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <label for="exampleFormControlSelect1">Phone No</label>
                                <input type="text" name="phone" class="form-control subheading mt-2" placeholder="Phone No" value="{{ Auth::user()->phone ?? '' }}"/>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-3">Update Profile</button>
                </form>
            </div>
            <div id="Change-password" class="tabcontent">
                @include('partials.alerts')
                <form method="POST" action="{{ route('trainee.profile.change.password') }}">
                @csrf
                    <div class="card rounded-3 border-0 card-shadow h-100 p-3">
                        <div class="card-body h-100">
                        <h4 class="all-adjustment border-0 m-0 w-100">
                            Change Password
                        </h4>
                        <p>Update your password for enhanced security</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect1" >Current Password</label >
                                    <div class="password-container">
                                        <input type="password" name="current_password" class="form-control subheading" placeholder="********"/>
                                        <img src="{{ asset('assets/img/profile-changed-password.svg') }}" class="password-toggle pe-2" onclick="togglePasswordVisibility(this)" alt="" />
                                        @if ($errors->has('current_password'))
                                            <span class="text-danger text-left">{{ $errors->first('current_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect1" >New Password</label>
                                    <div class="password-container">
                                        <input type="password" name="new_password" class="form-control subheading" placeholder="********"/>
                                        <img src="{{ asset('assets/img/profile-changed-password.svg') }}" class="password-toggle pe-2" onclick="togglePasswordVisibility(this)" alt=""/>
                                        @if ($errors->has('new_password'))
                                            <span class="text-danger text-left">{{ $errors->first('new_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect1">Retype New Password</label>
                                    <div class="password-container">
                                        <input type="password" name="confirm_new_password" class="form-control subheading" placeholder="********" />
                                        <img src="{{ asset('assets/img/profile-changed-password.svg') }}" class="password-toggle pe-2" onclick="togglePasswordVisibility(this)" alt=""/>
                                        @if ($errors->has('confirm_new_password'))
                                            <span class="text-danger text-left">{{ $errors->first('confirm_new_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn save-btn text-white mt-3">Change Password</button>
                </form>
            </div>
            <div id="Edit-Detail" class="tabcontent">
                @include('partials.alerts')
                <form method="POST" action="{{ route('trainee.profile.detail.update',['details' => '']) }}">
                    @csrf
                    <div class="card rounded-3 border-0 card-shadow h-100 p-3">
                        <div class="card-body h-100">
                            <h4 class="all-adjustment border-0 m-0 w-100">
                                Add Detail About Yourself
                            </h4>
                            <p>Update your more details to find you.</p>
                            <div class="row mt-4">
                                <div class="col-md-8">
                                    <div class="card rounded-3 border-0 card-shadow">
                                        <div class="card-body">
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-group fw-bold">
                                                        <label for="exampleFormControlSelect5">Gender <span class="text-danger">*</span></label>
                                                        <select class="form-control form-select subheading mt-2" aria-label="Default select example" id="exampleFormControlSelect5" name="gender">
                                                            <option value="male" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->gender == 'male') ? 'selected' : '' }}>Male</option>
                                                            <option value="female" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->gender == 'female') ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group fw-bold">
                                                        <label for="exampleFormControlSelect6">Date of Birth <span class="text-danger">*</span></label>
                                                        <input type="date" name="date_of_birth" class="form-control subheading mt-2" value="{{ Auth::user()->trainee->date_of_birth ?? '' }}"
                                                            id="exampleFormControlSelect6" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <div class="form-group fw-bold">
                                                        <label for="exampleFormControlSelect7">Trainee Description</label>
                                                        <textarea class="form-control subheading mt-1" id="exampleFormControlTextarea7"
                                                            placeholder="Trainee Description (optinal)" rows="5" name="description">{{Auth::user()->trainee->description ?? ''}}</textarea>
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
                                                        <label for="exampleFormControlSelect1">Which city are you from? <span class="text-danger">*</span></label>
                                                        <select class="form-control form-select subheading mt-1"
                                                            aria-label="Default select example" id="exampleFormControlSelect1" name="city_from">
                                                            <option value="Lahore" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->city_from == 'Lahore') ? 'selected' : '' }}>Lahore</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Which city do you currently live in? <span class="text-danger">*</span></label>
                                                        <select class="form-control form-select subheading mt-1"
                                                            aria-label="Default select example" id="exampleFormControlSelect1" name="city_currently_living_in">
                                                            <option value="Lahore" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->city_currently_living_in == 'Lahore') ? 'selected' : '' }}>Lahore</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row fw-bold mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1"> Skill of Interest Experience? <span class="text-danger">*</span></label>
                                                        <select class="form-control form-select subheading mt-2"aria-label="Default select example" id="exampleFormControlSelect1" name="skill_experience">
                                                            <option value="None" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->skill_experience == 'None') ? 'selected' : '' }}>None</option>
                                                            <option value="Basic" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->skill_experience == 'Basic') ? 'selected' : '' }}>Basic</option>
                                                            <option value="Intermediate" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->skill_experience == 'Intermediate') ? 'selected' : '' }}>Intermediate</option>
                                                            <option value="Advance" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->skill_experience == 'Advance') ? 'selected' : '' }}>Advance</option>
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
                                            <div class="file-upload" style="margin:0px">
                                                <input class="file-input" type="file" multiple name="profile_picture" />
                                                <img src="{{ asset('assets/img/upload-btn.svg') }}" class="img-fluid" alt="" />
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
                                                <div class="col-1">
                                                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                                        <input class="checkbox__input" type="checkbox" id="whatsapp" name="available_on_whatsapp"  value="yes" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->available_on_whatsapp == 'yes') ? 'checked' : ''}}/>
                                                        <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                                            <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                                stroke="rgba(76, 73, 227, 1)" rx="3" />
                                                            <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                                stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                                        </svg>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label for="whatsapp">Available on WhatsApp?</label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-1">
                                                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                                        <input class="checkbox__input" type="checkbox" id="employment" name="employed_status" value="yes" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->employed_status == 'yes') ? 'checked' : ''}}/>
                                                        <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                                            <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                                stroke="rgba(76, 73, 227, 1)" rx="3" />
                                                            <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                                stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                                        </svg>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label for="employment">Are you currently employed?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card rounded-3 border-0 mt-3 card-shadow">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-1">
                                                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                                        <input class="checkbox__input" type="checkbox" id="currently_studying" name="study_status" value="yes" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->study_status == 'yes') ? 'checked' : ''}}/>
                                                        <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                                            <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                                stroke="rgba(76, 73, 227, 1)" rx="3" />
                                                            <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                                stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                                        </svg>
                                                    </label>
                                                    <!-- <input type="checkbox" name="" id=""/> -->
                                                </div>
                                                <div class="col-10">
                                                    <label for="currently_studying">Are you currently studying?</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-1">
                                                    <!-- <input type="checkbox" name="" id="" /> -->
                                                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                                                        <input class="checkbox__input" type="checkbox" id="internet_access" name="has_computer_and_internet" value="yes" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->has_computer_and_internet == 'yes') ? 'checked' : ''}}/>
                                                        <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                                            <rect width="21" height="21" x=".5" y=".5" fill="#FFF"
                                                                stroke="rgba(76, 73, 227, 1)" rx="3" />
                                                            <path class="tick" stroke="rgba(76, 73, 227, 1)" fill="none"
                                                                stroke-linecap="round" stroke-width="3" d="M4 10l5 5 9-9" />
                                                        </svg>
                                                    </label>
                                                </div>
                                                <div class="col-10">
                                                    <label for="internet_access">Do you have access to a computer and the internet?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn save-btn text-white mt-3">Update Detail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

        @if(request()->has('password'))
            document.getElementById("passwordOpen").click();
        @elseif(request()->has('details'))
            document.getElementById("detailOpen").click();
        @else
            document.getElementById("defaultOpen").click();
        @endif
    </script>

    <script>
      function togglePasswordVisibility(toggleBtn) {
        var passwordInput = toggleBtn.previousElementSibling;
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
        } else {
          passwordInput.type = "password";
        }
      }
    </script>
    <script>
        document.getElementById("profile_picture").onchange = function() {
            document.getElementById("profile_picture_form").submit();
        };
        document.getElementById("change-picture-btn").onclick = function() {
            $('#profile_picture').trigger('click');
        };
    </script>
@stop
