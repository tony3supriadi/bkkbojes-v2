@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Lowongan</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section class="daftar-lowongan">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-md-9">
                <!-- Cari Lowongan -->
                @include('pages.lowongan.partials.cari-lowongan')

                @include('pages.lowongan.partials.lowongan-box')

                @include('pages.lowongan.partials.pagination')
            </div>
            <div class="col-md-3">
                <!-- Pengumuman -->
                @include('pages.lowongan.partials.pengumuman-box')

                <!-- Testimonial -->
                @include('pages.lowongan.partials.testimonial-box')

                <!-- Mitra Kami -->
                @include('pages.lowongan.partials.mitra-box')

                <!-- <div class="card card-body box-card mb-3">
                    <img src="{{ asset('images/banner/alur-ppdb.png') }}">
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection