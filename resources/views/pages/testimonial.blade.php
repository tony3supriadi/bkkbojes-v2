@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Testimonial</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section class="title">
    <div class="container flex justify-content-between align-items-center">
        <div class="icons-group text-secondary d-flex align-items-center">
            <img src="{{ asset('images/icons/orange/comments-solid.png') }}" class="me-3" />
            <h3 class="fw-bold mb-0">Testimonial</h3>
        </div>

        <div class="col-md-2 mb-md-0 d-flex justify-content-end">
            <div class="dropdown text-right">
                <button class="btn btn-sm dropdown-toggle text-secondary" type="button" id="sort" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ request()->get('sort') ? ucwords(request()->get('sort')) : 'Semua' }}
                    <i class="la la-angle-down ms-1"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="sort">
                    <li><a class="dropdown-item" href="?sort=semua">Semua</a></li>
                    <li><a class="dropdown-item" href="?sort=alumni">Alumni</a></li>
                    <li><a class="dropdown-item" href="?sort=siswa">Siswa</a></li>
                    <li><a class="dropdown-item" href="?sort=umum">Umum</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="pengumuman">
    <div class="container">
        <div class="row flex">
            @foreach($data->items() as $testimoni)
            <div class="column">
                <div class="row align-items-center mb-3">
                    <div class="col-3 col-md-2">
                        <div class="avatar-image avatar-md">
                            @if ($testimoni->personal_photo)
                            <img src="{{ Storage::url('public/uploads/personal/'.$testimoni->personal_photo) }}" alt="{{ $testimoni->personal_nama }}" />
                            @else
                            <div class="user-photo bg-primary text-white mb-2 rounded-circle d-flex align-items-center justify-content-center fw-semibold fs-1" style="width:70px;height:70px">
                                {{ strtoupper(substr($testimoni->personal_nama_depan, 0, 1)) }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-9 col-md-10">
                        <h5 class="text-primary fw-bold mb-2">{{ $testimoni->personal_nama_depan }} {{ $testimoni->personal_nama_belakang }}</h5>
                        <div class="row d-flex justify-items-between">
                            <div class="col-md-4">
                                <div class="icons-group d-flex align-items-center mb-2">
                                    <img src="{{ asset('images/icons/user.png') }}" width="20" height="20" class="me-2" />
                                    <span class="text-secondary">{{ $testimoni->jenis_akun }} {{ $testimoni->tahun_lulus }}</span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="icons-group d-flex align-items-center mb-2">
                                    <img src="{{ asset('images/icons/briefcase-solid.png') }}" width="20" height="20" class="me-2" />
                                    <span class="text-secondary">Bekerja di {{ $testimoni->bekerja_di }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! $testimoni->testimonial !!}
            </div>
            @endforeach
        </div>
        @include('pages.lowongan.partials.pagination')
    </div>
</section>
@endsection