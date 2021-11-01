@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lowongan') }}">Lowongan</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lowongan.show', $lowongan->slug) }}">{{ $lowongan->judul }}</a></li>
            <li class="breadcrumb-item active">Kirim Lamaran</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section class="py-5">
    <div class="container pt-3 mt-3 mb-5 pb-5 text-center">
        <p><img src="{{ asset('images/hero-confirm.png') }}" alt="Maaf, laman ini masih dalam pengembangan" /></p>
        <h5 class="text-secondary mt-4"><strong>Apakah kamu yakin<br />ingin mengirim lamaran?</strong></h5>
        <form action="{{ route('lowongan.kirim-lamaran.submit', $lowongan->slug) }}" method="post">
            @csrf
            <input type="hidden" name="personal_id" value="{{ Auth::guard('personal')->user()->id }}">
            <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
            <button type="submit" class="btn btn-primary mx-1">
                Ya, kirim lamaran!
            </button>
            <a href="{{ route('lowongan.show', $lowongan->slug) }}" role="button" class="btn bg-light text-muted border mx-1">
                Tidak, batalkan
            </a>
        </form>
    </div>
</section>
@endsection