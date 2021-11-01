@extends('layouts.app')

@section('content')
<section id="hero-banner">
    <div class="container">
        <div class="hero-01 row">
            <div class="col-md-6">
                <p class="subtitle">Website Resmi</p>
                <h2 class="title">Bursa Kerja Khusus<br />SMK Negeri 1 Bojongsari</h2>

                <div class="d-none d-md-block">
                    <a href="{{ asset('daftar') }}" class="btn btn-primary btn-lg btn-register">Daftar Sekarang</a>
                    <p class="login-text d-none d-md-block">Sudah punya akun? silahkan <a href="{{ route('login') }}">login</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/hero-01.png') }}" alt="Hero image BKK SMK Negeri 1 Bojongsari" />
            </div>
            <div class="col-12 d-block d-md-none">
                <a href="{{ asset('daftar') }}" class="btn btn-primary btn-lg btn-register">Daftar Sekarang</a>
                <p class="login-text">Sudah punya akun? silahkan <a href="{{ route('login') }}">login</a></p>
            </div>
        </div>
        <div class="hero-02 row">
            <div class="col-md-6">
                <img src="{{ asset('images/hero-02.png') }}" alt="Hero image BKK SMK Negeri 1 Bojongsari" />
            </div>
            <div class="col-md-6">
                <h2 class="title">Temukan peluang karirmu di sini!</h2>
                <p class="subtitle">Dapatkan informasi lowongan kerja <strong>gratis</strong>, tersedia untuk alumni dan umum</p>
            </div>
        </div>
    </div>
</section>

<section id="how-to">
    <div class="container">
        <div class="row counting">
            <div class="col-md-2 col-4 offset-md-2 offset-0">
                <div class="card card-body">
                    <h3>{{ number_format($jml_lowongan, 0, ',', '.') }}</h3>
                    <p>Lowongan</p>
                </div>
            </div>
            <div class="col-md-2 col-4 offset-md-1 offset-0">
                <div class="card card-body">
                    <h3>{{ number_format($jml_mitra, 0, ',', '.') }}</h3>
                    <p>Perusahaan</p>
                </div>
            </div>
            <div class="col-md-2 col-4 offset-md-1 offset-0">
                <div class="card card-body">
                    <h3>{{ number_format($jml_personal, 0, ',', '.') }}</h3>
                    <p>Pengguna</p>
                </div>
            </div>
        </div>

        <div class="row steps">
            <h3 class="title">Bagaimana Caranya?</h3>
            <p class="subtitle">Ikuti tiga langkah sederhana berikut</p>
        </div>

        <div class="row step-arrow">
            <div class="col-md-2 offset-md-3 arrow-01">
                <img src="{{ asset('images/step-arrow-01.png') }}" />
            </div>
            <div class="col-md-2 offset-md-2 arrow-02">
                <img src="{{ asset('images/step-arrow-02.png') }}" />
            </div>
        </div>

        <div class="row steps py-0">
            <div class="col-md-4 step-item">
                <img src="{{ asset('images/step-01.png') }}" />
                <h3 class="title">Daftar</h3>
                <p class="description">Klik tombol <strong>daftar</strong> dan lengkapi formulir pendaftaran</p>
            </div>
            <div class="col-md-4 step-item">
                <img src="{{ asset('images/step-02.png') }}" />
                <h3 class="title">Cari</h3>
                <p class="description"><strong>Cari</strong> dan temukan lowongan pekerjaanmu yang sesuai</p>
            </div>
            <div class="col-md-4 step-item">
                <img src="{{ asset('images/step-03.png') }}" />
                <h3 class="title">Lamar</h3>
                <p class="description">Ajukan <strong>lamaran</strong> pekerjaan, lalu ikuti prosedur selanjutnya</p>
            </div>
        </div>

        <div class="row steps-m">
            <div class="col-12">
                <div class="row step-item px-2">
                    <div class="col-3 px-0">
                        <img src="{{ asset('images/step-01.png') }}" />
                        <img src="{{ asset('images/step-arrow-03.png') }}" class="step-arrow-m" />
                    </div>
                    <div class="col-9">
                        <h3 class="title">Daftar</h3>
                        <p class="description">Klik tombol <strong>daftar</strong> dan lengkapi formulir pendaftaran</p>
                    </div>
                </div>

                <div class="row step-item px-2">
                    <div class="col-3 px-0">
                        <img src="{{ asset('images/step-02.png') }}" />
                        <img src="{{ asset('images/step-arrow-04.png') }}" class="step-arrow-m" style="margin-left:40px;width:40px !important" />
                    </div>
                    <div class="col-9">
                        <h3 class="title">Cari</h3>
                        <p class="description"><strong>Cari</strong> dan temukan lowongan pekerjaanmu yang sesuai</p>
                    </div>
                </div>

                <div class="row step-item px-2">
                    <div class="col-3 px-0">
                        <img src="{{ asset('images/step-03.png') }}" />
                    </div>
                    <div class="col-9">
                        <h3 class="title">Lamar</h3>
                        <p class="description">Ajukan <strong>lamaran</strong> pekerjaan, lalu ikuti prosedur selanjutnya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="mitra">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">Mitra Kami</h3>
                <p class="subtitle">Kami bekerjasama dengan perusahaan-perusahaan ternama</p>
            </div>
        </div>

        @if (count($daftarMitra))
        <div class="row py-1 pt-md-4 mb-3 justify-content-center">
            @foreach($daftarMitra as $mitra)
            <div class="col-md-3 col-6">
                <a href="{{ route('daftar-mitra.show', $mitra->slug) }}" class="text-decoration-none d-flex justify-content-center">
                    <img src="{{ Storage::url('public/uploads/mitra/'.$mitra->logo) }}" height="80px" alt="{{ $mitra->logo }}" class="my-1">
                </a>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ route('daftar-mitra') }}" class="btn btn-outline-primary">
                    Lihat Selengkapnya
                    <i class="las la-angle-double-right ml-2"></i>
                </a>
            </div>
        </div>
        @else

        <div class="card card-body text-center">
            <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
            <p class="text-muted">BELUM ADA DAFTAR MITRA</p>
        </div>

        @endif
    </div>
</section>

<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">Kata Mereka</h3>
                <p class="subtitle">Pengalaman mereka menggunakan situs ini</p>
            </div>
        </div>

        @if (count($daftarTestimonial))
        <div class="row testimoni-lists d-flex justify-content-center">
            @foreach($daftarTestimonial as $testimonial)
            <div class="col-md-4">
                <div class="testimoni-item">
                    <div class="testimoni-item-image">
                        <img src="{{ Storage::url('public/uploads/personal/'.$testimonial->photo) }}" height="80px" alt="{{ $testimonial->photo }}" class="my-1">
                    </div>
                    <div class="testimoni-item-content">
                        <h3 class="title">{{ $testimonial->nama_depan }} {{ $testimonial->nama_belakang }}</h3>
                        <p class="description">{!! $testimonial->testimonial !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row testimoni-lists-m">
            @foreach($daftarTestimonial as $testimonial)
            <div class="col-md-12">
                <div class="testimoni-item">
                    <div class="testimoni-item-image">
                        <img src="{{ Storage::url('public/uploads/personal/'.$testimonial->photo) }}" height="80px" alt="{{ $testimonial->photo }}" class="my-1">
                    </div>
                    <div class="testimoni-item-content">
                        <h3 class="title">{{ $testimonial->nama_depan }} {{ $testimonial->nama_belakang }}</h3>
                        <p class="description">{!! $testimonial->testimonial !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="card card-body text-center">
            <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
            <p class="text-muted">BELUM ADA TESTIMONIAL</p>
        </div>
        @endif

        <div class="row py-3 py-md-5">
            <div class="col-md-12 text-center">
                <i class="las la-angle-double-down fa-2x text-primary"></i>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12 text-center">
                <a href="{{ route('daftar') }}" class="btn btn-primary mx-1">Daftar Sekarang</a>
                <a href="{{ route('lowongan') }}" class="btn btn-outline-primary mx-1">Cari Lowongan</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<style type="text/css">
    body {
        background-color: #fff;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/inits/slick-carousel.js') }}"></script>
@endpush