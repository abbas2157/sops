<!-- Sidebar Start -->
<div class="sidebar pb-3">
    <nav class="navbar navbar-light">
        <a href="{{ route('trainee') }}" class="navbar-brand ms-3">
            <img src="{{ asset('assets/img/SOPS.png') }}" class="img-fluid me-2" alt="" />
        </a>
        <div class="navbar-nav">
            <a href="{{ route('trainee') }}" class="nav-item nav-link {{ request()->is('trainee') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-grid"></i>
                <p class="pt-1 mb-0">Dashboard</p>
            </a>
            <a href="{{ route('trainee.courses') }}" class="nav-item nav-link {{ request()->is('admin/courses') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-file-earmark-text"></i>
                <p class="pt-1 mb-0">Courses</p>
            </a>
        </div>
    </nav>
</div>
<div class="positon-relative sidebar-ul">
    
</div>