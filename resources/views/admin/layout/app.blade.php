<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    @yield('title')
    <title>Sale and Purchase - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
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
      <div class="sidebar pb-3">
        <nav class="navbar navbar-light">
          <a href="index.html" class="navbar-brand ms-3">
          <img src="{{ asset('assets/img/SOPS.png') }}" class="img-fluid me-2" alt="" />
          </a>

          <div class="navbar-nav">
            <a href="index.html" class="nav-item nav-link active text-center border-top">
              <i class="bi bi-grid"></i>
              <p class="pt-1 mb-0">Dashboard</p>
            </a>
            <div id="navbar-toggler" class="nav-item nav-link text-center">
              <i class="bi bi-box-seam"></i>
              <p class="pt-1 mb-0">Products</p>
            </div>
            <div id="navbar-toggler2" class="nav-item nav-link text-center">
              <i class="bi bi-cart"></i>
              <p class="pt-1 mb-0">Sales</p>
            </div>
            <div id="navbar-toggler3" class="nav-item nav-link text-center">
              <i class="bi bi-file-earmark-text"></i>
              <p class="pt-1 mb-0">Purchase</p>
            </div>
            <div id="navbar-toggler4" class="nav-item nav-link text-center">
              <i class="bi bi-bag"></i>
              <p class="pt-1 mb-0">Inventory</p>
            </div>
            <div id="navbar-toggler5" class="nav-item nav-link text-center">
              <i class="bi bi-arrow-90deg-left"></i>
              <p class="pt-1 mb-0">Transfer</p>
            </div>
            <div id="navbar-toggler6" class="nav-item nav-link text-center">
              <i class="fa-solid fa-wallet"></i>
              <p class="pt-1 mb-0">Accounting</p>
            </div>
            <div id="navbar-toggler7" class="nav-item nav-link text-center">
              <i class="bi bi-person"></i>
              <p class="pt-1 mb-0">Customer</p>
            </div>
            <div id="navbar-toggler8" class="nav-item nav-link text-center">
              <i class="bi bi-house"></i>
              <p class="pt-1 mb-0">Vendors</p>
            </div>
            <div id="navbar-toggler9" class="nav-item nav-link text-center">
              <i class="bi bi-clipboard-data"></i>
              <p class="pt-1 mb-0">Report</p>
            </div>
            <a href="shipment.html" class="nav-item nav-link text-center">
              <i class="bi bi-clipboard-data"></i>
              <p class="pt-1 mb-0">Shipment</p>
            </a>
            <a href="customermanagement.html" class="nav-item nav-link text-center">
              <i class="bi bi-clipboard-data"></i>
              <p class="pt-1 mb-0">Add Module</p>
            </a>
            <div id="navbar-toggler10" class="nav-item nav-link text-center">
              <i class="bi bi-gear"></i>
              <p class="pt-1 mb-0">Setting</p>
            </div>
          </div>
        </nav>
      </div>

      <div class="positon-relative sidebar-ul">
        <div id="product" style="display: none">
          <ul class="list-unstyled m-0 px-4 rounded-5">
            <li>
              <a
                href="product.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />All Product</a
              >
            </li>
            <li class="mb-2">
              <a
                href="createproduct.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Product</a
              >
            </li>
            <li class="mb-2">
              <a
                href="printlable.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Print Label</a
              >
            </li>
            <li class="mb-2">
              <a
                href="category.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Category</a
              >
            </li>
            <li class="mb-2">
              <a
                href="brand.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Brand</a
              >
            </li>
            <li class="mb-2">
              <a href="unit.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Unit</a
              >
            </li>
          </ul>
        </div>
        <div id="sale" style="display: none">
          <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
            <li class="mb-2">
              <a href="sale.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />All Sale</a
              >
            </li>
            <li class="mb-2">
              <a
                href="createsale.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Sale</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Sale Order</a
              >
            </li>
            <li class="mb-2">
              <a href="pos.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />POS</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Sale Return</a
              >
            </li>
          </ul>
        </div>
        <div id="purchase" style="display: none">
          <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
            <li class="mb-2">
              <a
                href="purchase.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />All Purchase</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Purchase</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Purchase Order</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Purchase Return</a
              >
            </li>
          </ul>
        </div>
        <div id="inventory" style="display: none">
          <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
            <li class="mb-2">
              <a
                href="inventory.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />All Inventory</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Recieve Inventory</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Bill</a
              >
            </li>
          </ul>
        </div>
        <div id="transfer" style="display: none">
          <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
            <li class="mb-2">
              <a
                href="alltransfer.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />All Transfer</a
              >
            </li>
            <li class="mb-2">
              <a
                href="createtransfer.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Transfer</a
              >
            </li>
          </ul>
        </div>
        <div id="accounting" style="display: none">
          <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
            <li class="mb-2">
              <a href="listaccount.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />List Accounts</a
              >
            </li>
            <li class="mb-2">
              <a href="transfermoney.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Transfer Money</a
              >
            </li>
            <li class="mb-2">
              <a href="createexpense.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Expense</a
              >
            </li>
            <li class="mb-2">
              <a href="allexpense.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />All Expense</a
              >
            </li>
            <li class="mb-2">
              <a href="createdeposit.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Deposit</a
              >
            </li>
            <li class="mb-2">
              <a href="listdeposit.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />List Deposit</a
              >
            </li>
            <li class="mb-2">
              <a href="expensecategory.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Expense Category</a
              >
            </li>
            <li class="mb-2">
              <a href="depositcategory.html" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Deposit Category</a
              >
            </li>
          </ul>
        </div>
        <div id="customer" style="display: none">
          <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
            <li class="mb-2">
              <a
                href="customer.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />All Customer</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Customer</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Blacklist Customer</a
              >
            </li>
          </ul>
        </div>
        <div id="vendor" style="display: none">
          <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
            <li class="mb-2">
              <a
                href="vendor.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />All Vendor</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Create Vendors
              </a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Blacklist Vendors</a
              >
            </li>
          </ul>
        </div>
        <div id="report" style="display: none">
          <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
            <li class="mb-2">
              <a
                href="report.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />All Report</a
              >
            </li>
            <li class="mb-2">
              <a
                href="warehousereport.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Warehouse Report</a
              >
            </li>
          </ul>
        </div>
        <div id="setting" style="display: none">
          <ul class="list-unstyled m-0 py-3 px-4 rounded-5">
            <li class="mb-2">
              <a
                href="setting.html"
                class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />System Setting</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />User Permission</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />SMS Setting</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Email Setting</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />POS Setting</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Payment Setting</a
              >
            </li>
            <li class="mb-2">
              <a href="#" class="text-decoration-none nav-item nav-link"
                ><img
                  src="{{ asset('assets/img/menu.svg') }}"
                  class="img-fluid me-2"
                  alt=""
                />Tax Setting</a
              >
            </li>
          </ul>
        </div>
      </div>
      <!-- Sidebar End -->

      <!-- Content Start -->
      <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand border-bottom bg-white navbar-light sticky-top px-4 py-0" style="height: 80px">
          <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0">LOGO</h2>
          </a>
          <a href="#" class="sidebar-toggler text-decoration-none flex-shrink-0 align-items-center d-inline-flex">
            <i class="fa fa-bars"></i>
          </a>
          <form class="d-none d-md-flex ms-4">
            <select class="form-control form-select rounded-5">
              <option>Select Warehouse</option>
              <option>Warehouse 1</option>
              <option>Warehouse 2</option>
              <option>Warehouse 3</option>
            </select>
            <!-- <input class="form-control border-0" type="search" placeholder="Search"> -->
          </form>
          <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
              <a href="#" class="nav-link" data-bs-toggle="dropdown">
                <i class="fa fa-bell align-items-center d-inline-flex"></i>
              </a>
              <div
                class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0"
              >
                <a href="#" class="dropdown-item">
                  <h6 class="fw-normal mb-0">Profile updated</h6>
                  <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider" />
                <a href="#" class="dropdown-item">
                  <h6 class="fw-normal mb-0">New user added</h6>
                  <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider" />
                <a href="#" class="dropdown-item">
                  <h6 class="fw-normal mb-0">Password changed</h6>
                  <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider" />
                <a href="#" class="dropdown-item text-center"
                  >See all notifications</a
                >
              </div>
            </div>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
              >
                <img
                  class="rounded-circle me-lg-2"
                  src="{{ asset('assets/img/user.jpg') }}"
                  alt=""
                  style="width: 40px; height: 40px"
                />
              </a>
              <div
                class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0"
              >
                <a href="profile.html" class="dropdown-item">My Profile</a>
                <a href="profilesetting.html" class="dropdown-item">Settings</a>
                <a href="#" class="dropdown-item">Log Out</a>
              </div>
            </div>
          </div>
        </nav>
        <!-- Navbar End -->

        <!-- Sale & Revenue Start -->
        <div class="container-fluid px-4">
          <div class="row">
            <div class="col-md-6 mt-4">
              <div class="card border-0 h-100 card-shadow p-3">
                <div class="row align-items-center">
                  <div class="col-md-7">
                    <h4 class="mb-0 mt-2 heading text-start card-title">
                      Good Morning, William Castillo!
                    </h4>
                    <p>Heres what happening with your store today!</p>
                    <div class="mt-4">
                      <h6 class="mb-0 sales-amount text-dark">$1040.00</h6>
                      <p>Todays Total Purchases</p>
                    </div>
                    <div class="mt-4">
                      <h6 class="mb-0 sales-amount text-dark">$341.00</h6>
                      <p>Todays Total Sales</p>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <img
                      src="{{ asset('assets/img/overview.png') }}"
                      class="img-fluid"
                      alt=""
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mt-4">
              <div class="row">
                <div class="col-md-6 mt-4">
                  <a href="sale.html" class="text-decoration-none">
                    <div
                      class="card-shadow border rounded d-flex align-items-center p-3"
                    >
                      <img
                        src="{{ asset('assets/img/content-sale.svg') }}"
                        class="img-fluid text-center"
                        alt=""
                      />
                      <div class="ms-3">
                        <p class="mb-1 fs-6 text-muted subheading">Sale</p>
                        <h6 class="mb-0 sales-amount">1000$</h6>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-6 mt-4">
                  <a href="purchase.html" class="text-decoration-none">
                    <div
                      class="card-shadow border rounded d-flex align-items-center p-3"
                    >
                      <img
                        src="{{ asset('assets/img/content-bag.svg') }}"
                        class="img-fluid text-center"
                        alt=""
                      />
                      <div class="ms-3">
                        <p class="mb-1 text-muted subheading">Purchase</p>
                        <h6 class="mb-0 sales-amount">1000$</h6>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mt-4">
                  <a href="#" class="text-decoration-none">
                    <div
                      class="card-shadow border rounded d-flex align-items-center p-3"
                    >
                      <img
                        src="{{ asset('assets/img/content-right-arrow.svg') }}"
                        class="img-fluid text-center"
                        alt=""
                      />
                      <div class="ms-3">
                        <p class="mb-1 fs-6 text-muted subheading">Sales Return</p>
                        <h6 class="mb-0 sales-amount">1000$</h6>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-6 mt-4">
                  <a href="#" class="text-decoration-none">
                    <div
                      class="card-shadow border rounded d-flex align-items-center p-3"
                    >
                      <img
                        src="{{ asset('assets/img/content-left-arrow.svg') }}"
                        class="img-fluid text-center"
                        alt=""
                      />
                      <div class="ms-3">
                        <p class="mb-1 fs-6 text-muted subheading">
                          Purchase Return
                        </p>
                        <h6 class="mb-0 sales-amount">1000$</h6>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-6 col-xl-3 mt-4">
              <a href="sale.html" class="text-decoration-none">
                <div
                  class="card-shadow border rounded d-flex align-items-center p-3"
                >
                  <img
                    src="{{ asset('assets/img/content-sale.svg') }}"
                    class="img-fluid text-center"
                    alt=""
                  />
                  <div class="ms-3">
                    <p class="mb-1 fs-6 text-muted subheading">Sale</p>
                    <h6 class="mb-0 sales-amount">1000$</h6>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3 mt-4">
              <a href="purchase.html" class="text-decoration-none">
                <div
                  class="card-shadow border rounded d-flex align-items-center p-3"
                >
                  <img
                    src="{{ asset('assets/img/content-bag.svg') }}"
                    class="img-fluid text-center"
                    alt=""
                  />
                  <div class="ms-3">
                    <p class="mb-1 text-muted subheading">Purchase</p>
                    <h6 class="mb-0 sales-amount">1000$</h6>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3 mt-4">
              <a href="#" class="text-decoration-none">
                <div
                  class="card-shadow border rounded d-flex align-items-center p-3"
                >
                  <img
                    src="{{ asset('assets/img/content-right-arrow.svg') }}"
                    class="img-fluid text-center"
                    alt=""
                  />
                  <div class="ms-3">
                    <p class="mb-1 fs-6 text-muted subheading">Sales Return</p>
                    <h6 class="mb-0 sales-amount">1000$</h6>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3 mt-4">
              <a href="#" class="text-decoration-none">
                <div
                  class="card-shadow border rounded d-flex align-items-center p-3"
                >
                  <img
                    src="{{ asset('assets/img/content-left-arrow.svg') }}"
                    class="img-fluid text-center"
                    alt=""
                  />
                  <div class="ms-3">
                    <p class="mb-1 fs-6 text-muted subheading">
                      Purchase Return
                    </p>
                    <h6 class="mb-0 sales-amount">1000$</h6>
                  </div>
                </div>
              </a>
            </div>
          </div> -->
        </div>
        <!-- Sale & Revenue End -->

        <!-- Sales Chart Start -->
        <div class="container-fluid px-4">
          <div class="row mt-2">
            <div class="col-md-7 col-12 mt-4">
              <div
                class="card-shadow text-center rounded p-4 card border-0 h-100"
              >
                <div class="row card-header border-0 bg-white">
                  <div class="col-md-6 col-12">
                    <h4 class="mb-0 mt-2 heading text-start card-title">
                      Sale and Purchase
                    </h4>
                  </div>
                  <div
                    class="col-md-6 col-12 d-flex flex-wrap text-end justify-content-end"
                  >
                    <!-- <div class="">
                      <span class="calendar-icon p-2 rounded-3"
                        >Today</span
                      >
                      <img
                        src="{{ asset('assets/img/calendar.svg') }}"
                        class="calendar-icon p-2 rounded-3 me-1"
                        alt=""
                        data-bs-toggle="modal"
                        data-bs-target="#myModal"
                        style="cursor: pointer"
                      />
                    </div> -->
                    <span class="calendar-icon rounded-3 me-1">Today</span>
                    <img
                      src="{{ asset('assets/img/calendar.svg') }}"
                      class="calendar-icon rounded-3 me-1"
                      alt=""
                      data-bs-toggle="modal"
                      data-bs-target="#myModal"
                      style="cursor: pointer"
                    />
                    <div class="calendar-icon fs-6 me-2 rounded-3 chart-days">
                      <span class="me-1">1D</span>
                      <span class="me-1">1W</span>
                      <span class="me-1">1M</span>
                      <span class="bg-purple text-white badge text-center"
                        >1Y</span
                      >
                    </div>
                  </div>
                </div>
                <div class="card-body h-100">
                  <canvas id="barChart" class="dashboard-chart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-5 mt-4">
              <div
                class="card-shadow rounded p-4 px-3 w-100 card border-0 h-100"
              >
                <div
                  class="card-header bg-white p-0 m-0 d-flex justify-content-between"
                >
                  <h5 class="text-start mt-2 pb-2 heading ps-3">
                    This Month top selling Products
                  </h5>
                  <img
                    src="{{ asset('assets/img/help-icon.svg') }}"
                    class="img-fluid"
                    alt=""
                  />
                </div>
                <div class="card-body h-100 px-0">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-secondary">Code</th>
                          <th class="text-secondary">Product</th>
                          <th class="text-secondary">Warehouse</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1102324</td>
                          <td>Product</td>
                          <td>12</td>
                        </tr>
                        <tr>
                          <td>1102324</td>
                          <td>Product</td>
                          <td>12</td>
                        </tr>
                        <tr>
                          <td>1102324</td>
                          <td>Product</td>
                          <td>12</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer bg-white border-0 h-100 text-end">
                  <div
                    class="row align-items-center text-end justify-content-end"
                  >
                    <div class="col-auto">
                      <p class="subheading col-form-label">1-3 of 15 entries</p>
                    </div>
                    <div class="col-auto">
                      <div class="new-pagination">
                        <a href="#" class="rounded-start">❮</a>
                        <a href="#" class="rounded-end">❯</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sales Chart End -->

        <!-- Recent Sales Start -->
        <div class="container-fluid px-4">
          <div class="row mt-2">
            <div class="col-md-7 text-center mt-4">
              <div class="card-shadow card p-3 rounded-3 border-0 h-100">
                <div class="card-header bg-white p-0 m-0 mb-2">
                  <h5 class="text-start ps-3 mt-2 pb-2 heading">Stock Alert</h5>
                </div>
                <div class="card-body p-0 m-0">
                  <div class="table-responsive">
                    <table class="table text-start">
                      <thead>
                        <tr>
                          <th class="text-secondary">Code</th>
                          <th class="text-secondary">Product</th>
                          <th class="text-secondary">Warehouse</th>
                          <th class="text-secondary">Quantity</th>
                          <th class="text-secondary">Alert Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1102324</td>
                          <td>Product</td>
                          <td>Warehouse</td>
                          <td>12</td>
                          <td>
                            <span class="badges bg-lightred text-center"
                              >24</span
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>1102324</td>
                          <td>Product</td>
                          <td>Warehouse</td>
                          <td>12</td>
                          <td>
                            <span class="badges bg-lightred text-center"
                              >24</span
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>1102324</td>
                          <td>Product</td>
                          <td>Warehouse</td>
                          <td>12</td>
                          <td>
                            <span class="badges bg-lightred text-center"
                              >24</span
                            >
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer border-0 bg-white p-0 m-0">
                  <div
                    class="row align-items-center text-end justify-content-end"
                  >
                    <div class="col-auto">
                      <p class="subheading col-form-label">1-4 of 15 entries</p>
                    </div>
                    <div class="col-auto">
                      <div class="new-pagination">
                        <a href="#" class="rounded-start">❮</a>
                        <a href="#" class="rounded-end">❯</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-5 text-center mt-4">
              <div class="card-shadow p-3 rounded-3 card border-0 h-100">
                <div class="card-header bg-white p-0 m-0">
                  <h5 class="text-start ps-3 mt-2 pb-2 heading">
                    Top Customers for the month
                  </h5>
                </div>
                <div class="card-body p-0 m-0">
                  <div class="table-responsive text-center">
                    <table class="table text-start">
                      <thead>
                        <tr>
                          <th class="text-secondary">Code</th>
                          <th class="text-secondary">Product</th>
                          <th class="text-secondary">Warehouse</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1102324</td>
                          <td>Product</td>
                          <td>Warehouse</td>
                        </tr>
                        <tr>
                          <td>1102324</td>
                          <td>Product</td>
                          <td>Warehouse</td>
                        </tr>
                        <tr>
                          <td>1102324</td>
                          <td>Product</td>
                          <td>Warehouse</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer border-0 bg-white p-0 m-0">
                  <div
                    class="row align-items-center text-end justify-content-end"
                  >
                    <div class="col-auto">
                      <p class="subheading col-form-label">1-4 of 15 entries</p>
                    </div>
                    <div class="col-auto">
                      <div class="new-pagination">
                        <a href="#" class="rounded-start">❮</a>
                        <a href="#" class="rounded-end">❯</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid pt-4 px-4 mt-3 mb-5">
          <div class="card border-0 card-shadow p-3 rounded-3">
            <div class="card-header bg-white p-0 m-0">
              <h5 class="text-start ps-3 mt-2 pb-1 heading">
                Recent Transactions
              </h5>
            </div>
            <div class="card-body p-0 m-0 mt-2">
              <div class="table-responsive text-center">
                <table class="table text-start">
                  <thead>
                    <tr>
                      <th class="text-secondary">Reference</th>
                      <th class="text-secondary">Customer</th>
                      <th class="text-secondary">Warehouse</th>
                      <th class="text-secondary">Status</th>
                      <th class="text-secondary">Grand Total</th>
                      <th class="text-secondary">Paid</th>
                      <th class="text-secondary">Due</th>
                      <th class="text-secondary">Payment Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>SL_2213</td>
                      <td>Customer</td>
                      <td>Warehouse</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                    </tr>
                    <tr>
                      <td>SL_2213</td>
                      <td>Customer</td>
                      <td>Warehouse</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                    </tr>
                    <tr>
                      <td>SL_2213</td>
                      <td>Customer</td>
                      <td>Warehouse</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                    </tr>
                    <tr>
                      <td>SL_2213</td>
                      <td>Customer</td>
                      <td>Warehouse</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                    </tr>
                    <tr>
                      <td>SL_2213</td>
                      <td>Customer</td>
                      <td>Warehouse</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                    </tr>
                    <tr>
                      <td>SL_2213</td>
                      <td>Customer</td>
                      <td>Warehouse</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>1002</td>
                      <td>
                        <span class="badges bg-lightgreen text-center"
                          >Completed</span
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer border-0 bg-white p-0 m-0">
              <div class="row align-items-center text-end justify-content-end">
                <div class="col-auto">
                  <p class="subheading col-form-label">1-4 of 15 entries</p>
                </div>
                <div class="col-auto">
                  <div class="new-pagination">
                    <a href="#" class="rounded-start">❮</a>
                    <a href="#" class="rounded-end">❯</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid pt-4 px-4 mb-5 main-footer">
          <div class="bg-footer rounded-top-5 p-3">
            <p class="fw-bold">ITSOL - Inventory and Stock Management</p>
            <div class="row">
              <div class="col-md-6 align-items-center align-middle">
                <div class="d-flex align-items-center">
                  <img src="{{ asset('assets/img/itsol.png') }}" class="img-fluid" alt="" />
                  <div class="ms-2">
                    <p class="m-0">© 2024 Developed by ITSOL</p>
                    <p class="m-0">All right reserved - v2</p>
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

    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
      // Chart Data
      var ctx = document.getElementById("barChart").getContext("2d");
      var myChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: [
            "02 Feb",
            "02 Feb",
            "02 Feb",
            "02 Feb",
            "02 Feb",
            "02 Feb",
            "02 Feb",
          ],
          datasets: [
            {
              label: "Sales",
              data: [12, 19, 3, 5, 2, 3, 7],
              backgroundColor: "rgba(98, 95, 237, 1)",
              // borderColor: "rgba(255, 99, 132, 1)",
              // borderWidth: 1,
            },
            {
              label: "Purchase",
              data: [5, 8, 15, 10, 7, 6, 4],
              backgroundColor: "rgba(155, 153, 243, 1)",
              // borderColor: "rgba(54, 162, 235, 1)",
              // borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
          responsive: true, // Make the chart responsive
          maintainAspectRatio: false, // Disable aspect ratio
        },
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> -->
  </body>
</html>
