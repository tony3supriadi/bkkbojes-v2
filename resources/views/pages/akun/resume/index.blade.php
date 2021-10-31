@php
use App\Models\Wilayah;
$wilayah = new Wilayah();
@endphp

@extends('pages.akun.akun')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.profile.personal') }}">Akun</a></li>
            <li class="breadcrumb-item active">Resume</li>
        </ol>
    </div>
</nav>
@endsection

@section('account-content')
<div class="card card-body">
    <div class="account-content p-0">
        <div class="page-title d-flex justify-content-between">
            <h4 class="d-inline-block">
                <i class="la la-file-alt text-primary"></i>
                <span>Resume Saya</span>
            </h4>

            <div>
                <a class="btn btn-outline-secondary" href="{{ route('akun.resume-download') }}">
                    <i class="la la-download me-md-1"></i>
                    <span class="d-none d-md-inline-block">Unduh</span>
                </a>
                <a class="btn btn-outline-secondary" target="_blank" href="{{ route('akun.resume-stream') }}">
                    <i class="la la-print me-md-1"></i>
                    <span class="d-none d-md-inline-block">Cetak</span>
                </a>
            </div>
        </div>

        <div id="resume-area" class="py-4 px-3">
            <div class="row my-3">
                <div class="col-md-2 d-flex justify-content-center">
                    @if($personal->photo)
                    <div class="user-photo resume-photo">
                        <img src="{{ $personal->photo }}" alt="{{ $personal->nama_depan }}" />
                    </div>
                    @else
                    <div class="user-photo resume-photo bg-primary text-white">
                        {{ strtoupper(substr($personal->nama_depan, 0, 1)) }}
                    </div>
                    @endif
                </div>
                <div class="col-md-9 mt-2 mt-md-0 d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="text-center text-md-start">
                        <h2 class="m-0"><strong>{{ $personal->nama_depan }}</strong></h2>
                        <h3 class="m-0">{{ $personal->nama_belakang }}</h3>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="page-title text-black">
                    <h4 class="d-inline-block">
                        <i class="la la-id-card text-secondary"></i>
                        <span>Informasi Personal</span>
                    </h4>
                </div>

                <div class="d-block ms-1">
                    <div class="row my-2">
                        <div class="col-4"><span class="text-muted">Jenis Kelamin</span></div>
                        <div class="col-8">{{ $personal->jenis_kelamin }}</div>
                    </div>
                    <div class="row my-2">
                        <div class="col-4"><span class="text-muted">Np HP/Whatsapp</span></div>
                        <div class="col-8">{{ $personal->no_hp }}</div>
                    </div>
                    <div class="row my-2">
                        <div class="col-4"><span class="text-muted">Email</span></div>
                        <div class="col-8">{{ $personal->email }}</div>
                    </div>
                    <div class="row my-2">
                        <div class="col-4"><span class="text-muted">Tempat, Tanggal Lahir</span></div>
                        <div class="col-8">{{ $personal->tempat_lahir }}, {{ Carbon\Carbon::parse($personal->tanggal_lahir)->isoFormat('D MMMM Y') }}</div>
                    </div>
                    <div class="row my-2">
                        <div class="col-4"><span class="text-muted">Alamat</span></div>
                        <div class="col-8">
                            {{ $personal->alamat ? $personal->alamat : '-' }}
                            {{ $personal->desa ? ', ' . $wilayah->getName($personal->desa) : '' }}
                            {{ $personal->kecamatan ? ', Kec. ' . $wilayah->getName($personal->kecamatan) : '' }}
                            {{ $personal->kabupaten ? ', ' . $wilayah->getName($personal->kabupaten) : '' }}
                            {{ $personal->provinsi ? ', ' . $wilayah->getName($personal->provinsi) : '' }}
                            {{ $personal->kodepos ? ', ' . $personal->kodepos : '' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="page-title text-black">
                    <h4 class="d-inline-block">
                        <i class="la la-briefcase text-secondary"></i>
                        <span>Pengalaman Kerja</span>
                    </h4>
                </div>

                @foreach($pengalaman as $key => $val)
                <div class="row mb-4">
                    <div class="col-md-4">
                        <p class="text-secondary m-0"><strong>{{ Carbon\Carbon::parse($val->tanggal_mulai)->isoFormat('MMM Y') }} - {{ $val->masih_bekerja ? "Sekarang" : Carbon\Carbon::parse($val->tanggal_selesai)->isoFormat('MMM Y') }}</strong></p>
                        <p class="text-muted m-0">
                            @php
                            $start = date_create($val->tanggal_mulai);
                            $end = date_create($val->masih_bekerja ? date('Y-m-d') : $val->tanggal_selesai);
                            $diff = date_diff($end, $start);
                            print($diff->y . " Tahun " . $diff->m . " Bulan")
                            @endphp
                        </p>
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-secondary mb-3"><strong>{{ $val->bekerja_sebagai }}</strong></h5>

                        <p class="text-muted m-0"><i class="la la-building me-2"></i> {{ $val->nama_perusahaan }}</p>
                        <p class="text-muted m-0"><i class="la la-map-marker me-2"></i> {{ $wilayah->getName($val->kabupaten) }}, {{ $wilayah->getName($val->provinsi) }}, Indonesia</p>
                        <p class="text-muted m-0"><i class="la la-industry me-2"></i> {{ $val->bidang_usaha }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row my-4">
                <div class="page-title text-black">
                    <h4 class="d-inline-block">
                        <i class="la la-graduation-cap text-secondary"></i>
                        <span>Riwayat Pendidikan</span>
                    </h4>
                </div>

                @foreach($pendidikan as $key => $val)
                <div class="row mb-4">
                    <div class="col-md-4">
                        <p class="text-secondary m-0"><strong>{{ $val->bulan_mulai }} {{ $val->tahun_mulai }} - {{ $val->masih_sekolah ? 'Sekarang' : $val->bulan_selesai . ' ' .$val->tahun_selesai }}</strong></p>
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-secondary mb-3"><strong>{{ $val->nama_sekolah }}</strong></h5>

                        <div class="mb-2">
                            <p class="text-muted m-0"><i class="la la-map-marker me-2"></i>{{ $wilayah->getName($val->kabupaten) }}, {{ $wilayah->getName($val->provinsi) }}, Indonesia</p>
                            <p class="text-muted m-0"><i class="la la-graduation-cap me-2"></i>{{ $val->jenjang_pendidikan }}</p>
                            <p class="text-muted m-0"><i class="las la-swatchbook me-2"></i>{{ $val->jurusan }}</p>
                            <p class="text-muted m-0"><i class="las la-clipboard-list me-2"></i>{{ $val->nilai_akhir }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row my-4">
                <div class="page-title text-black">
                    <h4 class="d-inline-block">
                        <i class="la la-cog text-secondary"></i>
                        <span>Keterampilan</span>
                    </h4>
                </div>

                @if($mahir)
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted m-0">Mahir</p>
                    </div>
                    <div class="col-md-8">
                        <ul>
                            @foreach($keterampilan as $mahir)
                            @if ($mahir->prosentase == 100)
                            <li>{{ $mahir->skill }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if($menengah)
                <hr />
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted m-0">Menengah</p>
                    </div>
                    <div class="col-md-8">
                        <ul>
                            @foreach($keterampilan as $mahir)
                            @if ($mahir->prosentase == 75)
                            <li>{{ $mahir->skill }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @if($pemula)
                <hr />
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted m-0">Pemula</p>
                    </div>
                    <div class="col-md-8">
                        <ul>
                            @foreach($keterampilan as $mahir)
                            @if ($mahir->prosentase == 60)
                            <li>{{ $mahir->skill }}</li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>

            <div class="row my-4">
                <div class="page-title text-black">
                    <h4 class="d-inline-block">
                        <i class="la la-sitemap text-secondary"></i>
                        <span>Pengalaman Organisasi</span>
                    </h4>
                </div>

                @foreach($organisasi as $key => $val)
                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted m-0">{{ $val->tahun_mulai }} - {{ $val->masih_aktif ? 'Sekarang' : $val->tahun_berakhir }}</p>
                    </div>
                    <div class="col-md-8">
                        <p class="mb-0">{{ $val->posisi_jabatan }}</p>
                        <p class="mb-0 text-muted">{{ $val->nama_organisasi }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection