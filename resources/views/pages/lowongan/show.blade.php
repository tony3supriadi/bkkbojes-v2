@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lowongan') }}">Lowongan</a></li>
            <li class="breadcrumb-item active">{{ $lowongan->judul }}</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
@if(Auth::guard('personal')->check())
<section class="daftar-lowongan">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-md-9">
                <!-- Deskripsi Detail -->
                @include('pages.lowongan.partials.deskripsi-lowongan')
            </div>
            <div class="col-md-3">
                <!-- Profil Perusahaan -->
                @include('pages.lowongan.partials.profil-perusahaan-box')
            </div>
        </div>
    </div>
</section>
@else
@include('components.errors.halaman_forbiden')
@endif
@endsection