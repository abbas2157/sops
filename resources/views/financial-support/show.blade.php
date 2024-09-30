<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Financial Support - SOPS - School of Professional Skills</title>
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
                            <h1 style="font-size: 3rem; color: #4f3a72;">THE NEXT <br /> GENERATION <br /> OF LEARNING</h1>
                            <hr style="width: 30%; border : 2px solid #f4bf3f;    opacity: unset;"/>
                            <ul>
                                <li>Build skills quicker with AI Assistance.</li>
                                <li>Gain interactive learning experience with modern tools</li>
                            </ul>
                        </div>
                        <img src="{{ asset('assets/img/login.gif') }}" class="img-fluid text-center align-items-center" alt="" />
                    </div>
                    <div class="col-md-6 col-12 px-4 mt-3">
                        <form action="{{ route('financial-support.perform',$course->uuid) }}" method="POST" id="myForm">
                            @csrf
                            <div class="signup-form text-white first-step my-2" style="max-width: 500px !important">
                                <a href="{{ url()->previous() }}" class="text-white"> Back</a>
                                <div class="mb-2 mt-1">
                                    <h6 class="mt-1">Step 1 of 2</h6>
                                    <h2>Tell us about yourself</h2>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <h6 class="mt-2">What's your highest level of education?</h6>
                                        <div class="password-container">
                                            <select class="form-control form-select subheading mt-2" name="level_of_education" id="level_of_education" required>
                                                <option disabled selected value="">Select education level</option>
                                                @if(!is_null(config('dropdowns.financial_support.level_of_education')))
                                                    @foreach(config('dropdowns.financial_support.level_of_education') as $level)
                                                        <option>{{ $level ?? '' }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <h6 class="mt-2">What's your annual income?</h6>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="password-container">
                                            <select class="form-control form-select subheading" name="currency" id="currency" required>
                                                <option disabled selected value="">Select currency</option>
                                                @if(!is_null(config('dropdowns.financial_support.currency')))
                                                    @foreach(config('dropdowns.financial_support.currency') as $level)
                                                        <option>{{ $level ?? '' }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="password-container">
                                            <input type="number" id="income" name="annual_income" class="password-input form-control subheading" placeholder="Enter annual income" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <h6 class="mt-2">What's your employment status?</h6>
                                        <div class="password-container">
                                            <select class="form-control form-select subheading mt-2" name="employee_status" id="employee_status" required>
                                                <option disabled selected value="">Select employment status</option>
                                                @if(!is_null(config('dropdowns.financial_support.employee_status')))
                                                    @foreach(config('dropdowns.financial_support.employee_status') as $level)
                                                        <option>{{ $level ?? '' }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <h6 class="mt-2">Why are you applying for financial aid?</h6>
                                        <div class="password-container">
                                            <textarea name="financial_aid" id="financial_aid" class="form-control" rows="5" placeholder="Enter your response" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <a href="javascript:;" class="btn login-btn text-white w-100 mt-3 next"> Next </a>
                                    </div>
                                </div>
                            </div>
                            <div class="signup-form text-white second-step my-2 d-none" style="max-width: 500px !important">
                                <a href="{{ url()->previous() }}" class="text-white"> Back</a>
                                <div class="mb-2">
                                    <h6 class="mt-1">Step 2 of 2</h6>
                                    <h2>Just a few more questions</h2>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12 ">
                                        <h6 class="mt-2">How much can you pay for your selected course?</h6>
                                    </div>
                                    <div class="col-md-1 pt-1 price" > PKR </div>
                                    <div class="col-md-11">
                                        <input type="number" id="pay" name="amount_you_can_pay" class="password-input form-control subheading" placeholder="2500" required/>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <h6 class="mt-2">How will your selected course help with your goals?</h6>
                                        <div class="password-container">
                                            <textarea name="your_goals" id="your_goals" class="form-control" rows="5" placeholder="Enter your response" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2"><h5 class="mt-3">Terms and conditions</h5> </div>
                                <div class="row">
                                    <div class="col-md-12 d-flex">
                                        <input type="checkbox" class="checkboxing me-2" name="accurate_information" id="accurate_information" required />
                                        <label for="accurate_information">I'm sharing accurate information on my application.</label>
                                    </div>
                                    <div class="col-md-12 d-flex mt-1">
                                        <input type="checkbox" class="checkboxing me-2" name="commit_to_finishing" id="commit_to_finishing" required />
                                        <label for="commit_to_finishing">I commit to finishing my SOPS course</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <a href="javascript:;" class="btn login-btn text-white w-100 mt-3 review"> Review </a>
                                    </div>
                                </div>
                            </div>
                            <div class="signup-form text-white third-step my-2 d-none" style="max-width: 500px !important">
                                <a href="{{ url()->previous() }}" class="text-white"> Back</a>
                                <div class="mb-4"><h2>Everything look ok on your application?</h2></div>
                                <div class="mb-4"><h5>Requested course</h5></div>
                                <div class="row mt-1">
                                    <div class="col-md-4">
                                        <img src="{{ asset('assets/img/SOPS.png') }}" style="width: 100%">
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="mt-3">{{ $course->name ?? '' }}</h6>
                                        <p>Verified Certificate</p>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-md-10"><h5>About you</h5></div>
                                    <div class="col-md-2 pt-2"><a href="javascript:;" class="text-white about-edit">edit</a></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Education</th>
                                                    <th>Annual Income</th>
                                                    <th>Employment status</th>
                                                </tr>
                                                <tr>
                                                    <td class="education">College degree</td>
                                                    <td class="annual_income">College degree</td>
                                                    <td class="employment_status">College degree</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Reason you applied for aid</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="reason_applied">I am writing to request financial aid for my upcoming course, as it represents a crucial</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-md-10"><h5>About the course</h5></div>
                                    <div class="col-md-2 pt-2"><a href="javascript:;" class="text-white course-edit">edit</a></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Amount you can pay</th>
                                                </tr>
                                                <tr>
                                                    <td class="you_can_pay">PKR 4000</td>
                                                </tr>
                                                <tr>
                                                    <th>Course Goals</th>
                                                </tr>
                                                <tr>
                                                    <td class="course_goals"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <button class="btn login-btn text-white w-100 mt-3 submit-form" type="submit"> Submit Application </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $('.next').click(function(){
                let isValid = true;
                $('.first-step input').each(function () {
                    if (!$(this).val()) {
                        isValid = false;
                    }
                });
                if (!isValid) {
                    event.preventDefault();
                }
                else {
                    $('.first-step').addClass('d-none');
                    $('.second-step').removeClass('d-none');
                }
            });
            $('.review').click(function(){
                let isValid = true;
                $('.second-step input,textarea').each(function () {
                    if (!$(this).val()) {
                        isValid = false;
                    }
                });
                if (!$('#accurate_information').is(':checked')) {
                    isValid = false;
                }
                if (!$('#commit_to_finishing').is(':checked')) {
                    isValid = false;
                }
                if (!isValid) {
                }
                else {
                    $('.second-step').addClass('d-none');
                    $('.third-step').removeClass('d-none');
                }
                
                $('.education').text($('#level_of_education').val());
                $('.employment_status').text($('#employee_status').val());
                $('.annual_income').text($('#currency').val() + ' '+ $('#income').val());
                $('.price').text($('#currency').val());
                
                $('.reason_applied').text($('#financial_aid').val());

                $('.course_goals').text($('#your_goals').val());
                $('.you_can_pay').text($('#currency').val() + ' '+ $('#pay').val());

                event.preventDefault();
            });
            $('.about-edit').click(function(){
                $('.second-step').addClass('d-none');
                $('.third-step').addClass('d-none');
                $('.first-step').removeClass('d-none');
            });
            $('.course-edit').click(function(){
                $('.first-step').addClass('d-none');
                $('.third-step').addClass('d-none');
                $('.second-step').removeClass('d-none');
            });
        </script>
  </body>
</html>
