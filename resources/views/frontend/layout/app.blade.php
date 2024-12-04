<!doctype html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta name="author" content="pxdraft">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
      <meta name="keywords" content="">
      <meta name="description" content="">
      @yield('title')
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
      <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('toast/css/jquery.toast.css') }}">
      <!-- https://kamranahmed.info/toast -->
   </head>
   <body>
      <a id="skippy" class="skippy visually-hidden-focusable overflow-hidden" href="#content">
         <div class="container"><span class="u-skiplink-text">Skip to main content</span></div>
      </a>
      <div id="loading" class="loading-preloader">
         <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
      </div>
      <div class="wrapper">
            <div class="header-height-bar"></div>
            <!-- Header -->
            <header class="main-header main-header-01 headroom navbar-light bg-white header-height fixed-top">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <!-- Logo -->
                        <a class="navbar-brand header-navbar-brand" href="{{ url('trainee') }}">
                            <img class="logo-dark" src="{{ asset('assets/img/SOPS.png') }}" style="width:10%" title="" alt="">
                            <img class="logo-light" src="{{ asset('assets/img/SOPS.png') }}" title="" alt="">
                        </a>
                        <!-- Logo -->
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                            <div class="offcanvas-header">
                                <div class="offcanvas-title" id="offcanvasNavbar2Label"><img class="logo-dark" src="{{ asset('assets/img/SOPS.png') }}" style="width:10%" title="" alt=""></div>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav mx-auto">
                                    <li><a class="dropdown-item" href="{{ route('course',['uuid' => $course->uuid, 'type' => 1]) }}"> All Steps</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-right ms-auto">
                            <div class="hr-nav-item h-user dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <span class="dropdown-header">Welcome {{ Auth::user()->full_name ?? ''}} </span>
                                    <li><a class="dropdown-item" href="{{ route('trainee') }}"><i class="fa-regular fa-user me-2"></i> Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('trainee.profile') }}"><i class="fa-regular fa-pen-to-square me-2"></i> Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket me-2"></i> Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- End Header -->
            <!-- Main -->
            @yield('content')
            <!-- End Main -->
            <footer class="bg-dark footer">
                <div class="footer-bottom small py-3 border-top border-white border-opacity-10">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start py-1">
                                <p class="m-0 text-white text-opacity-75">© 2024 copyright by SOPS - School of Professional Skills</p>
                            </div>
                            <div class="col-md-6 text-center text-md-end py-1">
                                <ul class="nav justify-content-center justify-content-md-end list-unstyled footer-link-01 m-0">
                                <li class="p-0 mx-3 ms-md-0 me-md-3"><a href="https://sops.pk/" class="text-white text-opacity-75">Our Website</a></li>
                                <li class="p-0 mx-3 ms-md-0 me-md-3"><a href="https://sops.pk/about-us-2/" class="text-white text-opacity-75">About Us</a></li>
                                <li class="p-0 mx-3 ms-md-0 me-md-3"><a href="https://sops.pk/meet-the-team/" class="text-white text-opacity-75">Meet The Team</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
      </div>

         <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
         <script src="{{ asset('frontend/js/theme.js') }}"></script>
         <script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>
         <script src="{{ asset('frontend/js/theme-jquery.js') }}"></script>
         <script type="text/javascript" src="{{ asset('toast/js/jquery.toast.js') }}"></script>
         @yield('js')
   </body>
</html>
