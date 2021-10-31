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
            <li class="breadcrumb-item d-none d-md-inline-block"><a href="{{ route('akun.profile.personal') }}">Profil Saya</a></li>
            <li class="breadcrumb-item active">Pengalaman</li>
        </ol>
    </div>
</nav>
@endsection

@section('account-content')
<div class="card card-body p-0">
    @include('pages.akun.profile.navigation')

    <div class="account-content">
        <div class="page-title d-flex justify-content-between">
            <h4 class="d-inline-block">
                <i class="la la-briefcase text-primary"></i>
                <span>Pengalaman Kerja</span>
            </h4>

            <a href="{{ route('akun.profile.pengalaman.create') }}">
                <i class="la la-plus-circle me-2"></i>Tambah
            </a>
        </div>

        @if (count($pengalaman))
        <div class="py-4">
            @foreach($pengalaman as $key => $val)
            <div class="row mb-5">
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


                    <!-- <div class="row py-1">
                        <div class="col-md-4 text-secondary mb-1"><strong>Jabatan</strong></div>
                        <div class="col-md-8">{{ $val->jabatan ? $val->jabatan : '-' }}</div>
                    </div>

                    <div class="row py-1">
                        <div class="col-md-4 text-secondary mb-1"><strong>Bidang Pekerjaan</strong></div>
                        <div class="col-md-8">{{ $val->bidang_pekerjaan ? $val->bidang_pekerjaan : '-' }}</div>
                    </div>

                    <div class="row py-1 mb-md-4">
                        <div class="col-md-4 text-secondary"><strong>Gaji Bulanan</strong></div>
                        <div class="col-md-8">{{ $val->gaji ? 'Rp' . number_format($val->gaji) . ',-' : '-' }}</div>
                    </div>

                    <div class="row py-1 mb-md-2">
                        <div class="col-12 text-secondary mb-1"><strong>Deskripsi Pekerjaan :</strong></div>
                        <div class="col-12">
                            {!! $val->deskripsi_pekerjaan ? $val->deskripsi_pekerjaan : '-' !!}
                        </div>
                    </div>

                    <div class="row py-1">
                        <div class="col-12 text-secondary mb-1"><strong>Tools yang Digunakan :</strong></div>
                        <div class="col-12">
                            {!! $val->tools ? $val->tools : '-' !!}
                        </div>
                    </div> -->
                </div>
                <div class="col-md-12 text-end">
                    <hr />
                    <a href="{{ route('akun.profile.pengalaman.edit', encrypt($val->id)) }}" class="btn btn-outline-secondary btn-sm"><i class="la la-edit mr-1"></i>Ubah</a>
                    <a href="#" onclick="deleted('{{ $val->id }}')" class="btn btn-danger text-white btn-sm"><i class="la la-trash mr-1"></i>Hapus</a>
                </div>
            </div>

            <form action="{{ route('akun.profile.pengalaman.destroy', encrypt($val->id)) }}" id="form-delete-{{ $val->id }}" method="post">
                @csrf
                @method('delete')
            </form>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="empty-data">
                    <div class="text-center">
                        <i class="la la-briefcase fa-5x"></i>
                        <h5 class="m-0">PENGALAMAN KERJA BELUM ADA</h5>
                        <p class="m-0">Silahkan tambahkan untuk pengalaman kerjamu yah!!</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('/vendors/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
<script src="{{ asset('/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript">
    function deleted(id) {
        Swal.fire({
            title: 'Hapus Data Pengalaman?',
            text: "Pengalaman kerja yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF5E7B',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#form-delete-${id}`).submit();
            }
        })
    }
</script>
@endpush