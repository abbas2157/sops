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
                                <label for="exampleFormControlSelect1">Trainer Description</label>
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
                    <label for="exampleFormControlSelect1">Type</label>
                    <select
                        class="form-control form-select subheading mt-1"
                        aria-label="Default select example"
                        id="exampleFormControlSelect1"
                    >
                        <option>Standard Product</option>
                        <option>Variable Product</option>
                        <option>Service Product</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1"
                        >Product Unit</label
                    >
                    <select
                        class="form-control form-select subheading mt-1"
                        aria-label="Default select example"
                        id="exampleFormControlSelect1"
                    >
                        <option>Select Product Unit</option>
                        <option>Product Unit 1</option>
                        <option>Product Unit 2</option>
                        <option>Product Unit 3</option>
                    </select>
                    </div>
                </div>
                </div>
                <div class="row fw-bold mt-2">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1"
                        >Purchase Price
                        <span class="text-danger">*</span></label
                    >
                    <input
                        type="text"
                        class="form-control subheading mt-2"
                        placeholder="Purchase Price"
                        id="exampleFormControlInput1"
                    />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1"
                        >Profit Margin <span class="text-danger">*</span></label
                    >
                    <input
                        type="text"
                        class="form-control subheading mt-2"
                        placeholder="30%"
                        id="exampleFormControlInput1"
                    />
                    </div>
                </div>
                </div>
                <div class="row mt-2 fw-bold">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1"
                        >Sale Price <span class="text-danger">*</span></label
                    >
                    <input
                        type="text"
                        class="form-control subheading mt-2"
                        placeholder="Stock Alert"
                        id="exampleFormControlInput1"
                    />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1"
                        >Stock Alert</label
                    >
                    <input
                        type="text"
                        class="form-control subheading mt-2"
                        placeholder="Stock Alert"
                        id="exampleFormControlInput1"
                    />
                    </div>
                </div>
                </div>
                <div class="row mt-2 fw-bold">
                <label for="exampleFormControlSelect1" class="mt-1"
                    >Varient Name</label
                >
                <div class="col-md-10">
                    <div class="form-group">
                    <input
                        type="text"
                        class="form-control subheading mt-2"
                        placeholder="Stock Alert"
                        id="exampleFormControlInput1"
                    />
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn create-btn w-100 mt-2">
                    Create <i class="fa-solid fa-plus ms-2"></i>
                    </button>
                </div>
                </div>
                <div class="d-flex mt-3 gap-1 varient-product fw-bold">
                <div class="form-group w-100">
                    <label for="exampleFormControlSelect1"
                    >Variant Name</label
                    >
                    <input
                    type="text"
                    class="form-control subheading mt-2 w-100"
                    placeholder="Varient Name"
                    id="exampleFormControlInput1"
                    />
                </div>
                <div class="form-group w-100">
                    <label for="exampleFormControlSelect1"
                    >Variant Code</label
                    >
                    <input
                    type="text"
                    class="form-control subheading mt-2"
                    placeholder="Varient Code"
                    id="exampleFormControlInput1"
                    />
                </div>
                <div class="form-group w-100">
                    <label for="exampleFormControlSelect1"
                    >Purchase Price</label
                    >
                    <input
                    type="text"
                    class="form-control subheading mt-2"
                    placeholder="Purchase Price"
                    id="exampleFormControlInput1"
                    />
                </div>
                <div class="form-group w-100">
                    <label for="exampleFormControlSelect1"
                    >Sale Price</label
                    >
                    <input
                    type="text"
                    class="form-control subheading mt-2"
                    placeholder="Sale Price"
                    id="exampleFormControlInput1"
                    />
                </div>
                <div class="w-100">
                    <p></p>
                    <button class="btn rounded-3 mt-3 excel-btn w-100">
                    <i class="bi bi-trash3" style="font-size: 15px"></i>
                    </button>
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 mt-4 border-0 card-shadow">
            <div class="card-body">
                <div class="row fw-bold">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Order Tax</label>
                    <input
                        type="text"
                        class="form-control subheading mt-2"
                        placeholder="0%"
                        id="exampleFormControlInput1"
                    />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Tax Type</label>
                    <select
                        class="form-control form-select subheading mt-2"
                        aria-label="Default select example"
                        id="exampleFormControlSelect1"
                    >
                        <option>Select Tax Type</option>
                        <option>Exclusive 1</option>
                        <option>Exclusive 2</option>
                        <option>Exclusive 3</option>
                    </select>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <div class="card rounded-3 mt-4 border-0 card-shadow">
            <div class="card-body" id="barcodeSection">
                <div class="row border-bottom mt-2 fw-bold" id="barcode1">
                <div class="col-md-5">
                    <div class="form-group">
                    <label for="barcodeSymbology1"
                        >Barcode Symbology <span class="text-danger">*</span></label
                    >
                    <select
                        class="form-control form-select subheading mt-1"
                        aria-label="Default select example"
                        id="barcodeSymbology1"
                    >
                        <option>Code 128</option>
                        <option>Code 128</option>
                        <option>Code 128</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <label for="productCode1">Product Code</label>
                    <div class="input-group mt-1 subheading">
                    <input
                        type="text"
                        class="form-control subheading"
                        placeholder="Barcode"
                        aria-label="Recipient's username"
                        aria-describedby="basic-addon2"
                        id="productCode1"
                    />
                    <span
                        class="input-group-text subheading"
                        id="basic-addon2"
                        ><i class="bi bi-upc-scan"></i
                    ></span>
                    </div>
                    <p>Scan the barcode or symbology</p>
                </div>
                <div class="col-md-2 pt-1">
                    <button
                    class="btn text-danger border-danger w-100 subheading mt-4"
                    >
                    <i class="bi bi-trash3"></i>
                    </button>
                </div>
                </div>

                <div
                class="row mt-4 bg-light align-middle p-3 rounded-3 mx-1"
                id="barcodeButtonSection"
                >
                <div class="col-md-6">
                    <p class="m-0">
                    You can scan more than one barcode for a product.
                    </p>
                </div>
                <div class="col-md-6 text-end">
                    <p
                    id="addBarcode"
                    class="text-primary m-0"
                    style="cursor: pointer"
                    >
                    Add another barcode
                    </p>
                </div>
                </div>
            </div>
            </div>

            <button class="btn save-btn text-white mt-3">Submit</button>
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