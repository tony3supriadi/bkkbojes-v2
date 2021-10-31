@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('daftar') }}">Daftar</a></li>
            <li class="breadcrumb-item active">Konformasi</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section id="register-success-page">
    <div class="container text-center">
        <img src="{{ asset('images/hero-mail.png') }}" alt="Konfirmasi E-Mail" />
        <h3 class="text-primary mt-4">Konfirmasi E-Mail</h3>
        <p class="mb-5 text-danger">Mohon maaf link konfirmasi sudah kadaluarsa, dimohon untuk kirim ulang konfirmasi.</p>

        <!-- <p class="text-muted text-resend"><small>Kirim ulang <span class="time">60</span> detik</small></p> -->
        <form action="{{ route('verification.resend') }}" method="post">
            @csrf
            <button type="submit" class="btn-resend btn btn-primary">Kirim Ulang Konfirmasi</button>
        </form>
    </div>
</section>
@endsection