@extends('admin.layout.app')
@section('title')
    <title>Setting | SOPS - School of Professional Skills</title>
@stop
@section('css')
    <style>
      /* Style the tab */
      /* Style the buttons inside the tab */
      .tab button {
        /* display: block; */
        background-color: inherit;
        padding: 16px;
        width: 100%;
        border: none;
        /* outline: none; */
        text-align: left;
        cursor: pointer;
        /* transition: 0.3s; */
      }

      .tab button:hover {
        background: rgba(76, 73, 227, 0.1);
        border-left: 4px solid rgba(76, 73, 227, 1);
      }

      .tab button.active {
        background-color: rgba(76, 73, 227, 0.1);
        border-left: 4px solid rgba(76, 73, 227, 1);
      }
    </style>
@stop
@section('content')

<div class="container-fluid px-4">
    <div class="row mb-5">
    <div class="border-bottom my-4">
        <h3 class="all-adjustment text-center pb-2 mb-0">Setting</h3>
    </div>
    <div class="col-md-3 mb-2">
        <div class="card border-0 rounded-3 card-shadow h-100">
        <div class="card-body h-100">
            <div class="tab">
            <button class="tablinks d-flex justify-content-between" id="defaultOpen" onclick="openCity(event, 'Email-Setting')">
                Email Setting
                <img src="{{ asset('assets/img/email.svg') }}" alt="" />
            </button>
            <button class="tablinks d-flex justify-content-between mt-2" id="passwordOpen" onclick="openCity(event, 'Trainee-Setting')">
                Trainee Setting
                <img src="{{ asset('assets/img/change-password.svg') }}" alt="" />
            </button>
            <button class="tablinks d-flex justify-content-between mt-2" id="passwordOpen" onclick="openCity(event, 'Trainer-Setting')">
                Trainer Setting
                <img src="{{ asset('assets/img/change-password.svg') }}" alt="" />
            </button>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-9">
        <div id="Email-Setting" class="tabcontent">
            @include('partials.alerts')

            <form method="POST" action="{{ route('admin.email.setting') }}">
                @csrf
                <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
                    <div class="card-body h-100">
                        <h4 class="all-adjustment border-0 m-0">Update Settings</h4>
                        <p></p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <input type="hidden" name="id" value="{{isset($setting->id) ? $setting->id : ''}}">
                                    <label for="exampleFormControlSelect1" >Email not verified
                                    <span class="text-danger">*</span></label>
                                    <input type="text" name="email_verified" class="form-control subheading mt-2"  placeholder="Email Verified" required/>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect1" >Last Name</label>
                                    <input type="text" class="form-control subheading mt-2" placeholder="Last Name" name="last_name"  value="{{ Auth::user()->last_name ?? '' }}"/>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
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
                </div> --}}
                <button type="submit" class="btn save-btn text-white mt-3">Update Setting</button>
            </form>
        </div>
        <div id="Trainee-Setting" class="tabcontent">
            @include('partials.alerts')

            <form method="POST" action="{{ route('admin.trainee.setting') }}">
                @csrf

                <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
                    <div class="card-body h-100">
                    <h4 class="all-adjustment border-0 m-0">Trainee Setting</h4>
                    <p></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <input type="hidden" name="id" value="{{isset($setting->id) ? $setting->id : ''}}">
                                <label for="exampleFormControlSelect1">trainee verified <span class="text-danger">*</span></label>
                                <input type="text" class="form-control subheading mt-2" name="trainee_verified" placeholder="MonaLissa@mail.com"
                                />
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                        <div class="form-group fw-bold">
                            <label for="exampleFormControlSelect1">Phone No</label>
                            <input type="text" name="phone" class="form-control subheading mt-2" placeholder="Phone No" value="{{ Auth::user()->phone ?? '' }}"/>
                        </div>
                        </div> --}}
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn save-btn text-white mt-3">Update Profile</button>
            </form>
        </div>
        <div id="Trainer-Setting" class="tabcontent">
            @include('partials.alerts')

            <form method="POST" action="{{ route('admin.trainer.setting') }}">
                @csrf

                <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
                    <div class="card-body h-100">
                    <h4 class="all-adjustment border-0 m-0">Trainer Setting</h4>
                    <p></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <input type="hidden" name="id" value="{{isset($setting->id) ? $setting->id : ''}}">
                                <label for="exampleFormControlSelect1">trainer verified <span class="text-danger">*</span></label>
                                <input type="text" class="form-control subheading mt-2" name="trainee_verified" placeholder="MonaLissa@mail.com"
                                />
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                        <div class="form-group fw-bold">
                            <label for="exampleFormControlSelect1">Phone No</label>
                            <input type="text" name="phone" class="form-control subheading mt-2" placeholder="Phone No" value="{{ Auth::user()->phone ?? '' }}"/>
                        </div>
                        </div> --}}
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn save-btn text-white mt-3">Update Setting</button>
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
