<!-- Sidebar Start -->
<div class="sidebar pb-3">
    <nav class="navbar navbar-light">
        <a href="{{ route('admin') }}" class="navbar-brand ms-3">
            <img src="{{ asset('assets/img/SOPS.png') }}" class="img-fluid me-2" alt="" />
        </a>
        <div class="navbar-nav">
            <a href="{{ route('admin') }}" class="nav-item nav-link {{ request()->is('admin') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-grid"></i>
                <p class="pt-1 mb-0">Dashboard</p>
            </a>
            <a href="{{ route('courses.index') }}" class="nav-item nav-link {{ request()->is('admin/courses') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-file-earmark-text"></i>
                <p class="pt-1 mb-0">Courses</p>
            </a>
            <div style="display: none" id="navbar-toggler" class="nav-item nav-link text-center {{ request()->is('admin/courses') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <p class="pt-1 mb-0">Courses</p>
            </div>
        </div>
    </nav>
</div>
<div class="positon-relative sidebar-ul">
    <div id="product" style="display: none">
        <ul class="list-unstyled m-0 rounded-5">
            <li>
                <a href="{{ route('courses.index') }}" class="text-decoration-none nav-item nav-link ">
                    <img src="{{ asset('assets/img/menu.svg') }}" class="img-fluid me-2" alt="" />All Courses
                </a>
            </li>
        </ul>
    </div>
</div>