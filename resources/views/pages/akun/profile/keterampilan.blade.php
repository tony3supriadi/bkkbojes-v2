@extends('pages.akun.akun')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.profile.personal') }}">Akun</a></li>
            <li class="breadcrumb-item d-none d-md-inline-block"><a href="{{ route('akun.profile.personal') }}">Profil Saya</a></li>
            <li class="breadcrumb-item active">Keterampilan</li>
        </ol>
    </div>
</nav>
@endsection

@section('account-content')
<div class="card card-body p-0">
    @include('pages.akun.profile.navigation')

    <div class="account-content">
        <div class="page-title d-flex justify-content-between">
            <h4 class="d-inline-block">
                <i class="la la-cog text-primary"></i>
                <span>Keterampilan / Skill</span>
            </h4>

            <a href="{{ route('akun.profile.keterampilan.edit') }}">
                @if(count($keterampilan))
                <i class="la la-edit me-2"></i>Ubah
                @else
                <i class="la la-plus-circle me-2"></i>Tambah
                @endif
            </a>
        </div>

        @if (count($keterampilan))
        <div class="py-3">
            @if($mahir)
            <div class="row">
                <div class="col-md-2">
                    <p class="text-muted m-0">Mahir</p>
                </div>
                <div class="col-md-10">
                    <ul>
                        @foreach($keterampilan as $mahir)
                        @if ($mahir->prosentase == 100)
                        <li>{{ $mahir->skill }}</li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            @if($menengah)
            <hr />
            <div class="row">
                <div class="col-md-2">
                    <p class="text-muted m-0">Menengah</p>
                </div>
                <div class="col-md-10">
                    <ul>
                        @foreach($keterampilan as $mahir)
                        @if ($mahir->prosentase == 75)
                        <li>{{ $mahir->skill }}</li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            @if($pemula)
            <hr />
            <div class="row">
                <div class="col-md-2">
                    <p class="text-muted m-0">Pemula</p>
                </div>
                <div class="col-md-10">
                    <ul>
                        @foreach($keterampilan as $mahir)
                        @if ($mahir->prosentase == 60)
                        <li>{{ $mahir->skill }}</li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="empty-data">
                    <div class="text-center">
                        <i class="la la-briefcase fa-5x"></i>
                        <h5 class="m-0">KEMAMPUAN / SKILL BELUM ADA</h5>
                        <p class="m-0">Silahkan tambahkan untuk kamampuanmu yah!!</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection