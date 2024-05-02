<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Forgot Password - SOPS - School of Professional Skills</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="keywords" />
        <meta content="" name="description" />
        <link rel="shortcut icon" href="https://whitesprout.com.ng/img/SOPS.png">
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
        <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <!-- Customized Bootstrap Stylesheet -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    </head>
    <body class="signup-body">
        <section class="signup position-relative">
            <div class="right-down-arrow">
                <img src="{{ asset('assets/img/Ellipse.png') }}" class="img-fluid" alt="" />
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12 position-relative signup-img">
                        <img src="{{ asset('assets/img/login.svg') }}" class="img-fluid text-center align-items-center py-5" alt="" />
                    </div>
                    <div class="col-md-6 col-12 py-5 px-4">
                        <div class="signup-form text-white my-5">
                            <div class="mb-4">
                                <h2>Forgot Password</h2>
                                <p>SOPS - School of Professional Skills</p>
                            </div>
                            @if ($errors->has('emailPassword'))
                                <span class="text-danger text-left">{{ $errors->first('emailPassword') }}</span>
                            @endif
                            <form class="signup-input" method="post" action="{{ route('forgot-password.send-email') }}">
                                @csrf
                                <div class="password-container">
                                    <input type="email" id="email" name="email" class="password-input form-control subheading" required placeholder="Enter Email" />
                                    <img src="{{ asset('assets/img/mail.svg') }}" class="password-toggle pe-2"  alt="" />
                                    @if ($errors->has('email'))
                                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="row text-white keep-me-logged">
                                    <div class="col-md-6 d-flex mt-3">
                                        <!-- <input type="checkbox" class="checkboxing" name="" id="" />
                                        <span>Keep me singed in</span> -->
                                    </div>
                                    <div class="col-md-6 mt-3 forget-password text-end">
                                        <a href="{{ route('login') }}" class="text-decoration-none text-white">
                                            Sign In 
                                        </a>
                                    </div>
                                </div>
                                <button class="btn save-btn text-white p-3 w-100 mt-4 mb-2"> Send Mail </button>
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
