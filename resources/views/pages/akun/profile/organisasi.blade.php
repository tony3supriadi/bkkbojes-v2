@extends('pages.akun.akun')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.profile.personal') }}">Akun</a></li>
            <li class="breadcrumb-item d-none d-md-inline-block"><a href="{{ route('akun.profile.personal') }}">Profil Saya</a></li>
            <li class="breadcrumb-item active">Organisasi</li>
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
                <i class="la la-sitemap text-primary"></i>
                <span>Pengalaman Organisasi</span>
            </h4>

            <a href="{{ route('akun.profile.organisasi.create') }}">
                <i class="la la-plus-circle me-2"></i>Tambah
            </a>
        </div>

        @if (count($organisasi))
        <div class="py-3">
            @foreach($organisasi as $key => $val)
            <div class="row">
                <div class="col-md-3">
                    <p class="text-muted m-0">{{ $val->tahun_mulai }} - {{ $val->masih_aktif ? 'Sekarang' : $val->tahun_berakhir }}</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-0">{{ $val->posisi_jabatan }}</p>
                    <p class="mb-0 text-muted">{{ $val->nama_organisasi }}</p>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('akun.profile.organisasi.edit', encrypt($val->id)) }}" class="btn btn-outline-secondary btn-sm"><i class="la la-edit mr-1"></i>Ubah</a>
                    <a href="#" onclick="deleted('{{ $val->id }}')" class="btn btn-danger text-white btn-sm"><i class="la la-trash mr-1"></i>Hapus</a>

                    <form action="{{ route('akun.profile.organisasi.destroy', encrypt($val->id)) }}" id="form-delete-{{ $val->id }}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
            <hr />
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="empty-data">
                    <div class="text-center">
                        <i class="la la-briefcase fa-5x"></i>
                        <h5 class="m-0">PENGALAMAN ORGANISASI BELUM ADA</h5>
                        <p class="m-0">Silahkan tambahkan untuk pengalaman organisasimu yah!!</p>
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