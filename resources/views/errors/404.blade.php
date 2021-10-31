@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Error 404</li>
            <li class="breadcrumb-item active">Halaman Tidak Ditemukan</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section>
    <div class="container pt-3 mt-3 mb-5 pb-5 text-center">
        <img src="{{ asset('images/hero-404.png') }}" alt="Halaman tidak ditemukan" />
        <h3 class="text-danger mt-4"><strong>Error 404</strong></h3>
        <p class="mb-5">Halaman Tidak Ditemukan</p>

        <a href="{{ url()->previous() }}" class="btn btn-danger text-white">Kembali</a>
    </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript">
    $('title').html('Error 404 - Halaman Tidak Ditemukan')
</script>
@endpush