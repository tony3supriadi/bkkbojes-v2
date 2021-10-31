@php
use Illuminate\Support\Facades\Route;
$route = Route::currentRouteName();
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-transparent @if($route != 'home') shadow-sm mb-3 @endif">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-brand.png') }}" class="logo" alt="Logo SMK Negeri 1 Bojongsari">
        </a>

        <ul class="navbar-nav mx-auto mt-2 mt-lg-0 d-none d-md-flex">
            <li class="nav-item active">
                <a href="{{ route('home') }}" class="nav-link {{ $route == 'home' ? 'active' : '' }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('lowongan') }}" class="nav-link {{ $route == 'lowongan' ? 'active' : '' }}">Lowongan</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pengumuman') }}" class="nav-link {{ $route == 'pengumuman' ? 'active' : '' }}">Pengumuman</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link {{ $route == 'daftar-mitra' || $route == 'testimonial' || $route == 'faq' ? 'active' : '' }} dropdown-toggle" href="#" id="navigation-lainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Lainnya
                    <i class="las la-angle-down"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navigation-lainnya">
                    <a class="dropdown-item {{ $route == 'daftar-mitra' ? 'active' : '' }}" href="{{ route('daftar-mitra') }}">Daftar Mitra</a>
                    <a class="dropdown-item {{ $route == 'testimonial' ? 'active' : '' }}" href="{{ route('testimonial') }}">Testimonial</a>
                    <a class="dropdown-item {{ $route == 'faq' ? 'active' : '' }}" href="{{ route('faq') }}">FAQ</a>
                </ul>
            </li>
        </ul>

        @if(Auth::guard('personal')->user())
        <ul class="navbar-nav mt-2 mt-lg-0 d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle user-profile" href="#" id="navigation-lainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(!Auth::guard('personal')->user()->photo)
                    <div class="photo bg-primary">
                        {{ substr(Auth::guard('personal')->user()->nama_depan, 0, 1) }}
                    </div>
                    <span class="mx-1">
                        {{ Auth::guard('personal')->user()->nama_depan }}
                    </span>
                    <i class="las la-angle-down"></i>
                    @else
                    <div class="photo">
                        <img src="{{ Auth::guard('personal')->user()->photo }}" />
                    </div>
                    <span class="mx-1">
                        {{ Auth::guard('personal')->user()->nama_depan }}
                    </span>
                    <i class="las la-angle-down"></i>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navigation-lainnya">
                    <li><a class="dropdown-item py-2" href="{{ route('akun.profile.personal') }}"><i class="la la-user me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('akun.resume') }}"><i class="la la-file-alt me-2"></i>Resume</a></li>
                    <li><a class="dropdown-item" href="{{ route('akun.pemberitahuan') }}"><i class="la la-bell me-2"></i>Pemberitahuan</a></li>
                    <li><a class="dropdown-item" href="{{ route('akun.lowongan-tersimpan') }}"><i class="la la-bookmark me-2"></i>Lowongan Tersimpan</a></li>
                    <li><a class="dropdown-item" href="{{ route('akun.lamaran-terkirim') }}"><i class="la la-send me-2"></i>Lamaran Terkirim</a></li>
                    <li><a class="dropdown-item" href="{{ route('akun.latihan-tes') }}"><i class="la la-puzzle-piece me-2"></i>Latihan Tes</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href=""><i class="la la-lock me-2"></i>Akun</a></li>
                    <li>
                        <a class="dropdown-item" href="javascript::void()" onclick="$('#logout').submit()">
                            <i class="la la-sign-out-alt me-2"></i>Logout
                        </a>

                        <form method="post" action="{{ route('akun.logout') }}" id="logout">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        @else
        <ul class="navbar-nav mt-2 mt-lg-0 d-none d-md-flex">
            <li class="nav-item mx-1">
                <a class="btn btn-outline-primary" href="{{ route('login') }}">
                    Log in
                </a>
            </li>
            <li class="nav-item mx-1">
                <a class="btn btn-primary" href="{{ route('daftar') }}">
                    Daftar
                </a>
            </li>
        </ul>
        @endif

        <button class="navbar-toggler" type="button" id="navigation-mobile-toggler">
            <span class="navbar-toggler-icon"></span>
            <span class="las la-times d-none" style="font-size:30px"></span>
        </button>

        <ul class="dropdown-menu navigation-mobile">
            <li><a class="dropdown-item {{ $route == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
            <li><a class="dropdown-item {{ $route == 'lowongan' ? 'active' : '' }}" href="{{ route('lowongan') }}">Lowongan</a></li>
            <li><a class="dropdown-item {{ $route == 'pengumuman' ? 'active' : '' }}" href="{{ route('pengumuman') }}">Pengumuman</a></li>
            <li><a class="dropdown-item {{ $route == 'daftar-mitra' ? 'active' : '' }}" href="{{ route('daftar-mitra') }}">Daftar Mitra</a></li>
            <li><a class="dropdown-item {{ $route == 'testimonial' ? 'active' : '' }}" href="{{ route('testimonial') }}">Testimonial</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>

            @if(Auth::guard('personal')->user())
            <li><a class="dropdown-item py-2" href="{{ route('akun.profile.personal') }}"><i class="la la-user me-2"></i>Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('akun.resume') }}"><i class="la la-file-alt me-2"></i>Resume</a></li>
            <li><a class="dropdown-item" href="{{ route('akun.pemberitahuan') }}"><i class="la la-bell me-2"></i>Pemberitahuan</a></li>
            <li><a class="dropdown-item" href="{{ route('akun.lowongan-tersimpan') }}"><i class="la la-bookmark me-2"></i>Lowongan Tersimpan</a></li>
            <li><a class="dropdown-item" href="{{ route('akun.lamaran-terkirim') }}"><i class="la la-send me-2"></i>Lamaran Terkirim</a></li>
            <li><a class="dropdown-item" href="{{ route('akun.latihan-tes') }}"><i class="la la-puzzle-piece me-2"></i>Latihan Tes</a></li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li><a class="dropdown-item" href=""><i class="la la-lock me-2"></i>Akun</a></li>
            <li><a class="dropdown-item" href="javascript::void()" onclick="$('#logout').submit()"><i class="la la-sign-out me-2"></i>Logout</a></li>
            @else
            <li>
                <div class="row mx-1 mb-3 mt-2">
                    <div class="col-6" style="padding-right:.3rem"><a class="btn btn-outline-primary w-100" href="{{ route('login') }}">Login</a></div>
                    <div class="col-6" style="padding-left:.3rem"><a class="btn btn-primary w-100" href="{{ route('daftar') }}">Daftar</a></div>
                </div>
            </li>
            @endif
        </ul>
    </div>
</nav>