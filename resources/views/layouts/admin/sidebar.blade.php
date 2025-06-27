<!-- Sidebar -->
<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="">
                {{-- <img src="{{ asset('template/asset/logo.png') }}" width="110" height="32" alt="pandafood"
                class="navbar-brand-image"> --}}
                BPJS 
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu" aria-expanded="false">
                    <span class="avatar avatar-sm"><i class="fa-solid fa-user"></i></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="./profile.html" class="dropdown-item">Profile</a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div> --}}
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <!-- Jurnal Tiket -->
                <li class="nav-item @if(Request::segment(1) == 'journals') active @endif">
                    <a class="nav-link" href="{{ route('journals.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-solid fa-book-open"></i>
                        </span>
                        <span class="nav-link-title">Log Tiket</span>
                    </a>
                </li>

                <!-- Regulation -->
                <li class="nav-item @if(Request::segment(1) == 'regulation') active @endif">
                    <a class="nav-link" href="{{ route('regulation.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-solid fa-file-lines"></i>
                        </span>
                        <span class="nav-link-title">Regulasi</span>
                    </a>
                </li>

                <!-- Modul Kerja -->
                <li class="nav-item @if(Request::segment(1) == 'modul') active @endif">
                    <a class="nav-link" href="{{ route('modul.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-solid fa-diagram-project"></i>
                        </span>
                        <span class="nav-link-title">Modul Kerja</span>
                    </a>
                </li>

                <!-- Modul Kerja -->
                <li class="nav-item @if(Request::segment(1) == 'case-guide') active @endif">
                    <a class="nav-link" href="{{ route('case-guide.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-solid fa-file"></i>
                        </span>
                        <span class="nav-link-title">Panduan Kasus</span>
                    </a>
                </li>

                <!-- Report -->
                <li class="nav-item @if(Request::segment(1) == 'report') active @endif">
                    <a class="nav-link" href="{{ route('report.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <i class="fa-solid fa-chart-line"></i>
                        </span>
                        <span class="nav-link-title">Report</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>