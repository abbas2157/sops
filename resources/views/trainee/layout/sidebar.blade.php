<!-- Sidebar Start -->
<div class="sidebar pb-3">
    <nav class="navbar navbar-light">
        <a href="{{ route('trainee') }}" class="navbar-brand ms-3">
            <img src="{{ asset('assets/img/SOPS.png') }}" class="img-fluid me-2" alt="" />
        </a>
        <div class="navbar-nav">
            <a href="{{ route('trainee') }}" class="nav-item nav-link {{ request()->is('trainee') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-house-up-fill"></i>
                <p class="pt-1 mb-0">Dashboard</p>
            </a>
            <a href="{{ route('trainee.courses') }}" class="nav-item nav-link {{ request()->is('trainee/courses*') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-file-richtext-fill"></i>
                <p class="pt-1 mb-0">Courses</p>
            </a>
            <a href="{{ route('trainee.reports') }}" class="nav-item nav-link {{ request()->is('trainee/reports*') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-file-bar-graph-fill"></i>
                <p class="pt-1 mb-0">Reports</p>
            </a>
            <a href="{{ route('trainee.survey') }}" class="nav-item nav-link {{ request()->is('trainee/survey*') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-graph-up"></i>
                <p class="pt-1 mb-0">My Survey</p>
            </a>
        </div>
    </nav>
</div>
<div class="positon-relative sidebar-ul">

</div>
