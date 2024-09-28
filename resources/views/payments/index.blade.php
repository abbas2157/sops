<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Payment Trainee - SOPS - School of Professional Skills</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="keywords" />
        <meta content="" name="description" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
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
                    <div class="col-md-6 col-12 position-relative signup-img mt-3">
                        <div class="mt-5 ms-5 ps-5">
                            <h1 style="font-size: 3rem; color: #4f3a72;">The NEXT <br /> GENERATION <br /> OF LEARNING</h1>
                            <hr style="width: 30%; border : 2px solid #f4bf3f;    opacity: unset;"/>
                            <ul>
                                <li>Build skills quicker with AI Assistance.</li>
                                <li>Gain interactive learning experience with modern tools</li>
                            </ul>
                        </div>
                        <img src="{{ asset('assets/img/login.gif') }}" class="img-fluid text-center align-items-center" alt="" />
                    </div>
                    <div class="col-md-6 col-12 px-4">
                        <div class="signup-form text-white my-2" style="max-width: 500px !important">
                            <div class="mb-2">
                                <h2>In Your Cart</h2>
                                <p>Your purchase contains the following:</p>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/img/SOPS.png') }}" style="width: 100%">
                                </div>
                                <div class="col-md-8">
                                    <h6 class="mt-2">{{ $course->name ?? '' }}</h6>
                                    <p>Verified Certificate</p>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <h6 class="mt-2">Summary</h6>
                                </div>
                                <div class="col-md-6">Price</div>
                                <div class="col-md-6 text-right">Rs. {{ $course->price ?? '00' }}</div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-9">
                                    <h6 class="mt-2">Add coupon code (optional)</h6>
                                    <div class="password-container">
                                        <input type="text" id="coupon" name="coupon" class="password-input form-control subheading" placeholder="Enter Coupon" />
                                    </div>
                                </div>
                                <div class="col-md-3 pt-3">
                                    <div class="pt-1">
                                        <button class="btn coupon-btn text-white mt-3" id="apply_coupon"> Apply </button>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-1 ms-1">
                                    <span class="text-danger  fs-6 text-left d-none"></span>
                                </div>
                                <div class="col-md-12 mt-1 ms-1">
                                    <span class="text-success fs-6 text-left d-none"></span>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">Total</div>
                                <div class="col-md-6 text-right">Rs. {{ $course->price ?? '00' }}</div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h6 class="mt-2">Order Details</h6>
                                    <p>
                                        We are a non-profit organization currently in the process of registration, so these account details are temporary to manage the payment process.
                                    </p>
                                    <p>
                                        To submit your course fee payment, please transfer the total amount to the following bank account:
                                    </p>
                                    <p>
                                        <b>Account Title </b> : Ocean Publishers <br />
                                        <b>Account Number </b>: 01371007145782 <br />
                                        <b>IBAN </b>: PK51ALFH0137001007145782 <br />
                                        <b>Branch Name </b>: Model Town Branch <br />
                                        <b>Branch Code </b>: 0137 <br />
                                    </p>
                                    <p>Once completed, please submit proof of payment—including your name and course title—to our WhatsApp number. Thank you!</p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <a href="{{ route('payments.perform') }}" class="btn login-btn text-white w-100 mt-3 change-continues"> Continue </a>
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
        <script>
            $('#apply_coupon').click(function(){
                var coupon = $('#coupon').val();
                $('.text-danger').addClass('d-none');
                if(coupon == '') {
                    $('.text-danger').text('This field is required.');
                    $('.text-danger').removeClass('d-none');
                    return;
                }
                var formData = new FormData();
                formData.append('coupon', coupon);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: '{{ route("payments.coupon.apply") }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.hasOwnProperty('success')) {
                            $('.text-success').text(response.success);
                            $('.text-success').removeClass('d-none');
                            $('.change-continues').attr('href',"{{ route('payments.perform') }}?coupon="+coupon);
                        }
                        else {
                            $('.text-danger').text(response.error);
                            $('.text-danger').removeClass('d-none');
                        }
                    },
                    error: function(xhr, status, error) {
                        
                    }
                });
            });
        </script>
  </body>
</html>
