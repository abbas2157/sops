<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Reset Password - SOPS - School of Professional Skills</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="keywords" />
        <meta content="" name="description" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
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
                    <div class="col-md-6 col-12 position-relative signup-img mt-5">
                        <img src="{{ asset('assets/img/login.gif') }}" class="img-fluid text-center align-items-center py-5 mt-5" alt="" />
                    </div>
                    <div class="col-md-6 col-12 py-5 px-4">
                        <div class="signup-form text-white my-5">
                            <div class="mb-4">
                                <h2>Reset Password</h2>
                                <p>SOPS - School of Professional Skills</p>
                            </div>
                            @if ($errors->has('emailPassword'))
                                <span class="text-danger text-left">{{ $errors->first('emailPassword') }}</span>
                            @endif
                            <form class="signup-input" method="post" action="{{ route('reset-password.perform') }}">
                                @csrf
                                <div class="password-container">
                                    <input type="hidden" name="id" value="{{ $user->id ?? 00 }}">
                                    <input type="password" id="password" name="password" class="password-input form-control subheading" required placeholder="Enter New Password" />
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
                                <button class="btn save-btn text-white p-3 w-100 mt-4 mb-2"> Change Password </button>
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
