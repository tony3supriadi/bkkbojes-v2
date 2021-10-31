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
            <li class="breadcrumb-item active">Pendidikan</li>
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
                <i class="la la-graduation-cap text-primary"></i>
                <span>Riwayat Pendidikan</span>
            </h4>

            <a href="{{ route('akun.profile.pendidikan.create') }}">
                <i class="la la-plus-circle me-2"></i>Tambah
            </a>
        </div>

        @if (count($pendidikan))
        <div class="py-4">
            @foreach($pendidikan as $key => $val)
            <div class="row mb-5">
                <div class="col-md-4">
                    <p class="text-secondary m-0"><strong>{{ $val->bulan_mulai }} {{ $val->tahun_mulai }} - {{ $val->masih_sekolah ? 'Sekarang' : $val->bulan_selesai . ' ' .$val->tahun_selesai }}</strong></p>
                </div>
                <div class="col-md-8">
                    <h5 class="text-secondary mb-3"><strong>{{ $val->nama_sekolah }}</strong></h5>

                    <div class="mb-2">
                        <p class="text-muted m-0"><i class="la la-map-marker me-2"></i>{{ $wilayah->getName($val->kabupaten) }}, {{ $wilayah->getName($val->provinsi) }}, Indonesia</p>
                        <p class="text-muted m-0"><i class="la la-graduation-cap me-2"></i> {{ $val->jenjang_pendidikan }}</p>
                        <p class="text-muted m-0"><i class="las la-swatchbook"></i> {{ $val->jurusan }}</p>
                        <p class="text-muted m-0"><i class="las la-clipboard-list"></i> {{ $val->nilai_akhir }}</p>
                    </div>
                </div>
                <div class="col-md-12 text-end">
                    <hr />
                    <a href="{{ route('akun.profile.pendidikan.edit', encrypt($val->id)) }}" class="btn btn-outline-secondary btn-sm"><i class="la la-edit mr-1"></i>Ubah</a>
                    <a href="#" onclick="deleted('{{ $val->id }}')" class="btn btn-danger text-white btn-sm"><i class="la la-trash mr-1"></i>Hapus</a>

                    <form action="{{ route('akun.profile.pendidikan.destroy', encrypt($val->id)) }}" id="form-delete-{{ $val->id }}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="empty-data">
                    <div class="text-center">
                        <i class="la la-briefcase fa-5x"></i>
                        <h5 class="m-0">RIWAYAT PENDIDIKAN BELUM ADA</h5>
                        <p class="m-0">Silahkan tambahkan untuk riwayat pendidikanmu yah!!</p>
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
            title: 'Hapus Data Pendidikan?',
            text: "Pendidikan yang sudah dihapus tidak bisa dikembalikan!",
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