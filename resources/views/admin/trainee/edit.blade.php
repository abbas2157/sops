@extends('admin.layout.app')
@section('title')
    <title>Update Trainee | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
    <div class="container-fluid py-5 px-4">
        <div class="border-bottom">
            <h3 class="all-adjustment text-center pb-2 mb-0">Update Trainee</h3>
        </div>
        <form enctype="multipart/form-data" id="" method="post" action="{{ route('trainees.update',$trainee->id) }}">
            @csrf
            @method('PUT')
            <div class="row mt-4">
                <div class="col-md-8">
                    @include('partials.alerts')
                    <div class="card rounded-3 border-0 card-shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control subheading mt-2"
                                            placeholder="Name" value="{{$trainee->name}}" id="exampleFormControlSelect1" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect2">Last Name </label>
                                        <input type="text" name="last_name" class="form-control subheading mt-2"
                                            placeholder="Last Name (optinal)" value="{{$trainee->last_name}}" id="exampleFormControlSelect2" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect3">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control subheading mt-2"
                                            placeholder="Email" value="{{$trainee->email}}" id="exampleFormControlSelect3" readonly />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect4">Phone Number</label>
                                        <input type="text" name="phone" class="form-control subheading mt-2"
                                            placeholder="Phone Number (optinal)" value="{{$trainee->phone}}" id="exampleFormControlSelect4" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect5">Gender <span class="text-danger">*</span></label>
                                        <select class="form-control form-select subheading mt-2" aria-label="Default select example" id="exampleFormControlSelect5" name="gender">
                                            <option value="male" {{ $trainee->trainee->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $trainee->trainee->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect6">Date of Birth <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth" class="form-control subheading mt-2" value="{{$trainee->trainee->date_of_birth}}"
                                            id="exampleFormControlSelect6" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect7">Trainee Description</label>
                                        <textarea class="form-control subheading mt-1" id="exampleFormControlTextarea7"
                                            placeholder="Trainee Description (optinal)" rows="5" name="description">{{$trainee->trainee->description}}</textarea>
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
                                        <label for="exampleFormControlSelect1">Which city are you from?</label>
                                        <select class="form-control form-select subheading mt-1"
                                            aria-label="Default select example" id="exampleFormControlSelect1" name="city_from">
                                            <option value="lagos" {{$trainee->trainee->city_from == 'lagos' ? 'selected' : ''}}>Lagos</option>
                                            <option value="abuja" {{$trainee->trainee->city_from == 'abuja' ? 'selected' : ''}}>Abuja</option>
                                            <option value="asaba" {{$trainee->trainee->city_from == 'asaba' ? 'selected' : ''}}>Asaba</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Which city do you currently live in?</label>
                                        <select class="form-control form-select subheading mt-1"
                                            aria-label="Default select example" id="exampleFormControlSelect1" name="city_currently_living_in">
                                            <option value="lagos" {{$trainee->trainee->city_currently_living_in == 'lagos' ? 'selected' : ''}}>Lagos</option>
                                            <option value="abuja" {{$trainee->trainee->city_currently_living_in == 'abuja' ? 'selected' : ''}}>Abuja</option>
                                            <option value="asaba" {{$trainee->trainee->city_currently_living_in == 'asaba' ? 'selected' : ''}}>Asaba</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row fw-bold mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Skill of Interest Experience?</label>
                                        <select class="form-control form-select subheading mt-2"
                                            aria-label="Default select example" id="exampleFormControlSelect1" name="skill_experience">
                                            <option value="none" {{$trainee->trainee->skill_experience == 'none' ? 'selected' : ''}}>None</option>
                                            <option value="basic" {{$trainee->trainee->skill_experience == 'basic' ? 'selected' : ''}}>Basic</option>
                                            <option value="intermediate" {{$trainee->trainee->skill_experience == 'intermediate' ? 'selected' : ''}}>Intermediate</option>
                                            <option value="advance" {{$trainee->trainee->skill_experience == 'advance' ? 'selected' : ''}}>Advance</option>
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
                                <input class="file-input" type="file" multiple name="profile_picture" />
                                <img src="dasheets/img/upload-btn.svg" class="img-fluid" alt="" />
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
                                        <input class="checkbox__input" type="checkbox" id="whatsapp" name="available_on_whatsapp" value="yes" {{$trainee->trainee->available_on_whatsapp == 'yes' ? 'checked' : ''}}/>
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
                                        <input class="checkbox__input" type="checkbox" id="employment" name="employed_status" value="yes" {{$trainee->trainee->employed_status == 'yes' ? 'checked' : ''}}/>
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
                                        <input class="checkbox__input" type="checkbox" id="currently_studying" name="study_status" value="yes" {{$trainee->trainee->study_status == 'yes' ? 'checked' : ''}}/>
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
                                        <input class="checkbox__input" type="checkbox" id="internet_access" name="has_computer_and_internet" value="yes" {{$trainee->trainee->has_computer_and_internet == 'yes' ? 'checked' : ''}}/>
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
                    <button class="btn save-btn text-white mt-3">Update Trainee</button>
                    <a href="{{ route('trainees.index') }}" class="btn rounded-3 mt-3 excel-btn"> Back to Listing</a>
                </div>
            </div>
            
        </form>
    </div>
@stop
@section('js')
    <script></script>
@stop
