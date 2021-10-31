@php
use Illuminate\Support\Facades\Route;
use App\Models\Personal;
$route = Route::currentRouteName();
$personal = new Personal();
@endphp

<section id="sidenav" class="card card-body p-0">
    <div class="status p-3">
        <h4 class="title">Kelengkapan Profil</h4>

        @php
        $procentase = $personal->getProfileComplete(Auth::guard('personal')->user()->id);
        @endphp

        <p class="
            {{ $procentase > 75 
                ? 'text-success' : ($procentase > 50 
                    ? 'text-warning' : ($procentase > 25 
                        ? 'text-primary' : 'text-danger')) 
                    }} progress-label">

            {{ $procentase }}%
        </p>
        <div class="progress">
            <div class="progress-bar {{ $procentase > 75 
                ? 'bg-success' : ($procentase > 50 
                    ? 'bg-warning' : ($procentase > 25 
                        ? 'bg-primary' : 'bg-danger')) 
                    }}" role="progressbar" style="width: {{ $procentase }}%" aria-valuenow="{{ $procentase }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <p class="description">
            @if ($procentase > 75)
            Selamat anda sudah bisa download resume dan mengajukan lamaran.
            @elseif($procentase > 50)
            Tinggal sedikit lagi, dan bisa mencari lowongan kerjaan.
            @elseif($procentase > 25)
            Masih belum lengkap, segera lengkapi profilmu yah!
            @else
            Lengkapi profilmu agar dapat mengajukan lamaran kerja
            @endif
        </p>
    </div>

    <ul class="navigation list-group list-group-flush">
        <li class="list-group-item {{ strpos($route, 'profile') ? 'active' : '' }}">
            <a href="{{ route('akun.profile.personal') }}" class="list-group-link">
                <i class="la la-user"></i>
                <span>Profil Saya</span>
            </a>
        </li>
        <li class="list-group-item {{ strpos($route, 'resume') ? 'active' : '' }}">
            <a href="{{ route('akun.resume') }}" class="list-group-link">
                <i class="la la-file-alt"></i>
                <span>Resume</span>
            </a>
        </li>
        <li class="list-group-item {{ strpos($route, 'pemberitahuan') ? 'active' : '' }}">
            <a href="{{ route('akun.pemberitahuan') }}" class="list-group-link">
                <i class="la la-bell"></i>
                <span>Pemberitahuan</span>
            </a>
        </li>
        <li class="list-group-item {{ strpos($route, 'lowongan-tersimpan') ? 'active' : '' }}">
            <a href="{{ route('akun.lowongan-tersimpan') }}" class="list-group-link">
                <i class="la la-bookmark"></i>
                <span>Lowongan Tersimpan</span>
            </a>
        </li>
        <li class="list-group-item {{ strpos($route, 'lamaran-terkirim') ? 'active' : '' }}">
            <a href="{{ route('akun.lamaran-terkirim') }}" class="list-group-link">
                <i class="la la-paper-plane"></i>
                <span>Lamaran Terkirim</span>
            </a>
        </li>
        <li class="list-group-item {{ strpos($route, 'latihan-tes') ? 'active' : '' }}">
            <a href="{{ route('akun.latihan-tes') }}" class="list-group-link">
                <i class="la la-puzzle-piece"></i>
                <span>Latihan Tes</span>
            </a>
        </li>
    </ul>

    <ul class="navigation list-group list-group-flush mb-0">
        <li class="list-group-item">
            <a href="" class="list-group-link">
                <i class="la la-sign-out-alt"></i>
                <span>Log out</span>
            </a>
        </li>
    </ul>
</section>