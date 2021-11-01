@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lowongan') }}">Lowongan</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lowongan.show', $lowongan->slug) }}">{{ $lowongan->judul }}</a></li>
            <li class="breadcrumb-item active">Berhasil</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section>
    <div class="container pt-3 mt-3 mb-5 pb-5 text-center">
        <h3 class="text-primary mt-4"><strong>Berhasil!</strong></h3>
        <p>Anda berhasil mengirim lamaran.</p>
        <p><img src="{{ asset('images/hero-send.png') }}" alt="sukses" /></p>
        <a href="{{ route('lowongan') }}" role="button" class="btn btn-primary">
            Cari lowongan lagi!
        </a>
    </div>
</section>
@endsection