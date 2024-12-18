<!-- Sidebar Start -->
<div class="sidebar pb-3">
    <nav class="navbar navbar-light">
        @if(Auth::user()->type == 'admin')
            <a href="{{ route('admin') }}" class="navbar-brand ms-3">
        @elseif(Auth::user()->type == 'trainee')
            <a href="{{ route('trainee') }}" class="navbar-brand ms-3">
        @elseif(Auth::user()->type == 'trainer')
            <a href="{{ route('trainer') }}" class="navbar-brand ms-3">
        @endif
            <img src="{{ asset('assets/img/SOPS.png') }}" class="img-fluid me-2" alt="" />
        </a>
        <div class="navbar-nav">
            @if(Auth::user()->type == 'admin')
                <a href="{{ route('admin') }}" class="nav-item nav-link {{ request()->is('trainee') ? 'active' : '' }} text-center border-top">
            @elseif(Auth::user()->type == 'trainee')
                <a href="{{ route('trainee') }}" class="nav-item nav-link {{ request()->is('trainee') ? 'active' : '' }} text-center border-top">
            @elseif(Auth::user()->type == 'trainer')
                <a href="{{ route('trainer') }}" class="nav-item nav-link {{ request()->is('trainee') ? 'active' : '' }} text-center border-top">
            @endif
                <i class="bi bi-house-up-fill"></i>
                <p class="pt-1 mb-0">Dashboard</p>
            </a>
        </div>
    </nav>
</div>
<div class="positon-relative sidebar-ul">

</div>
