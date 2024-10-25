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
                                        <input type="text" name="name" class="form-control subheading mt-2" value="{{ Auth::user()->name ?? '' }}" required placeholder="Name" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fw-bold">
                                        <label for="exampleFormControlSelect1" >Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control subheading mt-2" placeholder="Last Name" name="last_name" required value="{{ Auth::user()->last_name ?? '' }}"/>
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
                                    <input type="email" disabled class="form-control subheading mt-2" value="{{ Auth::user()->email ?? '' }}" required placeholder="MonaLissa@mail.com" 
                                    />
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <label for="exampleFormControlSelect1">Phone No <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control subheading mt-2" placeholder="Phone No" required value="{{ Auth::user()->phone ?? '' }}"/>
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
                                                        <select class="form-control form-select subheading mt-2" aria-label="Default select example" id="exampleFormControlSelect5" name="gender" required>
                                                            <option value="male" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->gender == 'male') ? 'selected' : '' }}>Male</option>
                                                            <option value="female" {{ (!is_null(Auth::user()->trainee) && Auth::user()->trainee->gender == 'female') ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group fw-bold">
                                                        <label for="exampleFormControlSelect6">Date of Birth <span class="text-danger">*</span></label>
                                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control subheading mt-2" required value="{{ Auth::user()->trainee->date_of_birth ?? '' }}"
                                                            id="exampleFormControlSelect6" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <div class="form-group fw-bold">
                                                        <label for="exampleFormControlSelect7">Trainee Description <span class="text-danger">*</span></label>
                                                        <textarea class="form-control subheading mt-1" id="exampleFormControlTextarea7"
                                                            placeholder="Trainee Description (optinal)" rows="5"  required name="description">{{Auth::user()->trainee->description ?? ''}}</textarea>
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
                                                            <option value="{{ $trainee->trainee->city_from ?? ''}}">{{ Auth::user()->trainee->city_from ?? ''}}</option>
                                                            <option value="" disabled>Punjab Cities</option>
                                                            <option value="Lahore">Lahore</option>
                                                            <option value="Islamabad">Islamabad</option>
                                                            <option value="Karachi">Karachi</option>
                                                            <option value="Multan">Multan</option>
                                                            <option value="Faisalabad">Faisalabad</option>
                                                            <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                                            <option value="Ahmadpur East">Ahmadpur East</option>
                                                            <option value="Ali Khan Abad">Ali Khan Abad</option>
                                                            <option value="Alipur">Alipur</option>
                                                            <option value="Arifwala">Arifwala</option>
                                                            <option value="Attock">Attock</option>
                                                            <option value="Bhera">Bhera</option>
                                                            <option value="Bhalwal">Bhalwal</option>
                                                            <option value="Bahawalnagar">Bahawalnagar</option>
                                                            <option value="Bahawalpur">Bahawalpur</option>
                                                            <option value="Bhakkar">Bhakkar</option>
                                                            <option value="Burewala">Burewala</option>
                                                            <option value="Chillianwala">Chillianwala</option>
                                                            <option value="Chakwal">Chakwal</option>
                                                            <option value="Chichawatni">Chichawatni</option>
                                                            <option value="Chiniot">Chiniot</option>
                                                            <option value="Chishtian">Chishtian</option>
                                                            <option value="Daska">Daska</option>
                                                            <option value="Darya Khan">Darya Khan</option>
                                                            <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                                            <option value="Dhaular">Dhaular</option>
                                                            <option value="Dina">Dina</option>
                                                            <option value="Dinga">Dinga</option>
                                                            <option value="Dipalpur">Dipalpur</option>
                                                            <option value="Ferozewala">Ferozewala</option>
                                                            <option value="Fateh Jhang">Fateh Jang</option>
                                                            <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                                                            <option value="Gojra">Gojra</option>
                                                            <option value="Gujranwala">Gujranwala</option>
                                                            <option value="Gujrat">Gujrat</option>
                                                            <option value="Gujar Khan">Gujar Khan</option>
                                                            <option value="Hafizabad">Hafizabad</option>
                                                            <option value="Haroonabad">Haroonabad</option>
                                                            <option value="Hasilpur">Hasilpur</option>
                                                            <option value="Haveli Lakha">Haveli Lakha</option>
                                                            <option value="Jatoi">Jatoi</option>
                                                            <option value="Jalalpur">Jalalpur</option>
                                                            <option value="Jattan">Jattan</option>
                                                            <option value="Jampur">Jampur</option>
                                                            <option value="Jaranwala">Jaranwala</option>
                                                            <option value="Jhang">Jhang</option>
                                                            <option value="Jhelum">Jhelum</option>
                                                            <option value="Kalabagh">Kalabagh</option>
                                                            <option value="Karor Lal Esan">Karor Lal Esan</option>
                                                            <option value="Kasur">Kasur</option>
                                                            <option value="Kamalia">Kamalia</option>
                                                            <option value="Kamoke">Kamoke</option>
                                                            <option value="Khanewal">Khanewal</option>
                                                            <option value="Khanpur">Khanpur</option>
                                                            <option value="Kharian">Kharian</option>
                                                            <option value="Khushab">Khushab</option>
                                                            <option value="Kot Addu">Kot Addu</option>
                                                            <option value="Jauharabad">Jauharabad</option>
                                                            <option value="Lalamusa">Lalamusa</option>
                                                            <option value="Layyah">Layyah</option>
                                                            <option value="Liaquat Pur">Liaquat Pur</option>
                                                            <option value="Lodhran">Lodhran</option>
                                                            <option value="Malakwal">Malakwal</option>
                                                            <option value="Mamoori">Mamoori</option>
                                                            <option value="Mailsi">Mailsi</option>
                                                            <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                                            <option value="Mian Channu">Mian Channu</option>
                                                            <option value="Mianwali">Mianwali</option>
                                                            <option value="Murree">Murree</option>
                                                            <option value="Muridke">Muridke</option>
                                                            <option value="Mianwali Bangla">Mianwali Bangla</option>
                                                            <option value="Muzaffargarh">Muzaffargarh</option>
                                                            <option value="Narowal">Narowal</option>
                                                            <option value="Nankana Sahib">Nankana Sahib</option>
                                                            <option value="Okara">Okara</option>
                                                            <option value="Renala Khurd">Renala Khurd</option>
                                                            <option value="Pakpattan">Pakpattan</option>
                                                            <option value="Pattoki">Pattoki</option>
                                                            <option value="Pir Mahal">Pir Mahal</option>
                                                            <option value="Qaimpur">Qaimpur</option>
                                                            <option value="Qila Didar Singh">Qila Didar Singh</option>
                                                            <option value="Rabwah">Rabwah</option>
                                                            <option value="Raiwind">Raiwind</option>
                                                            <option value="Rajanpur">Rajanpur</option>
                                                            <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                                            <option value="Rawalpindi">Rawalpindi</option>
                                                            <option value="Sadiqabad">Sadiqabad</option>
                                                            <option value="Safdarabad">Safdarabad</option>
                                                            <option value="Sahiwal">Sahiwal</option>
                                                            <option value="Sangla Hill">Sangla Hill</option>
                                                            <option value="Sarai Alamgir">Sarai Alamgir</option>
                                                            <option value="Sargodha">Sargodha</option>
                                                            <option value="Shakargarh">Shakargarh</option>
                                                            <option value="Sheikhupura">Sheikhupura</option>
                                                            <option value="Sialkot">Sialkot</option>
                                                            <option value="Sohawa">Sohawa</option>
                                                            <option value="Soianwala">Soianwala</option>
                                                            <option value="Siranwali">Siranwali</option>
                                                            <option value="Talagang">Talagang</option>
                                                            <option value="Taxila">Taxila</option>
                                                            <option value="Toba Tek Singh">Toba Tek Singh</option>
                                                            <option value="Vehari">Vehari</option>
                                                            <option value="Wah Cantonment">Wah Cantonment</option>
                                                            <option value="Wazirabad">Wazirabad</option>
                                                            <option value="" disabled>Sindh Cities</option>
                                                            <option value="Badin">Badin</option>
                                                            <option value="Bhirkan">Bhirkan</option>
                                                            <option value="Rajo Khanani">Rajo Khanani</option>
                                                            <option value="Chak">Chak</option>
                                                            <option value="Dadu">Dadu</option>
                                                            <option value="Digri">Digri</option>
                                                            <option value="Diplo">Diplo</option>
                                                            <option value="Dokri">Dokri</option>
                                                            <option value="Ghotki">Ghotki</option>
                                                            <option value="Haala">Haala</option>
                                                            <option value="Hyderabad">Hyderabad</option>
                                                            <option value="Islamkot">Islamkot</option>
                                                            <option value="Jacobabad">Jacobabad</option>
                                                            <option value="Jamshoro">Jamshoro</option>
                                                            <option value="Jungshahi">Jungshahi</option>
                                                            <option value="Kandhkot">Kandhkot</option>
                                                            <option value="Kandiaro">Kandiaro</option>
                                                            <option value="Kashmore">Kashmore</option>
                                                            <option value="Keti Bandar">Keti Bandar</option>
                                                            <option value="Khairpur">Khairpur</option>
                                                            <option value="Kotri">Kotri</option>
                                                            <option value="Larkana">Larkana</option>
                                                            <option value="Matiari">Matiari</option>
                                                            <option value="Mehar">Mehar</option>
                                                            <option value="Mirpur Khas">Mirpur Khas</option>
                                                            <option value="Mithani">Mithani</option>
                                                            <option value="Mithi">Mithi</option>
                                                            <option value="Mehrabpur">Mehrabpur</option>
                                                            <option value="Moro">Moro</option>
                                                            <option value="Nagarparkar">Nagarparkar</option>
                                                            <option value="Naudero">Naudero</option>
                                                            <option value="Naushahro Feroze">Naushahro Feroze</option>
                                                            <option value="Naushara">Naushara</option>
                                                            <option value="Nawabshah">Nawabshah</option>
                                                            <option value="Nazimabad">Nazimabad</option>
                                                            <option value="Qambar">Qambar</option>
                                                            <option value="Qasimabad">Qasimabad</option>
                                                            <option value="Ranipur">Ranipur</option>
                                                            <option value="Ratodero">Ratodero</option>
                                                            <option value="Rohri">Rohri</option>
                                                            <option value="Sakrand">Sakrand</option>
                                                            <option value="Sanghar">Sanghar</option>
                                                            <option value="Shahbandar">Shahbandar</option>
                                                            <option value="Shahdadkot">Shahdadkot</option>
                                                            <option value="Shahdadpur">Shahdadpur</option>
                                                            <option value="Shahpur Chakar">Shahpur Chakar</option>
                                                            <option value="Shikarpaur">Shikarpaur</option>
                                                            <option value="Sukkur">Sukkur</option>
                                                            <option value="Tangwani">Tangwani</option>
                                                            <option value="Tando Adam Khan">Tando Adam Khan</option>
                                                            <option value="Tando Allahyar">Tando Allahyar</option>
                                                            <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                                                            <option value="Thatta">Thatta</option>
                                                            <option value="Umerkot">Umerkot</option>
                                                            <option value="Warah">Warah</option>
                                                            <option value="" disabled>Khyber Cities</option>
                                                            <option value="Abbottabad">Abbottabad</option>
                                                            <option value="Adezai">Adezai</option>
                                                            <option value="Alpuri">Alpuri</option>
                                                            <option value="Akora Khattak">Akora Khattak</option>
                                                            <option value="Ayubia">Ayubia</option>
                                                            <option value="Banda Daud Shah">Banda Daud Shah</option>
                                                            <option value="Bannu">Bannu</option>
                                                            <option value="Batkhela">Batkhela</option>
                                                            <option value="Battagram">Battagram</option>
                                                            <option value="Birote">Birote</option>
                                                            <option value="Chakdara">Chakdara</option>
                                                            <option value="Charsadda">Charsadda</option>
                                                            <option value="Chitral">Chitral</option>
                                                            <option value="Daggar">Daggar</option>
                                                            <option value="Dargai">Dargai</option>
                                                            <option value="Darya Khan">Darya Khan</option>
                                                            <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                                            <option value="Doaba">Doaba</option>
                                                            <option value="Dir">Dir</option>
                                                            <option value="Drosh">Drosh</option>
                                                            <option value="Hangu">Hangu</option>
                                                            <option value="Haripur">Haripur</option>
                                                            <option value="Karak">Karak</option>
                                                            <option value="Kohat">Kohat</option>
                                                            <option value="Kulachi">Kulachi</option>
                                                            <option value="Lakki Marwat">Lakki Marwat</option>
                                                            <option value="Latamber">Latamber</option>
                                                            <option value="Madyan">Madyan</option>
                                                            <option value="Mansehra">Mansehra</option>
                                                            <option value="Mardan">Mardan</option>
                                                            <option value="Mastuj">Mastuj</option>
                                                            <option value="Mingora">Mingora</option>
                                                            <option value="Nowshera">Nowshera</option>
                                                            <option value="Paharpur">Paharpur</option>
                                                            <option value="Pabbi">Pabbi</option>
                                                            <option value="Peshawar">Peshawar</option>
                                                            <option value="Saidu Sharif">Saidu Sharif</option>
                                                            <option value="Shorkot">Shorkot</option>
                                                            <option value="Shewa Adda">Shewa Adda</option>
                                                            <option value="Swabi">Swabi</option>
                                                            <option value="Swat">Swat</option>
                                                            <option value="Tangi">Tangi</option>
                                                            <option value="Tank">Tank</option>
                                                            <option value="Thall">Thall</option>
                                                            <option value="Timergara">Timergara</option>
                                                            <option value="Tordher">Tordher</option>
                                                            <option value="" disabled>Balochistan Cities</option>
                                                            <option value="Awaran">Awaran</option>
                                                            <option value="Barkhan">Barkhan</option>
                                                            <option value="Chagai">Chagai</option>
                                                            <option value="Dera Bugti">Dera Bugti</option>
                                                            <option value="Gwadar">Gwadar</option>
                                                            <option value="Harnai">Harnai</option>
                                                            <option value="Jafarabad">Jafarabad</option>
                                                            <option value="Jhal Magsi">Jhal Magsi</option>
                                                            <option value="Kacchi">Kacchi</option>
                                                            <option value="Kalat">Kalat</option>
                                                            <option value="Kech">Kech</option>
                                                            <option value="Kharan">Kharan</option>
                                                            <option value="Khuzdar">Khuzdar</option>
                                                            <option value="Killa Abdullah">Killa Abdullah</option>
                                                            <option value="Killa Saifullah">Killa Saifullah</option>
                                                            <option value="Kohlu">Kohlu</option>
                                                            <option value="Lasbela">Lasbela</option>
                                                            <option value="Lehri">Lehri</option>
                                                            <option value="Loralai">Loralai</option>
                                                            <option value="Mastung">Mastung</option>
                                                            <option value="Musakhel">Musakhel</option>
                                                            <option value="Nasirabad">Nasirabad</option>
                                                            <option value="Nushki">Nushki</option>
                                                            <option value="Panjgur">Panjgur</option>
                                                            <option value="Pishin Valley">Pishin Valley</option>
                                                            <option value="Quetta">Quetta</option>
                                                            <option value="Sherani">Sherani</option>
                                                            <option value="Sibi">Sibi</option>
                                                            <option value="Sohbatpur">Sohbatpur</option>
                                                            <option value="Washuk">Washuk</option>
                                                            <option value="Zhob">Zhob</option>
                                                            <option value="Ziarat">Ziarat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Which city do you currently live in? <span class="text-danger">*</span></label>
                                                        <select class="form-control form-select subheading mt-1"
                                                            aria-label="Default select example" id="exampleFormControlSelect1" name="city_from">
                                                            <option value="{{ $trainee->trainee->city_from ?? ''}}">{{  Auth::user()->trainee->city_from ?? ''}}</option>
                                                            <option value="" disabled>Punjab Cities</option>
                                                            <option value="Lahore">Lahore</option>
                                                            <option value="Islamabad">Islamabad</option>
                                                            <option value="Karachi">Karachi</option>
                                                            <option value="Multan">Multan</option>
                                                            <option value="Faisalabad">Faisalabad</option>
                                                            <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                                            <option value="Ahmadpur East">Ahmadpur East</option>
                                                            <option value="Ali Khan Abad">Ali Khan Abad</option>
                                                            <option value="Alipur">Alipur</option>
                                                            <option value="Arifwala">Arifwala</option>
                                                            <option value="Attock">Attock</option>
                                                            <option value="Bhera">Bhera</option>
                                                            <option value="Bhalwal">Bhalwal</option>
                                                            <option value="Bahawalnagar">Bahawalnagar</option>
                                                            <option value="Bahawalpur">Bahawalpur</option>
                                                            <option value="Bhakkar">Bhakkar</option>
                                                            <option value="Burewala">Burewala</option>
                                                            <option value="Chillianwala">Chillianwala</option>
                                                            <option value="Chakwal">Chakwal</option>
                                                            <option value="Chichawatni">Chichawatni</option>
                                                            <option value="Chiniot">Chiniot</option>
                                                            <option value="Chishtian">Chishtian</option>
                                                            <option value="Daska">Daska</option>
                                                            <option value="Darya Khan">Darya Khan</option>
                                                            <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                                            <option value="Dhaular">Dhaular</option>
                                                            <option value="Dina">Dina</option>
                                                            <option value="Dinga">Dinga</option>
                                                            <option value="Dipalpur">Dipalpur</option>
                                                            <option value="Ferozewala">Ferozewala</option>
                                                            <option value="Fateh Jhang">Fateh Jang</option>
                                                            <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                                                            <option value="Gojra">Gojra</option>
                                                            <option value="Gujranwala">Gujranwala</option>
                                                            <option value="Gujrat">Gujrat</option>
                                                            <option value="Gujar Khan">Gujar Khan</option>
                                                            <option value="Hafizabad">Hafizabad</option>
                                                            <option value="Haroonabad">Haroonabad</option>
                                                            <option value="Hasilpur">Hasilpur</option>
                                                            <option value="Haveli Lakha">Haveli Lakha</option>
                                                            <option value="Jatoi">Jatoi</option>
                                                            <option value="Jalalpur">Jalalpur</option>
                                                            <option value="Jattan">Jattan</option>
                                                            <option value="Jampur">Jampur</option>
                                                            <option value="Jaranwala">Jaranwala</option>
                                                            <option value="Jhang">Jhang</option>
                                                            <option value="Jhelum">Jhelum</option>
                                                            <option value="Kalabagh">Kalabagh</option>
                                                            <option value="Karor Lal Esan">Karor Lal Esan</option>
                                                            <option value="Kasur">Kasur</option>
                                                            <option value="Kamalia">Kamalia</option>
                                                            <option value="Kamoke">Kamoke</option>
                                                            <option value="Khanewal">Khanewal</option>
                                                            <option value="Khanpur">Khanpur</option>
                                                            <option value="Kharian">Kharian</option>
                                                            <option value="Khushab">Khushab</option>
                                                            <option value="Kot Addu">Kot Addu</option>
                                                            <option value="Jauharabad">Jauharabad</option>
                                                            <option value="Lalamusa">Lalamusa</option>
                                                            <option value="Layyah">Layyah</option>
                                                            <option value="Liaquat Pur">Liaquat Pur</option>
                                                            <option value="Lodhran">Lodhran</option>
                                                            <option value="Malakwal">Malakwal</option>
                                                            <option value="Mamoori">Mamoori</option>
                                                            <option value="Mailsi">Mailsi</option>
                                                            <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                                            <option value="Mian Channu">Mian Channu</option>
                                                            <option value="Mianwali">Mianwali</option>
                                                            <option value="Murree">Murree</option>
                                                            <option value="Muridke">Muridke</option>
                                                            <option value="Mianwali Bangla">Mianwali Bangla</option>
                                                            <option value="Muzaffargarh">Muzaffargarh</option>
                                                            <option value="Narowal">Narowal</option>
                                                            <option value="Nankana Sahib">Nankana Sahib</option>
                                                            <option value="Okara">Okara</option>
                                                            <option value="Renala Khurd">Renala Khurd</option>
                                                            <option value="Pakpattan">Pakpattan</option>
                                                            <option value="Pattoki">Pattoki</option>
                                                            <option value="Pir Mahal">Pir Mahal</option>
                                                            <option value="Qaimpur">Qaimpur</option>
                                                            <option value="Qila Didar Singh">Qila Didar Singh</option>
                                                            <option value="Rabwah">Rabwah</option>
                                                            <option value="Raiwind">Raiwind</option>
                                                            <option value="Rajanpur">Rajanpur</option>
                                                            <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                                            <option value="Rawalpindi">Rawalpindi</option>
                                                            <option value="Sadiqabad">Sadiqabad</option>
                                                            <option value="Safdarabad">Safdarabad</option>
                                                            <option value="Sahiwal">Sahiwal</option>
                                                            <option value="Sangla Hill">Sangla Hill</option>
                                                            <option value="Sarai Alamgir">Sarai Alamgir</option>
                                                            <option value="Sargodha">Sargodha</option>
                                                            <option value="Shakargarh">Shakargarh</option>
                                                            <option value="Sheikhupura">Sheikhupura</option>
                                                            <option value="Sialkot">Sialkot</option>
                                                            <option value="Sohawa">Sohawa</option>
                                                            <option value="Soianwala">Soianwala</option>
                                                            <option value="Siranwali">Siranwali</option>
                                                            <option value="Talagang">Talagang</option>
                                                            <option value="Taxila">Taxila</option>
                                                            <option value="Toba Tek Singh">Toba Tek Singh</option>
                                                            <option value="Vehari">Vehari</option>
                                                            <option value="Wah Cantonment">Wah Cantonment</option>
                                                            <option value="Wazirabad">Wazirabad</option>
                                                            <option value="" disabled>Sindh Cities</option>
                                                            <option value="Badin">Badin</option>
                                                            <option value="Bhirkan">Bhirkan</option>
                                                            <option value="Rajo Khanani">Rajo Khanani</option>
                                                            <option value="Chak">Chak</option>
                                                            <option value="Dadu">Dadu</option>
                                                            <option value="Digri">Digri</option>
                                                            <option value="Diplo">Diplo</option>
                                                            <option value="Dokri">Dokri</option>
                                                            <option value="Ghotki">Ghotki</option>
                                                            <option value="Haala">Haala</option>
                                                            <option value="Hyderabad">Hyderabad</option>
                                                            <option value="Islamkot">Islamkot</option>
                                                            <option value="Jacobabad">Jacobabad</option>
                                                            <option value="Jamshoro">Jamshoro</option>
                                                            <option value="Jungshahi">Jungshahi</option>
                                                            <option value="Kandhkot">Kandhkot</option>
                                                            <option value="Kandiaro">Kandiaro</option>
                                                            <option value="Kashmore">Kashmore</option>
                                                            <option value="Keti Bandar">Keti Bandar</option>
                                                            <option value="Khairpur">Khairpur</option>
                                                            <option value="Kotri">Kotri</option>
                                                            <option value="Larkana">Larkana</option>
                                                            <option value="Matiari">Matiari</option>
                                                            <option value="Mehar">Mehar</option>
                                                            <option value="Mirpur Khas">Mirpur Khas</option>
                                                            <option value="Mithani">Mithani</option>
                                                            <option value="Mithi">Mithi</option>
                                                            <option value="Mehrabpur">Mehrabpur</option>
                                                            <option value="Moro">Moro</option>
                                                            <option value="Nagarparkar">Nagarparkar</option>
                                                            <option value="Naudero">Naudero</option>
                                                            <option value="Naushahro Feroze">Naushahro Feroze</option>
                                                            <option value="Naushara">Naushara</option>
                                                            <option value="Nawabshah">Nawabshah</option>
                                                            <option value="Nazimabad">Nazimabad</option>
                                                            <option value="Qambar">Qambar</option>
                                                            <option value="Qasimabad">Qasimabad</option>
                                                            <option value="Ranipur">Ranipur</option>
                                                            <option value="Ratodero">Ratodero</option>
                                                            <option value="Rohri">Rohri</option>
                                                            <option value="Sakrand">Sakrand</option>
                                                            <option value="Sanghar">Sanghar</option>
                                                            <option value="Shahbandar">Shahbandar</option>
                                                            <option value="Shahdadkot">Shahdadkot</option>
                                                            <option value="Shahdadpur">Shahdadpur</option>
                                                            <option value="Shahpur Chakar">Shahpur Chakar</option>
                                                            <option value="Shikarpaur">Shikarpaur</option>
                                                            <option value="Sukkur">Sukkur</option>
                                                            <option value="Tangwani">Tangwani</option>
                                                            <option value="Tando Adam Khan">Tando Adam Khan</option>
                                                            <option value="Tando Allahyar">Tando Allahyar</option>
                                                            <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                                                            <option value="Thatta">Thatta</option>
                                                            <option value="Umerkot">Umerkot</option>
                                                            <option value="Warah">Warah</option>
                                                            <option value="" disabled>Khyber Cities</option>
                                                            <option value="Abbottabad">Abbottabad</option>
                                                            <option value="Adezai">Adezai</option>
                                                            <option value="Alpuri">Alpuri</option>
                                                            <option value="Akora Khattak">Akora Khattak</option>
                                                            <option value="Ayubia">Ayubia</option>
                                                            <option value="Banda Daud Shah">Banda Daud Shah</option>
                                                            <option value="Bannu">Bannu</option>
                                                            <option value="Batkhela">Batkhela</option>
                                                            <option value="Battagram">Battagram</option>
                                                            <option value="Birote">Birote</option>
                                                            <option value="Chakdara">Chakdara</option>
                                                            <option value="Charsadda">Charsadda</option>
                                                            <option value="Chitral">Chitral</option>
                                                            <option value="Daggar">Daggar</option>
                                                            <option value="Dargai">Dargai</option>
                                                            <option value="Darya Khan">Darya Khan</option>
                                                            <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                                            <option value="Doaba">Doaba</option>
                                                            <option value="Dir">Dir</option>
                                                            <option value="Drosh">Drosh</option>
                                                            <option value="Hangu">Hangu</option>
                                                            <option value="Haripur">Haripur</option>
                                                            <option value="Karak">Karak</option>
                                                            <option value="Kohat">Kohat</option>
                                                            <option value="Kulachi">Kulachi</option>
                                                            <option value="Lakki Marwat">Lakki Marwat</option>
                                                            <option value="Latamber">Latamber</option>
                                                            <option value="Madyan">Madyan</option>
                                                            <option value="Mansehra">Mansehra</option>
                                                            <option value="Mardan">Mardan</option>
                                                            <option value="Mastuj">Mastuj</option>
                                                            <option value="Mingora">Mingora</option>
                                                            <option value="Nowshera">Nowshera</option>
                                                            <option value="Paharpur">Paharpur</option>
                                                            <option value="Pabbi">Pabbi</option>
                                                            <option value="Peshawar">Peshawar</option>
                                                            <option value="Saidu Sharif">Saidu Sharif</option>
                                                            <option value="Shorkot">Shorkot</option>
                                                            <option value="Shewa Adda">Shewa Adda</option>
                                                            <option value="Swabi">Swabi</option>
                                                            <option value="Swat">Swat</option>
                                                            <option value="Tangi">Tangi</option>
                                                            <option value="Tank">Tank</option>
                                                            <option value="Thall">Thall</option>
                                                            <option value="Timergara">Timergara</option>
                                                            <option value="Tordher">Tordher</option>
                                                            <option value="" disabled>Balochistan Cities</option>
                                                            <option value="Awaran">Awaran</option>
                                                            <option value="Barkhan">Barkhan</option>
                                                            <option value="Chagai">Chagai</option>
                                                            <option value="Dera Bugti">Dera Bugti</option>
                                                            <option value="Gwadar">Gwadar</option>
                                                            <option value="Harnai">Harnai</option>
                                                            <option value="Jafarabad">Jafarabad</option>
                                                            <option value="Jhal Magsi">Jhal Magsi</option>
                                                            <option value="Kacchi">Kacchi</option>
                                                            <option value="Kalat">Kalat</option>
                                                            <option value="Kech">Kech</option>
                                                            <option value="Kharan">Kharan</option>
                                                            <option value="Khuzdar">Khuzdar</option>
                                                            <option value="Killa Abdullah">Killa Abdullah</option>
                                                            <option value="Killa Saifullah">Killa Saifullah</option>
                                                            <option value="Kohlu">Kohlu</option>
                                                            <option value="Lasbela">Lasbela</option>
                                                            <option value="Lehri">Lehri</option>
                                                            <option value="Loralai">Loralai</option>
                                                            <option value="Mastung">Mastung</option>
                                                            <option value="Musakhel">Musakhel</option>
                                                            <option value="Nasirabad">Nasirabad</option>
                                                            <option value="Nushki">Nushki</option>
                                                            <option value="Panjgur">Panjgur</option>
                                                            <option value="Pishin Valley">Pishin Valley</option>
                                                            <option value="Quetta">Quetta</option>
                                                            <option value="Sherani">Sherani</option>
                                                            <option value="Sibi">Sibi</option>
                                                            <option value="Sohbatpur">Sohbatpur</option>
                                                            <option value="Washuk">Washuk</option>
                                                            <option value="Zhob">Zhob</option>
                                                            <option value="Ziarat">Ziarat</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row fw-bold mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1"> Skill of Interest Experience? <span class="text-danger">*</span></label>
                                                        <select class="form-control form-select subheading mt-2"aria-label="Default select example" id="exampleFormControlSelect1" name="skill_experience" required>
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
