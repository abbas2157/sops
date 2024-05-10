<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    @yield('title')
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <link rel="shortcut icon" href="https://whitesprout.com.ng/img/SOPS.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- jQuery UI CSS -->
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('toast/css/jquery.toast.css') }}">
    @yield('css')
    <style>
      .align-middle, .text-secondary
        {
            white-space:nowrap;
        }
    </style>
  </head>

  <body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
      <!-- Spinner Start -->
      <div
        id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
      >
        <div
          class="spinner-border text-primary"
          style="width: 3rem; height: 3rem"
          role="status"
        >
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <!-- Spinner End -->

      <!-- Sidebar Start -->
      @include('admin.layout.sidebar')
      <!-- Sidebar End -->

      <!-- Content Start -->
      <div class="content">
        <!-- Navbar Start -->
        @include('admin.layout.navbar')
        <!-- Navbar End -->
        @yield('content')
        <div class="container-fluid pt-4 px-4 mb-5 main-footer">
            <div class="bg-footer rounded-top-5 p-3">
            <p class="fw-bold">SOPS - School of Professional Skills</p>
            <div class="row">
                <div class="col-md-6 align-items-center align-middle">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/img/SOPS.png') }}" style="max-width: 10% !important;" class="img-fluid" alt="" />
                        <div class="ms-2">
                        <p class="m-0">© 2024 Developed by SOPS</p>
                        <p class="m-0">All right reserved</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="text-decoration-none"
                        ><img
                        src="{{ asset('assets/img/footer-linkedin.svg') }}"
                        class="img-fluid me-2"
                        alt="linkedin"
                    /></a>
                    <a href="#" class="text-decoration-none"
                        ><img
                        src="{{ asset('assets/img/footer-facebook.svg') }}"
                        class="img-fluid me-2"
                        alt="facebook"
                    /></a>
                    <a href="#" class="text-decoration-none"
                        ><img
                        src="{{ asset('assets/img/footer-twitch.svg') }}"
                        class="img-fluid me-2"
                        alt="Twitch"
                    /></a>
                    <a href="#" class="text-decoration-none"
                        ><img
                        src="{{ asset('assets/img/footer-twitter.svg') }}"
                        class="img-fluid me-2"
                        alt="Twitter"
                    /></a>
                </div>
            </div>
            </div>
        </div>

      </div>
      <!-- Recent Sales End -->

      <!-- Calendar Modal -->
      <div
        class="modal fade"
        id="myModal"
        aria-labelledby="exampleModalToggleLabel"
        tabindex="-1"
        style="display: none"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content calendar-modal">
            <div class="modal-header border-0 text-white">
              <button
                type="button"
                class="btn-close text-white calendar-close-btn"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div id="datepicker"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content End -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- jQuery UI JS -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets/js/admin-main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('toast/js/jquery.toast.js') }}"></script>
    @yield('js')
    <script>
        @if ($errors->has('success'))
            $.toast({
                position: 'top-right', 
                heading: 'Note !',
                text: "{{ $errors->first('success') }}",
                icon: 'info',
                loader: true,
                loaderBg: '#9EC600',
                showHideTransition: 'fade', 
                allowToastClose: true, 
                hideAfter: 8000, 
                stack: 5, 
            });
        @endif
        @if ($errors->has('error'))
            $.toast({
                position: 'top-right', 
                heading: 'Note !',
                text: "{{ $errors->first('error') }}",
                icon: 'warning',
                loader: true,
                loaderBg: '#9EC600',
                showHideTransition: 'fade', 
                allowToastClose: true, 
                hideAfter: 3000, 
                stack: 5, 
            });
        @endif
    </script>
  </body>
</html>
