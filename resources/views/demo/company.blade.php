<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Individual  - SOPS - School of Professional Skills</title>
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
                                <h2> Company Registration</h2>
                            </div>
                            <form class="signup-input" method="post" action="{{ route('register.perform') }}" autocomplete="off">
                                <div class="password-container">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required autocomplete="off"/>
                                </div>
                                <div class="password-container">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required value="{{old('email')}}" autocomplete="off"/>
                                    <img src="{{ asset('assets/img/mail.svg') }}" class="password-toggle pe-2" alt=""/>
                                </div>
                                <div class="password-container">
                                    <input type="text" name="company" class="form-control" placeholder="Company Name" required autocomplete="off"/>
                                </div>
                                <div class="password-container mt-3">
                                    <label>Upload ISO Certificate ? </label>
                                    <input type="file" id="employees" name="employees" class="form-control" accept="file/*" required autocomplete="off" style="height: 37px;margin-top: 5px !important;"/>
                                </div>
                                <div class="password-container">
                                    <input type="number" id="employees" name="employees" class="form-control" placeholder="Number of Employees" required autocomplete="off"/>
                                </div>
                                
                                <div class="mt-3">
                                    <label class="total">Total = $00.00 </label>
                                </div>
                                <button class="btn save-btn text-white p-3 w-100 mt-4 mb-2"> Register Me </button>
                            </form>
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
        {{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}
        <script>
            $('input[type=radio][name=voucher]').change(function() {
                if (this.value == 'yes') {
                   $('.no').hide();
                   $('.yes').show();
                }
                else if (this.value == 'no') {
                    $('.yes').hide();
                   $('.no').show();
                }
            });
            $('input[name="employees"]').on('keyup change',function() {
                if($(this).val().length > 0) {
                   $('.total').text('Total = $'+ (this.value*1500)) 
                }
                else
                {
                    $('.total').text('Total = $00.00');
                }
            });
            
        </script>
  </body>
</html>
