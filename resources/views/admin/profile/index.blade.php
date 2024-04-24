@extends('admin.layout.app')
@section('title')
    <title>Profile | SOPS - School of Professional Skills</title>
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
        <h3 class="all-adjustment text-center pb-2 mb-0">Profile</h3>
    </div>
    <div class="col-md-3 mb-2">
        <div class="card border-0 rounded-3 card-shadow h-100">
        <div class="card-body h-100">
            <div class="tab">
            <button class="tablinks d-flex justify-content-between" id="defaultOpen" onclick="openCity(event, 'Personal-Info')">
                Profile Info
                <img src="{{ asset('assets/img/profile-info.svg') }}" alt="" />
            </button>
            <button
                class="tablinks d-flex justify-content-between mt-2"
                onclick="openCity(event, 'Change-password')"
            >
                Change Password
                <img src="{{ asset('assets/img/change-password.svg') }}" alt="" />
            </button>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-9">
        <div id="Personal-Info" class="tabcontent">
        <div class="card rounded-3 border-0 card-shadow h-100">
            <div class="card-body">
                <div class="row personal-info-row">
                    <div class="col-md-3 col-xxl-2">
                    <img src="{{ asset('assets/img/profile-img.png') }}" class="img-fluid w-100 change-picture-btn profile-img" alt=""/>
                    </div>
                    <div class="col-md-5 py-4">
                    <h4 class="mb-3 all-adjustment w-100 border-0">
                        {{ Auth::user()->name ?? '' }}
                    </h4>
                    <p class="mb-0">{{ Auth::user()->email ?? '' }}</p>
                    </div>
                    <div class="col-md-4 text-end">
                    <!-- <button class="btn create-btn">
                        Change Profile Picture
                    </button>
                    <p class="text-danger mt-2" style="cursor: pointer">
                        Remove Profile Picture
                    </p> -->
                    <input type="file" class="fileInput" style="display: none"  />
                    <button class="change-picture-btn btn create-btn">
                        Change Profile Picture
                    </button>
                    <p class="remove-picture text-danger mt-2" style="cursor: pointer" >
                        Remove Profile Picture
                    </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
            <div class="card-body h-100">
                <h4 class="all-adjustment border-0 m-0">Personal Info</h4>
                <p>Provide your personal info</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group fw-bold">
                            <label for="exampleFormControlSelect1" >First Name
                            <span class="text-danger">*</span></label>
                            <input type="text" class="form-control subheading mt-2" value="{{ Auth::user()->name ?? '' }}" placeholder="Mona" id="exampleFormControlInput1"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group fw-bold">
                            <label for="exampleFormControlSelect1" >Last Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control subheading mt-2" placeholder="coming soon" readonly id="exampleFormControlInput1"/>
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
                        <input type="text" class="form-control subheading mt-2" value="{{ Auth::user()->email ?? '' }}" placeholder="MonaLissa@mail.com" id="exampleFormControlInput1"
                        />
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group fw-bold">
                    <label for="exampleFormControlSelect1">Phone No <span class="text-danger">*</span></label>
                    <input type="text" class="form-control subheading mt-2" placeholder="coming soon" readonly id="exampleFormControlInput1"/>
                </div>
                </div>
            </div>
            </div>
        </div>

        <button class="btn save-btn text-white mt-3">Save</button>
        </div>

        <div id="Change-password" class="tabcontent">
        <div class="card rounded-3 border-0 card-shadow h-100">
            <div class="card-body">
            <div class="row personal-info-row">
                <div class="col-md-3 col-xxl-2">
                <img
                    src="{{ asset('assets/img/profile-img.png') }}"
                    class="img-fluid rounded-circle w-100 change-picture-btn profile-img"
                    style="max-height: 180px; cursor: pointer"
                    alt=""
                />
                </div>
                <div class="col-md-5 py-4">
                <h4 class="mb-3 all-adjustment border-0 w-100">
                    Mona Lissa
                </h4>
                <p class="mb-1">@monalissa</p>
                <p class="mb-1">+1 234 345 3456</p>
                <p class="mb-0">Monalissa@mail.com</p>
                </div>
                <div class="col-md-4 text-end">
                <!-- <button class="btn create-btn">
                    Change Profile Picture
                </button>
                <p class="text-danger mt-2" style="cursor: pointer">
                    Remove Profile Picture
                </p> -->
                <input
                    type="file"
                    class="fileInput"
                    style="display: none"
                />
                <button class="change-picture-btn btn create-btn">
                    Change Profile Picture
                </button>
                <p
                    class="remove-picture text-danger mt-2"
                    style="cursor: pointer"
                >
                    Remove Profile Picture
                </p>
                </div>
            </div>
            </div>
        </div>

        <div class="card rounded-3 border-0 card-shadow h-100 p-3 mt-4">
            <div class="card-body h-100">
            <h4 class="all-adjustment border-0 m-0 w-100">
                Change Password
            </h4>
            <p>Update your password for enhanced security</p>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group fw-bold">
                    <label for="exampleFormControlSelect1"
                    >Current Password</label
                    >
                    <div class="password-container">
                    <input
                        type="password"
                        class="form-control subheading"
                        placeholder="********"
                    />
                    <img
                        src="{{ asset('assets/img/profile-changed-password.svg') }}"
                        class="password-toggle pe-2"
                        onclick="togglePasswordVisibility(this)"
                        alt=""
                    />
                    </div>
                </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                <div class="form-group fw-bold">
                    <label for="exampleFormControlSelect1"
                    >New Password</label
                    >
                    <div class="password-container">
                    <input
                        type="password"
                        class="form-control subheading"
                        placeholder="********"
                    />
                    <img
                        src="{{ asset('assets/img/profile-changed-password.svg') }}"
                        class="password-toggle pe-2"
                        onclick="togglePasswordVisibility(this)"
                        alt=""
                    />
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group fw-bold">
                    <label for="exampleFormControlSelect1"
                    >Retype New Password</label
                    >
                    <div class="password-container">
                    <input
                        type="password"
                        class="form-control subheading"
                        placeholder="********"
                    />
                    <img
                        src="{{ asset('assets/img/profile-changed-password.svg') }}"
                        class="password-toggle pe-2"
                        onclick="togglePasswordVisibility(this)"
                        alt=""
                    />
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <button class="btn save-btn text-white mt-3">Update</button>
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

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
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
      // JavaScript to handle image upload and remove picture for multiple profiles
      var changePictureButtons = document.querySelectorAll(
        ".change-picture-btn"
      );
      var removePictureButtons = document.querySelectorAll(".remove-picture");
      var fileInputs = document.querySelectorAll(".fileInput");
      var profileImages = document.querySelectorAll(".profile-img");

      // Event listener for change picture buttons
      changePictureButtons.forEach(function (button, index) {
        button.addEventListener("click", function () {
          fileInputs[index].click();
        });
      });

      // Event listener for file inputs
      fileInputs.forEach(function (fileInput, index) {
        fileInput.addEventListener("change", function () {
          var file = this.files[0];
          if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
              profileImages[index].src = e.target.result;
            };
            reader.readAsDataURL(file);
          }
        });
      });

      // Event listener for remove picture buttons
      removePictureButtons.forEach(function (removeButton, index) {
        removeButton.addEventListener("click", function () {
          profileImages[index].src = "{{ asset('assets/img/profile-img.png') }}"; // Replace with default image source
        });
      });
    </script>
@stop