<!-- Sidebar Start -->
<div class="sidebar pb-3">
    <nav class="navbar navbar-light">
        <a href="{{ route('admin') }}" class="navbar-brand ms-3">
            <img src="{{ asset('assets/img/SOPS.png') }}" class="img-fluid me-2" alt="" />
        </a>
        <div class="navbar-nav">
            <a href="{{ route('admin') }}" class="nav-item nav-link {{ request()->is('admin') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-house-up-fill"></i>
                <p class="pt-1 mb-0">Dashboard</p>
            </a>
            <div id="navbar-toggler" class="nav-item nav-link text-center {{ request()->is('admin/trainers*') ? 'active' : '' }}">
                <i class="bi bi-person-vcard"></i>
                <p class="pt-1 mb-0">Trainer</p>
            </div>
            <div id="navbar-toggler2" class="nav-item nav-link text-center {{ request()->is('admin/trainees*') ? 'active' : '' }}">
                <i class="bi bi-person-vcard-fill"></i>
                <p class="pt-1 mb-0">Trainee</p>
            </div>
            <a href="{{ route('courses.index') }}" class="nav-item nav-link {{ (request()->is('admin/courses*') || request()->is('admin/steps*') || request()->is('admin/students*')) ? 'active' : '' }} text-center border-top">
                <i class="bi bi-file-richtext-fill"></i>
                <p class="pt-1 mb-0">Courses</p>
            </a>
            <div id="navbar-toggler3" class="nav-item nav-link text-center {{ (request()->is('admin/batches*') || request()->is('admin/batch-students*') || request()->is('admin/class-schedules*') || request()->is('admin/library*')) ? 'active' : '' }}">
                <i class="bi bi-grid-fill"></i>
                <p class="pt-1 mb-0">Batches</p>
            </div>
            <div id="navbar-toggler4" class="nav-item nav-link text-center {{ (request()->is('admin/comments*') || request()->is('admin/reviews*')) ? 'active' : ''  }}">
                <i class="fa-solid fa-bars"></i>
                <p class="pt-1 mb-0">Others</p>
            </div>
            <a href="{{ route('admin.coupons.index') }}" class="nav-item nav-link {{ (request()->is('admin/coupons*')) ? 'active' : '' }} text-center border-top">
                <i class="bi bi-gift"></i>
                <p class="pt-1 mb-0">Coupon</p>
            </a>
            <a href="{{ route('admin.financial-support') }}" class="nav-item nav-link {{ (request()->is('admin/financial-support*')) ? 'active' : '' }} text-center border-top">
                <i class="bi bi-cash-coin"></i>
                <p class="pt-1 mb-0">Financial Support</p>
            </a>
             <a href="{{ route('admin.workshops') }}" class="nav-item nav-link {{ (request()->is('admin/workshops*')) ? 'active' : '' }} text-center border-top">
                <i class="bi bi-person-workspace"></i>
                <p class="pt-1 mb-0">Workshops</p>
            </a>
        </div>
    </nav>
</div>
<div class="positon-relative sidebar-ul">
    <div id="product" style="display: none">
        <ul class="list-unstyled m-0 rounded-5">
            <li>
                <a href="{{ route('trainers.index') }}" class="text-decoration-none nav-item nav-link ">
                    <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Trainers
                </a>
            </li>
            <li>
                <a href="{{ route('trainers.create') }}" class="text-decoration-none nav-item nav-link ">
                    <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Trainer
                </a>
            </li>
        </ul>
    </div>
    <div id="sale" style="display: none">
        <ul class="list-unstyled m-0 rounded-5">
            <li>
                <a href="{{ route('trainees.index') }}" class="text-decoration-none nav-item nav-link ">
                    <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Trainees
                </a>
            </li>
            <li>
                <a href="{{ route('trainees.create') }}" class="text-decoration-none nav-item nav-link ">
                    <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Trainee
                </a>
            </li>
        </ul>
    </div>
    <div id="purchase" style="display: none">
        <ul class="list-unstyled m-0 rounded-5">
            <li>
                <a href="{{ route('admin.batches.index') }}" class="text-decoration-none nav-item nav-link ">
                    <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Batches
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('admin.batches.create') }}" class="text-decoration-none nav-item nav-link ">
                    <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />Create Batch
                </a>
            </li> --}}
        </ul>
    </div>
    <div id="inventory" style="display: none">
        <ul class="list-unstyled m-0 rounded-5">
            <li>
                <a href="{{ route('admin.comments.index') }}" class="text-decoration-none nav-item nav-link ">
                    <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Comments
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reviews.index') }}" class="text-decoration-none nav-item nav-link ">
                    <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Reviews
                </a>
            </li>
        </ul>
    </div>
</div>
