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
        <p class="mb-5 text-sedonary">Silahkan buka email dan klik link untuk mengaktivasi akunmu</p>

        <p class="text-muted text-resend"><small>Kirim ulang <span class="time">60</span> detik</small></p>
        <form action="{{ route('verification.resend') }}" method="post">
            @csrf
            <button type="submit" class="btn-resend btn btn-primary d-none">Kirim Ulang Konfirmasi</button>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function() {
        var timer = 60;
        var timerInterval = setInterval(function() {
            timer = timer - 1;
            $('.text-resend .time').html(timer);

            if (timer == 0) {
                $('.text-resend').addClass('d-none');
                $('.btn-resend').removeClass('d-none');
                clearInterval(timerInterval);
            }
        }, 1000)
    });
</script>
@endpush