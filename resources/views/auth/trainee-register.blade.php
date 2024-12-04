<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Register Trainee - SOPS - School of Professional Skills</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="keywords" />
        <meta content="" name="description" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-32x32.png') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
        <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        <style>
            .signup-body {
                margin: 0;
                padding: 0;
                background-image: url('{{ asset("assets/img/login-bg.jpg") }}');
                background-attachment: fixed;
                background-size: 100% 100%; /* Stretches the image */
                background-position: center;
                background-repeat: no-repeat;
            }
        </style>
    </head>
    <body class="signup-body">
        <section class="signup position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12 position-relative signup-img mt-5">
                        <div class="mt-5 ms-5 ps-5">
                            <h1 style="font-size: 3rem; color: #4f3a72;">THE NEXT <br /> GENERATION <br /> OF LEARNING</h1>
                            <hr style="width: 30%; border : 2px solid #f4bf3f;    opacity: unset;"/>
                            <ul>
                                <li>Build skills quicker with AI Assistance.</li>
                                <li>Gain interactive learning experience with modern tools</li>
                            </ul>
                        </div>
                        <img src="{{ asset('assets/img/login.gif') }}" class="img-fluid text-center align-items-center" alt="" />
                    </div>
                    <div class="col-md-6 col-12 py-5 px-4 mt-5">
                        <div class="signup-form text-white my-5">
                            <div class="mb-4">
                                <h2>Register here</h2>
                                <p>Let's get you all setup so you can start your journey to becoming a professional of your skill of interest.</p>
                            </div>
                            @if ($errors->has('emailPassword'))
                                <span class="text-danger text-left">{{ $errors->first('emailPassword') }}</span>
                            @endif
                            <form class="signup-input" method="post" action="{{ route('register.trainee_perform') }}" autocomplete="off">
                                @csrf
                                <input type="hidden" name="type" value="{{ $type ?? '' }}" />
                                <div class="password-container">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required value="{{old('name')}}" autocomplete="off"/>
                                    @if ($errors->has('name'))
                                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="password-container">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required value="{{old('email')}}" autocomplete="off"/>
                                    <img src="{{ asset('assets/img/mail.svg') }}" class="password-toggle pe-2" alt=""/>
                                    @if ($errors->has('email'))
                                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="password-container">
                                    <input type="password" id="password" name="password" value="{{old('password')}}" class="password-input form-control subheading" autocomplete="new-password" required placeholder="Password" />
                                    <img src="{{ asset('assets/img/lock.svg') }}" class="password-toggle pe-2" onclick="togglePasswordVisibility('password')" alt="" />
                                    @if ($errors->has('password'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="row text-white keep-me-logged">
                                    <div class="col-md-6 d-flex mt-3">
                                    </div>
                                    <div class="col-md-6 mt-3 forget-password text-end">
                                        <a href="{{ route('login') }}" class="text-decoration-none text-white">
                                            Sign In 
                                        </a>
                                    </div>
                                </div>
                                <button class="btn login-btn p-3 w-100 mt-4 mb-2"> Register Me </button>
                                @if ($errors->has('success'))
                                    <span class="text-success text-left">{{ $errors->first('success') }}</span>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>
