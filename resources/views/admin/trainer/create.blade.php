@extends('admin.layout.app')
@section('title')
    <title>Create Trainer | SOPS - School of Professional Skills</title>
@stop
@section('css')
@stop
@section('content')
<div class="container-fluid py-5 px-4">
    <div class="border-bottom"> <h3 class="all-adjustment text-center pb-2 mb-0">Create Trainer</h3></div>
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card rounded-3 border-0 card-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <label for="exampleFormControlSelect1">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control subheading mt-2" placeholder="Name" id="exampleFormControlSelect1" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <label for="exampleFormControlSelect2">Last Name </label>
                                <input type="text" name="last_name" class="form-control subheading mt-2" placeholder="Last Name (optinal)" id="exampleFormControlSelect2"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <label for="exampleFormControlSelect3">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control subheading mt-2" placeholder="Email" id="exampleFormControlSelect3" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <label for="exampleFormControlSelect4">Phone </label>
                                <input type="text" name="phone" class="form-control subheading mt-2" placeholder="Phone Number (optinal)" id="exampleFormControlSelect4"/>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                            <label for="exampleFormControlSelect1">Gender <span class="text-danger">*</span></label>
                                <select class="form-control form-select subheading mt-2" aria-label="Default select example" id="exampleFormControlSelect1">
                                    <option value="male">Mail</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                            <label for="exampleFormControlSelect1">Assign Course <span class="text-danger">*</span></label>
                                <select class="form-control form-select subheading mt-2" aria-label="Default select example" id="exampleFormControlSelect1">
                                    <option selected disabled>Select Course</option>
                                    @if($courses->isNotEmpty())
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id ?? '' }}">{{ $course->name ?? '' }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group fw-bold">
                                <label for="exampleFormControlSelect1">Trainer Description </label>
                                <textarea class="form-control subheading mt-1" id="exampleFormControlTextarea1" placeholder="Trainer Description (optinal)" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card rounded-3 mt-4 border-0 card-shadow">
                <div class="card-body">
                    <div class="row fw-bold">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="highest_qualification">Highest Qualification <span class="text-danger">*</span></label>
                                <select name="highest_qualification" id="highest_qualification" class="form-control form-select subheading mt-1" required="">
                                    <option value="bsc">BSc</option>
                                    <option value="msc">MSc</option>
                                    <option value="phd">PhD</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="areas_of_expertise">Areas of Expertise <span class="text-danger">*</span></label>
                                <select name="areas_of_expertise" id="areas_of_expertise" class="form-control form-select subheading mt-1" required="">
                                    <option value="Web Development">Web Development</option>
                                    <option value="Mobile Development">Mobile Development</option>
                                    <option value="Data Science">Data Science</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <label for="exampleFormControlSelect3">Years of Experience <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control subheading mt-2" placeholder="Email" id="exampleFormControlSelect3" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fw-bold">
                                <label for="exampleFormControlSelect4">Phone </label>
                                <input type="text" name="phone" class="form-control subheading mt-2" placeholder="Phone Number (optinal)" id="exampleFormControlSelect4"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 rounded-3 card-shadow">
            <div class="card-header bg-white p-3">
                <p class="m-0 fw-bold">Product Images</p>
            </div>
            <div class="card-body">
                <div class="file-upload">
                <input class="file-input" type="file" multiple />
                <img
                    src="dasheets/img/upload-btn.svg"
                    class="img-fluid"
                    alt=""
                />
                <div class="mt-2 subheading">
                    Drag and Drop to upload or
                </div>
                <button class="btn create-btn mt-2">Select Image</button>
                </div>
            </div>
            </div>

            <div class="card rounded-3 border-0 mt-3 card-shadow">
            <div class="card-body">
                <div class="row">
                <div class="col-1">
                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                    <input
                        class="checkbox__input"
                        type="checkbox"
                        id="IMEI"
                    />
                    <svg
                        class="checkbox__icon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 22 22"
                    >
                        <rect
                        width="21"
                        height="21"
                        x=".5"
                        y=".5"
                        fill="#FFF"
                        stroke="rgba(76, 73, 227, 1)"
                        rx="3"
                        />
                        <path
                        class="tick"
                        stroke="rgba(76, 73, 227, 1)"
                        fill="none"
                        stroke-linecap="round"
                        stroke-width="3"
                        d="M4 10l5 5 9-9"
                        />
                    </svg>
                    </label>
                </div>
                <div class="col-10">
                    <label for="IMEI">This Item has IMEI number</label>
                </div>
                </div>

                <div class="row">
                <div class="col-1">
                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                    <input
                        class="checkbox__input"
                        type="checkbox"
                        id="live-product"
                    />
                    <svg
                        class="checkbox__icon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 22 22"
                    >
                        <rect
                        width="21"
                        height="21"
                        x=".5"
                        y=".5"
                        fill="#FFF"
                        stroke="rgba(76, 73, 227, 1)"
                        rx="3"
                        />
                        <path
                        class="tick"
                        stroke="rgba(76, 73, 227, 1)"
                        fill="none"
                        stroke-linecap="round"
                        stroke-width="3"
                        d="M4 10l5 5 9-9"
                        />
                    </svg>
                    </label>
                </div>
                <div class="col-10">
                    <label for="live-product">This Product is Live</label>
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 border-0 mt-3 card-shadow">
            <div class="card-body">
                <div class="row">
                <div class="col-1">
                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                    <input
                        class="checkbox__input"
                        type="checkbox"
                        id="new-product"
                    />
                    <svg
                        class="checkbox__icon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 22 22"
                    >
                        <rect
                        width="21"
                        height="21"
                        x=".5"
                        y=".5"
                        fill="#FFF"
                        stroke="rgba(76, 73, 227, 1)"
                        rx="3"
                        />
                        <path
                        class="tick"
                        stroke="rgba(76, 73, 227, 1)"
                        fill="none"
                        stroke-linecap="round"
                        stroke-width="3"
                        d="M4 10l5 5 9-9"
                        />
                    </svg>
                    </label>
                    <!-- <input type="checkbox" name="" id=""/> -->
                </div>
                <div class="col-10">
                    <label for="new-product">Add to New product</label>
                </div>
                </div>

                <div class="row">
                <div class="col-1">
                    <!-- <input type="checkbox" name="" id="" /> -->
                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                    <input
                        class="checkbox__input"
                        type="checkbox"
                        id="featured-product"
                    />
                    <svg
                        class="checkbox__icon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 22 22"
                    >
                        <rect
                        width="21"
                        height="21"
                        x=".5"
                        y=".5"
                        fill="#FFF"
                        stroke="rgba(76, 73, 227, 1)"
                        rx="3"
                        />
                        <path
                        class="tick"
                        stroke="rgba(76, 73, 227, 1)"
                        fill="none"
                        stroke-linecap="round"
                        stroke-width="3"
                        d="M4 10l5 5 9-9"
                        />
                    </svg>
                    </label>
                </div>
                <div class="col-10">
                    <label for="featured-product"
                    >Add to featured product</label
                    >
                </div>
                </div>

                <div class="row">
                <div class="col-1">
                    <!-- <input type="checkbox" name="" id="" /> -->
                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                    <input
                        class="checkbox__input"
                        type="checkbox"
                        id="best-seller"
                    />
                    <svg
                        class="checkbox__icon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 22 22"
                    >
                        <rect
                        width="21"
                        height="21"
                        x=".5"
                        y=".5"
                        fill="#FFF"
                        stroke="rgba(76, 73, 227, 1)"
                        rx="3"
                        />
                        <path
                        class="tick"
                        stroke="rgba(76, 73, 227, 1)"
                        fill="none"
                        stroke-linecap="round"
                        stroke-width="3"
                        d="M4 10l5 5 9-9"
                        />
                    </svg>
                    </label>
                </div>
                <div class="col-10">
                    <label for="best-seller">Add to Best Seller</label>
                </div>
                </div>

                <div class="row">
                <div class="col-1">
                    <!-- <input type="checkbox" name="" id="" /> -->
                    <label for="myCheckbox09" class="checkbox d-flex mt-1">
                    <input
                        class="checkbox__input"
                        type="checkbox"
                        id="recommended"
                    />
                    <svg
                        class="checkbox__icon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 22 22"
                    >
                        <rect
                        width="21"
                        height="21"
                        x=".5"
                        y=".5"
                        fill="#FFF"
                        stroke="rgba(76, 73, 227, 1)"
                        rx="3"
                        />
                        <path
                        class="tick"
                        stroke="rgba(76, 73, 227, 1)"
                        fill="none"
                        stroke-linecap="round"
                        stroke-width="3"
                        d="M4 10l5 5 9-9"
                        />
                    </svg>
                    </label>
                </div>
                <div class="col-10">
                    <label for="recommended" class=""
                    >Add to Recommended</label
                    >
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 border-0 mt-3 p-2 card-shadow">
            <div class="card-header rounded-3 bg-white border-0 m-0">
                <p class="m-0">Registered Barcode(s)</p>
            </div>
            <div class="card-body p-0 ps-3 m-0">
                <p class="m-0">1</p>
            </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
</script>
@stop