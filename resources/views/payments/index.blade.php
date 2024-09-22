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
                    <div class="col-md-6 col-12 px-4">
                        <div class="signup-form text-white my-3">
                            <div class="mb-4">
                                <h2>In Your Cart</h2>
                                <p>Your purchase contains the following:</p>
                            </div>
                            @if ($errors->has('emailPassword'))
                                <span class="text-danger text-left">{{ $errors->first('emailPassword') }}</span>
                            @endif
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <img src="{{ asset('assets/img/SOPS.png') }}" style="width: 100%">
                                </div>
                                <div class="col-md-8">
                                    <h6 class="mt-2">{{ $course->name ?? '' }}</h6>
                                    <p>Verified Certificate</p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <h6 class="mt-2">Summary</h6>
                                </div>
                                <div class="col-md-6">Price</div>
                                <div class="col-md-6 text-right">Rs. {{ $course->price ?? '00' }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-9">
                                    <h6 class="mt-2">Add coupon code (optional)</h6>
                                    <div class="password-container">
                                        <input type="text" id="coupon" name="coupon" class="password-input form-control subheading" required placeholder="Enter Coupon" />
                                    </div>
                                </div>
                                <div class="col-md-3 pt-3">
                                    <div class="pt-1">
                                        <button class="btn save-btn text-white w-100 mt-3"> Apply </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">Total</div>
                                <div class="col-md-6 text-right">Rs. {{ $course->price ?? '00' }}</div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h6 class="mt-2">Order Details</h6>
                                    <p>
                                        The above total includes any applicable taxes. 
                                        After you complete your order you will be automatically
                                        enrolled in the verified track of the course.
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <a href="{{ route('payments.perform') }}" class="btn save-btn text-white w-100 mt-3"> Continue </a>
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
