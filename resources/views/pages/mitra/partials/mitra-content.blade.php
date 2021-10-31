@php
use App\Models\Wilayah;
$wilayah = new Wilayah();
@endphp

<div class="card card-body box-card mb-3">
    <div class="box-content">
        <div class="row ">
            <div class="col-3 col-md-1 px-0 box-content-logo">
                <img src="{{ Storage::url('public/uploads/mitra/'.$mitra->logo) }}" class="border rounded me-3" width="100%" />
            </div>
            <div class="col-6 col-md-9 box-content-title">
                <h4 class="fw-bold mb-0">{{ $mitra->nama }}</h4>
                <div class="row mt-2">
                    <div class="col-md-5">
                        <div class="input-group d-flex align-items-center">
                            <h6 class="mb-0">
                                <span class="la la-industry"></span>
                                <small>{{ strlen($mitra->bidang_usaha) > 28 ? substr($mitra->bidang_usaha, 0, 27) . '..' : $mitra->bidang_usaha }}</small>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group d-flex align-items-center">
                            <h6 class="mb-0"><i class="la la-map-marker"></i>
                                <small>{{ $wilayah->getName($mitra->kabupaten) }}, {{ $wilayah->getName($mitra->provinsi) }}</small>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 col-md-2 text-end">
                <span class="rounded-pill ms-2 py-1 px-2" style="border:1px solid #1BC3F7;color:#1BC3F7;font-size:12px">
                    {{ $mitra->badan_usaha }}
                </span>
            </div>
        </div>
    </div>

    <div class="box-content-body">
        <div class="row m-0">
            <div class="col-md-6 mb-4">
                <div class="row">
                    <div class="col-1 me-2 col-md-1">
                        <img src="{{ asset('images/icons/briefcase-solid.png') }}" />
                    </div>
                    <div class="col-10 col-md-10">
                        <strong>Bentuk Usaha</strong><br>
                        <p>{{ $mitra->bentuk_usaha }}</p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-1 me-2 col-md-1">
                        <img src="{{ asset('images/icons/users-solid.png') }}" />
                    </div>
                    <div class="col-10 col-md-10">
                        <strong>Jumlah Karyawan</strong><br>
                        <p>{{ $mitra->jumlah_karyawan }}</p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-1 me-2 col-md-1">
                        <img src="{{ asset('images/icons/tshirt-solid.png') }}" />
                    </div>
                    <div class="col-10 col-md-10">
                        <strong>Busana Kerja</strong><br>
                        <p>{{ $mitra->busana_kerja }}</p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-1 me-2 col-md-1">
                        <img src="{{ asset('images/icons/clock.png') }}" />
                    </div>
                    <div class="col-10 col-md-10">
                        <strong>Waktu Kerja</strong><br>
                        <p>{{ $mitra->waktu_kerja }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="row">
                    <div class="mb-2">
                        <strong>Kontak</strong><br>
                        {{ $mitra->kontak }}
                    </div>
                    <div class="mb-2">
                        <strong>Telepon</strong><br>
                        <small>{{ $mitra->telephone }}</small>
                    </div>
                    <div class="mb-2">
                        <strong>Website</strong><br>
                        <small>{{ $mitra->website }}</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0">
            <div class="title-profil mb-3">
                <strong>Profil Perusahaan</strong><br>
            </div>
            <div class="content-profil">
                {!! $mitra->profile_perusahaan !!}
            </div>
        </div>
    </div>
</div>