<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img width="50" src="{{ asset('assets/img/avatars/logo.png') }}" alt="">
            </span>
            <span class="app-brand-text menu-text fw-bolder ms-2" style="font-size: 40px;">LMS
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Dashboard</span>
        </li>
        <li class="menu-item">
            <a href="{{ url('/home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Profile</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('users.show', Auth::user()->id) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">My Profile</div>
            </a>
        </li>
        @if (Auth::user()->role == 'Admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Admin</span>
            </li>
            <li class="menu-item">
                <a href="{{ url('/users') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Analytics">Data User</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('/DataGuru') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Analytics">Data Guru</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ url('/DataMurid') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Analytics">Data Murid</div>
                </a>
            </li>
        @endif
        @if (Auth::user()->role !== 'Murid')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Guru</span>
            </li>
            <li class="menu-item">
                <a href="{{ url('/materiGuru') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Analytics">Mata Pelajaran</div>
                </a>
            </li>
        @endif
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Murid</span>
        </li>
        @if (Auth::user()->role !== 'Guru')
            <li class="menu-item">
                <a href="{{ url('/materiUser') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Analytics">Materi</div>
                </a>
            </li>
        @endif
        <li class="menu-item">
            <a href="{{ url('/absensi' . '/' . Auth::user()->username) }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Analytics">Absensi</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Authentications</span>
        </li>
        <li class="menu-item">
            <a href="https://wa.me/+6281315113236" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Analytics">Forgot Password</div>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="menu-icon tf-icons bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </a>
        </li>
        <!-- Components -->
    </ul>
</aside>
