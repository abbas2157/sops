<nav class="navbar navbar-expand border-bottom bg-white navbar-light sticky-top px-4 py-0" style="height: 80px">
    <a href="#" class="navbar-brand d-flex d-lg-none me-4"><h2 class="text-primary mb-0">LOGO</h2></a>
    <a href="#" class="sidebar-toggler text-decoration-none flex-shrink-0 align-items-center d-inline-flex"> <i class="fa fa-bars"></i></a>
    <div class="navbar-nav align-items-center ms-auto">
    <div class="nav-item dropdown">
        <a href="#" class="nav-link" data-bs-toggle="dropdown">
            <i class="fa fa-bell align-items-center d-inline-flex"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0" style="width: 400px;">
            <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">Password changed</h6>
                <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider" />
            <a href="#" class="dropdown-item text-center" >See all notifications</a>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            @if(is_null(Auth::user()->profile_picture))
                <img class="rounded-circle me-lg-2" src="{{ asset('assets/img/user.jpg') }}" alt="" style="width: 40px; height: 40px" />
            @else
                <img class="rounded-circle me-lg-2" src="{{ asset('profile_pictures/'.Auth::user()->profile_picture) }}" alt="" style="width: 40px; height: 40px" />
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
        <a href="{{ route('trainee.profile') }}" class="dropdown-item"><i class="fa-regular fa-user me-2"></i> My Profile</a>
            <a href="{{ route('logout') }}" class="dropdown-item"><i class="fa-solid fa-right-from-bracket me-2"></i> Log Out</a>
        </div>
    </div>
    </div>
</nav>