<!-- Sidebar Start -->
<div class="sidebar pb-3">
    <nav class="navbar navbar-light">
        <a href="{{ route('trainer') }}" class="navbar-brand ms-3">
            <img src="{{ asset('assets/img/SOPS.png') }}" class="img-fluid me-2" alt="" />
        </a>
        <div class="navbar-nav">
            <a href="{{ route('trainer') }}" class="nav-item nav-link {{ request()->is('trainer') ? 'active' : '' }} text-center border-top">
                <i class="bi bi-house-up-fill"></i>
                <p class="pt-1 mb-0">Dashboard</p>
            </a>
            <a href="{{ route('trainer.courses') }}" class="nav-item nav-link {{ (request()->is('trainer/courses*') || request()->is('trainer/batches*')) ? 'active' : '' }} text-center border-top">
                <i class="bi bi-file-richtext-fill"></i>
                <p class="pt-1 mb-0">My Courses</p>
            </a>
            <a href="{{ route('trainer.students') }}" class="nav-item nav-link {{ (request()->is('trainer/students') || request()->is('trainer/students/tasks*') || request()->is('trainer/tasks/remarks*') || request()->is('trainer/survey*')) ? 'active' : '' }} text-center border-top">
                <i class="bi bi-person-vcard-fill"></i>
                <p class="pt-1 mb-0">Students</p>
            </a>
        </div>
    </nav>
</div>
<div class="positon-relative sidebar-ul">
    
</div>