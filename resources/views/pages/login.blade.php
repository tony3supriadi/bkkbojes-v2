@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Log in</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section id="login-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center d-none d-md-inline-block">
                <img src="{{ asset('/images/hero-03.png') }}" alt="hero-login">
            </div>
            <div class="col-md-5">
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <h3 class="text-primary font-weight-bold text-center text-md-start">Login</h3>
                    <p class="text-secondary font-size-sm text-center text-md-start">Silahkan masukan email dan kata sandi</p>

                    <div class="form-group mb-3">
                        <label for="nama_pengguna">Username atau E-Mail</label>
                        <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control @error('nama_pengguna') is-invalid @enderror" autocomplete="off" autofocus />
                        @error('nama_pengguna')
                        <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="password">Kata Sandi</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-eye-slash"></i>
                                </span>
                            </div>

                            @error('password')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('lupa-sandi') }}" class="forgot-password">Lupa kata sandi?</a>
                        </div>
                    </div>
                    <div class="form-group d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            Log in
                        </button>
                    </div>
                    <p class="text-register text-center text-md-start">Belum punya akun? <a href="{{ route('daftar') }}">Daftar disini</a>.</p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('/js/pages/login.js') }}" type="text/javascript"></script>
@endpush