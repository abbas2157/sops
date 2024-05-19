<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Start Sign Up - SOPS - School of Professional Skills</title>
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
                                <h2>Register As</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="individual" class="btn save-btn text-white p-3 w-100 mt-4 mb-2"> Individual </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="company" class="btn save-btn text-white p-3 w-100 mt-4 mb-2"> Company </a>
                                </div>
                            </div>
                            <div class="row text-white keep-me-logged">
                                <div class="col-md-12 mt-3 forget-password text-center">
                                    <a href="{{ route('login') }}" class="text-decoration-none text-white">
                                        Already Registered Sign in Here 
                                    </a>
                                </div>
                            </div>
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
