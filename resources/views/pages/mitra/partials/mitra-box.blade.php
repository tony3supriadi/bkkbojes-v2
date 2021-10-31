@php
use App\Models\Mitra;

use App\Models\Wilayah;
$wilayah = new Wilayah();

$semua_mitra = Mitra::where('publish', '=', 1)->inRandomOrder()->get();
$bumn_mitra = Mitra::where('publish', '=', 1)->where('badan_usaha', '=', 'BUMN')->inRandomOrder()->get();
$swasta_mitra = Mitra::where('publish', '=', 1)->where('badan_usaha', '=', 'Swasta')->inRandomOrder()->get();
$asing_mitra = Mitra::where('publish', '=', 1)->where('badan_usaha', '=', 'Asing')->inRandomOrder()->get();
@endphp

<div class="card box-tabs border-0">
    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab" aria-controls="semua" aria-selected="true">Semua
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="bumn-tab" data-bs-toggle="tab" data-bs-target="#bumn" type="button" role="tab" aria-controls="bumn" aria-selected="false">BUMN
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="swasta-tab" data-bs-toggle="tab" data-bs-target="#swasta" type="button" role="tab" aria-controls="swasta" aria-selected="false">Swasta
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="asing-tab" data-bs-toggle="tab" data-bs-target="#asing" type="button" role="tab" aria-controls="asing" aria-selected="false">Asing
            </button>
        </li>
    </ul>

    <div class="tab-content bg-gray slimscroll" id="tabContent">
        <div class="tab-pane fade show active p-3" id="semua" role="tabpanel" aria-labelledby="home-tab">
            @if (count($semua_mitra))
            @foreach($semua_mitra as $mitra)
            <a href="{{ url('/daftar-mitra/' . $mitra->slug) }}" class="text-decoration-none">
                <div class="card card-body mb-2 p-2 border-0 shadow-sm">
                    <div class="box-sidebar pb-0 mb-2 border-0">
                        <div class="row">
                            <div class="col-2 me-5 col-md-1 sidebar-logo">
                                <img src="{{ Storage::url('public/uploads/mitra/'.$mitra->logo) }}" class="me-2 border rounded" width="60px" height="60px" />
                            </div>
                            <div class="col-8 col-md-8">
                                {{ $mitra->nama }}
                                <div class="sidebar-description d-flex align-items-center">
                                    {{ $wilayah->getName($mitra->kabupaten) }}, {{ $wilayah->getName($mitra->provinsi) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-sidebar-footer d-flex justify-content-between">
                        <div class="icon-group d-flex align-items-center" style="font-size:10px">
                            <span class="la la-industry me-2" style="font-size:16px"></span>
                            {{ $mitra->bidang_usaha }}
                        </div>
                        <span class="rounded-pill ms-2 py-1 px-2" style="border:1px solid #1BC3F7;color:#1BC3F7;font-size:12px">
                            {{ $mitra->badan_usaha }}
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
            @else
            <div class="card card-body text-center border-0 shadow-sm mb-3">
                <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
                <p class="text-muted">BELUM ADA DAFTAR MITRA</p>
            </div>
            @endif
        </div>
        <div class="tab-pane fade p-3" id="bumn" role="tabpanel" aria-labelledby="profile-tab">
            @if (count($bumn_mitra))
            @foreach($bumn_mitra as $mitra)
            <div class="card card-body mb-2 p-2 border-0 shadow-sm">
                <div class="box-sidebar">
                    <div class="row">
                        <div class="col-2 me-5 col-md-1 sidebar-logo">
                            <img src="{{ Storage::url('public/uploads/mitra/'.$mitra->logo) }}" class="me-3" width="60px" height="60px" />
                        </div>
                        <div class="col-8 col-md-8">
                            {{ $mitra->nama }}
                            <div class="sidebar-description d-flex align-items-center">
                                {{ $wilayah->getName($mitra->kabupaten) }}, {{ $wilayah->getName($mitra->provinsi) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-sidebar-footer d-flex justify-content-between">
                    <div class="icon-group d-flex align-items-center">
                        <span class="la la-industry me-2"></span>
                        {{ $mitra->bidang_usaha }}
                    </div>
                    <span class="btn btn-outline-info btn-sm rounded-pill py-0">
                        {{ $mitra->badan_usaha }}
                    </span>
                </div>
            </div>
            @endforeach
            @else
            <div class="card card-body text-center border-0 shadow-sm mb-3">
                <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
                <p class="text-muted">BELUM ADA DAFTAR MITRA</p>
            </div>
            @endif
        </div>
        <div class="tab-pane fade p-3" id="swasta" role="tabpanel" aria-labelledby="contact-tab">
            @if (count($swasta_mitra))
            @foreach($swasta_mitra as $mitra)
            <div class="card card-body mb-2 p-2 border-0 shadow-sm">
                <div class="box-sidebar">
                    <div class="row">
                        <div class="col-2 me-5 col-md-1 sidebar-logo">
                            <img src="{{ Storage::url('public/uploads/mitra/'.$mitra->logo) }}" class="me-3" width="60px" height="60px" />
                        </div>
                        <div class="col-8 col-md-8">
                            {{ $mitra->nama }}
                            <div class="sidebar-description d-flex align-items-center">
                                {{ $wilayah->getName($mitra->kabupaten) }}, {{ $wilayah->getName($mitra->provinsi) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-sidebar-footer d-flex justify-content-between">
                    <div class="icon-group d-flex align-items-center">
                        <span class="la la-industry me-2"></span>
                        {{ $mitra->bidang_usaha }}
                    </div>
                    <span class="btn btn-outline-info btn-sm rounded-pill py-0">
                        {{ $mitra->badan_usaha }}
                    </span>
                </div>
            </div>
            @endforeach
            @else
            <div class="card card-body text-center border-0 shadow-sm mb-3">
                <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
                <p class="text-muted">BELUM ADA DAFTAR MITRA</p>
            </div>
            @endif
        </div>
        <div class="tab-pane fade p-3" id="asing" role="tabpanel" aria-labelledby="contact-tab">
            @if (count($asing_mitra))
            @foreach($asing_mitra as $mitra)
            <div class="card card-body mb-2 p-2 border-0 shadow-sm">
                <div class="box-sidebar">
                    <div class="row">
                        <div class="col-2 me-5 col-md-1 sidebar-logo">
                            <img src="{{ Storage::url('public/uploads/mitra/'.$mitra->logo) }}" class="me-3" width="60px" height="60px" />
                        </div>
                        <div class="col-8 col-md-8">
                            {{ $mitra->nama }}
                            <div class="sidebar-description d-flex align-items-center">
                                {{ $wilayah->getName($mitra->kabupaten) }}, {{ $wilayah->getName($mitra->provinsi) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-sidebar-footer d-flex justify-content-between">
                    <div class="icon-group d-flex align-items-center">
                        <span class="la la-industry me-2"></span>
                        {{ $mitra->bidang_usaha }}
                    </div>
                    <span class="btn btn-outline-info btn-sm rounded-pill py-0">
                        {{ $mitra->badan_usaha }}
                    </span>
                </div>
            </div>
            @endforeach
            @else
            <div class="card card-body text-center border-0 shadow-sm mb-3">
                <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
                <p class="text-muted">BELUM ADA DAFTAR MITRA</p>
            </div>
            @endif
        </div>
    </div>
</div>