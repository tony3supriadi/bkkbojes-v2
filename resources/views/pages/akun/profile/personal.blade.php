@php
$wilayah = new App\Models\Wilayah;
@endphp

@extends('pages.akun.akun')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.profile.personal') }}">Akun</a></li>
            <li class="breadcrumb-item d-none d-md-inline-block"><a href="{{ route('akun.profile.personal') }}">Profil Saya</a></li>
            <li class="breadcrumb-item active">Personal</li>
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
                <i class="la la-id-card text-primary"></i>
                <span>Informasi Personal</span>
            </h4>

            <a href="{{ route('akun.profile.personal.edit', encrypt($personal->id)) }}">
                <i class="la la-edit me-2"></i>Edit
            </a>
        </div>

        @if($personal->photo)
        <div class="user-photo mb-2">
            <img src="{{ $personal->photo }}" alt="{{ $personal->nama_depan }}" />
        </div>
        @else
        <div class="user-photo bg-primary text-white mb-2">
            {{ strtoupper(substr($personal->nama_depan, 0, 1)) }}
        </div>
        @endif

        <div class="user-data">
            <div class="row border-bottom py-4 mx-0">
                <div class="col-md-3 field-name px-0">Nama Lengkap</div>
                <div class="col-md-9 px-0">{{ $personal->nama_depan }} {{ $personal->nama_belakang }}</div>
            </div>
            <div class="row border-bottom py-4 mx-0">
                <div class="col-md-3 field-name px-0">Jenis Kelamin</div>
                <div class="col-md-9 px-0">{{ $personal->jenis_kelamin ? $personal->jenis_kelamin : '-' }}</div>
            </div>
            <div class="row border-bottom py-4 mx-0">
                <div class="col-md-3 field-name px-0">No. HP / Whatsapp</div>
                <div class="col-md-9 px-0">{{ $personal->no_hp }}</div>
            </div>
            <div class="row border-bottom py-4 mx-0">
                <div class="col-md-3 field-name px-0">Email</div>
                <div class="col-md-9 px-0">{{ $personal->email }}</div>
            </div>
            <div class="row border-bottom py-4 mx-0">
                <div class="col-md-3 field-name px-0">Alamat</div>
                <div class="col-md-9 px-0">
                    {{ $personal->alamat ? $personal->alamat : '-' }}
                    {{ $personal->desa ? ', ' . $wilayah->getName($personal->desa) : '' }}
                    {{ $personal->kecamatan ? ', Kec. ' . $wilayah->getName($personal->kecamatan) : '' }}
                    {{ $personal->kabupaten ? ', ' . $wilayah->getName($personal->kabupaten) : '' }}
                    {{ $personal->provinsi ? ', ' . $wilayah->getName($personal->provinsi) : '' }}
                    {{ $personal->kodepos ? ', ' . $personal->kodepos : '' }}
                </div>
            </div>
            <div class="row border-bottom py-4 mx-0">
                <div class="col-md-3 field-name px-0">Tempat, Tanggal Lahir</div>
                <div class="col-md-9 px-0">
                    {{ $personal->tempat_lahir ? $personal->tempat_lahir : '-' }}
                    {{ $personal->tanggal_lahir ? ', ' . Carbon\Carbon::parse($personal->tanggal_lahir)->isoFormat('D MMMM Y') : '' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection