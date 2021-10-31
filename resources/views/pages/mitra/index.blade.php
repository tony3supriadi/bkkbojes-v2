@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Mitra</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section class="title">
    <div class="container text-secondary d-flex align-items-center">
        <img src="{{ asset('images/icons/orange/bullhorn-solid.png') }}" class="me-3" />
        <h2>Mitra Kami</h2>
    </div>
</section>
<section class="mitra">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Box Mitra -->
                @include('pages.mitra.partials.mitra-box')
            </div>
            <div class="col-md-9">
                <!-- Content Mitra -->
                @include('pages.mitra.partials.mitra-content')
            </div>

        </div>
    </div>
</section>
@endsection