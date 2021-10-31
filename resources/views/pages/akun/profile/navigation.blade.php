@php
use Illuminate\Support\Facades\Route;
$route = Route::currentRouteName();
@endphp

<ul id="profile-navigation" class="nav nav-pills nav-fill d-none d-md-flex">
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'personal') ? 'active' : '' }}" href="{{ route('akun.profile.personal') }}">
            <i class="la la-id-card"></i>
            <span>Personal</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pengalaman') ? 'active' : '' }}" href="{{ route('akun.profile.pengalaman') }}">
            <i class="la la-briefcase"></i>
            <span>Pengalaman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pendidikan') ? 'active' : '' }}" href="{{ route('akun.profile.pendidikan') }}">
            <i class="la la-graduation-cap"></i>
            <span>Pendidikan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'keterampilan') ? 'active' : '' }}" href="{{ route('akun.profile.keterampilan') }}">
            <i class="la la-cog"></i>
            <span>Keterampilan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'organisasi') ? 'active' : '' }}" href="{{ route('akun.profile.organisasi') }}">
            <i class="la la-sitemap"></i>
            <span>Organisasi</span>
        </a>
    </li>
</ul>

<ul id="profile-navigation-m" class="nav nav-pills nav-fill d-flex d-md-none">
    @if(strpos($route, 'pengalaman'))
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pengalaman') ? 'active' : '' }}" href="{{ route('akun.profile.pengalaman') }}">
            <i class="la la-briefcase"></i>
            <span>Pengalaman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pendidikan') ? 'active' : '' }}" href="{{ route('akun.profile.pendidikan') }}">
            <i class="la la-graduation-cap"></i>
            <span>Pendidikan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'keterampilan') ? 'active' : '' }}" href="{{ route('akun.profile.keterampilan') }}">
            <i class="la la-cog"></i>
            <span>Keterampilan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'organisasi') ? 'active' : '' }}" href="{{ route('akun.profile.organisasi') }}">
            <i class="la la-sitemap"></i>
            <span>Organisasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'personal') ? 'active' : '' }}" href="{{ route('akun.profile.personal') }}">
            <i class="la la-id-card"></i>
            <span>Personal</span>
        </a>
    </li>
    @elseif(strpos($route, 'pendidikan'))
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pendidikan') ? 'active' : '' }}" href="{{ route('akun.profile.pendidikan') }}">
            <i class="la la-graduation-cap"></i>
            <span>Pendidikan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'keterampilan') ? 'active' : '' }}" href="{{ route('akun.profile.keterampilan') }}">
            <i class="la la-cog"></i>
            <span>Keterampilan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'organisasi') ? 'active' : '' }}" href="{{ route('akun.profile.organisasi') }}">
            <i class="la la-sitemap"></i>
            <span>Organisasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'personal') ? 'active' : '' }}" href="{{ route('akun.profile.personal') }}">
            <i class="la la-id-card"></i>
            <span>Personal</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pengalaman') ? 'active' : '' }}" href="{{ route('akun.profile.pengalaman') }}">
            <i class="la la-briefcase"></i>
            <span>Pengalaman</span>
        </a>
    </li>
    @elseif(strpos($route, 'keterampilan'))
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'keterampilan') ? 'active' : '' }}" href="{{ route('akun.profile.keterampilan') }}">
            <i class="la la-cog"></i>
            <span>Keterampilan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'organisasi') ? 'active' : '' }}" href="{{ route('akun.profile.organisasi') }}">
            <i class="la la-sitemap"></i>
            <span>Organisasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'personal') ? 'active' : '' }}" href="{{ route('akun.profile.personal') }}">
            <i class="la la-id-card"></i>
            <span>Personal</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pengalaman') ? 'active' : '' }}" href="{{ route('akun.profile.pengalaman') }}">
            <i class="la la-briefcase"></i>
            <span>Pengalaman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pendidikan') ? 'active' : '' }}" href="{{ route('akun.profile.pendidikan') }}">
            <i class="la la-graduation-cap"></i>
            <span>Pendidikan</span>
        </a>
    </li>
    @elseif(strpos($route, 'organisasi'))
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'organisasi') ? 'active' : '' }}" href="{{ route('akun.profile.organisasi') }}">
            <i class="la la-sitemap"></i>
            <span>Organisasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'personal') ? 'active' : '' }}" href="{{ route('akun.profile.personal') }}">
            <i class="la la-id-card"></i>
            <span>Personal</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pengalaman') ? 'active' : '' }}" href="{{ route('akun.profile.pengalaman') }}">
            <i class="la la-briefcase"></i>
            <span>Pengalaman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pendidikan') ? 'active' : '' }}" href="{{ route('akun.profile.pendidikan') }}">
            <i class="la la-graduation-cap"></i>
            <span>Pendidikan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'keterampilan') ? 'active' : '' }}" href="{{ route('akun.profile.keterampilan') }}">
            <i class="la la-cog"></i>
            <span>Keterampilan</span>
        </a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'personal') ? 'active' : '' }}" href="{{ route('akun.profile.personal') }}">
            <i class="la la-id-card"></i>
            <span>Personal</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pengalaman') ? 'active' : '' }}" href="{{ route('akun.profile.pengalaman') }}">
            <i class="la la-briefcase"></i>
            <span>Pengalaman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'pendidikan') ? 'active' : '' }}" href="{{ route('akun.profile.pendidikan') }}">
            <i class="la la-graduation-cap"></i>
            <span>Pendidikan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'keterampilan') ? 'active' : '' }}" href="{{ route('akun.profile.keterampilan') }}">
            <i class="la la-cog"></i>
            <span>Keterampilan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ strpos($route, 'organisasi') ? 'active' : '' }}" href="{{ route('akun.profile.organisasi') }}">
            <i class="la la-sitemap"></i>
            <span>Organisasi</span>
        </a>
    </li>
    @endif
</ul>

@push('styles')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<style>
    .slick-arrow {
        display: none !important;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#profile-navigation-m').slick({
            infinite: true,
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [{

            }]
        });
    });
</script>
@endpush