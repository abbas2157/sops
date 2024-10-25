@extends('admin.layout.app')
@section('title')
    <title>Setting | SOPS - School of Professional Skills</title>
@stop
@section('css')
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
                        <button class="tablinks d-flex justify-content-between" id="defaultOpen" onclick="openCity(event, 'Alert-Setting')">
                            Alerts Setting
                        </button>
                        <button class="tablinks d-flex justify-content-between" id="emailOpen" onclick="openCity(event, 'Email-Setting')">
                            Email Setting
                        </button>
                        <button class="tablinks d-flex justify-content-between mt-2" id="passwordOpen" onclick="openCity(event, 'Trainee-Setting')">
                            Trainee Setting
                        </button>
                        <button class="tablinks d-flex justify-content-between mt-2" id="passwordOpen" onclick="openCity(event, 'Trainer-Setting')">
                            Trainer Setting
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @include('partials.alerts')
            <form method="POST" action="{{ route('admin.setting.perform') }}">
                @csrf
                <div id="Alert-Setting" class="tabcontent">
                    <div class="card rounded-3 border-0 card-shadow h-100 p-3">
                        <div class="card-body h-100">
                            <h4 class="all-adjustment border-0 m-0">Update Settings</h4>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1" >Email not Verified Alert Text</label>
                                        <input type="text" name="alerts[not_verified_alert_text]" class="form-control subheading mt-2"  placeholder="Like: Your email is not verified yet" value="{{ $alerts->not_verified_alert_text ?? '' }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Email-Setting" class="tabcontent">
                    <div class="card rounded-3 border-0 card-shadow h-100 p-3">
                        <div class="card-body h-100">
                            <h4 class="all-adjustment border-0 m-0">Update Settings</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1" >Email not Verified Alert Text</label>
                                        <input type="text" name="email_detail" class="form-control subheading mt-2"  placeholder="Like: Your email is not verified yet" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Trainee-Setting" class="tabcontent">
                    <div class="card rounded-3 border-0 card-shadow h-100 p-3 ">
                        <div class="card-body h-100">
                        <h4 class="all-adjustment border-0 m-0">Trainee Setting</h4>
                        <p></p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect1">Trainee verified </label>
                                    <input type="text" class="form-control subheading mt-2" name="trainee_verified" placeholder="MonaLissa@mail.com"
                                    />
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div id="Trainer-Setting" class="tabcontent">
                    <div class="card rounded-3 border-0 card-shadow h-100 p-3 ">
                        <div class="card-body h-100">
                        <h4 class="all-adjustment border-0 m-0">Trainer Setting</h4>
                        <p></p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group fw-bold">
                                    <label for="exampleFormControlSelect1">Trainer Verified </label>
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
                </div>
                <button type="submit" class="btn save-btn text-white mt-3">Update Setting</button>
            </form>
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
