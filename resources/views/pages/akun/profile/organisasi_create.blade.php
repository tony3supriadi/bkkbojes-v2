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
        </div>

        <form action="{{ route('akun.profile.organisasi.store') }}" method="post" class="row">
            @csrf
            <input type="hidden" name="personal_id" value="{{ Auth::guard('personal')->user()->id }}" />

            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="mulai_menjabat">Mulai</label>
                    <input type="date" name="mulai_menjabat" id="mulai_menjabat" data-date-format="DD MMM YYYY" placeholder="Tanggal mulai" value="{{ old('mulai_menjabat') }}" class="form-control @error('mulai_menjabat') is-invalid border-danger @enderror">
                    @error('mulai_menjabat')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="selesai_menjabat">Selesai</label>
                    <input type="date" name="selesai_menjabat" data-date-format="DD MMM YYYY" placeholder="Tanggal selesai" id="selesai_menjabat" value="{{ old('selesai_menjabat') }}" class="form-control @error('selesai_menjabat') is-invalid border-danger @enderror" @if(old('masih_menjabat')) readonly @endif>

                    <div class="form-check">
                        <input class="form-check-input" name="masih_menjabat" type="checkbox" value="1" id="masih_menjabat" @if(old('masih_menjabat')) checked @endif>
                        <label class="form-check-label" for="masih_menjabat">
                            Masih Menjabat
                        </label>
                    </div>

                    @error('selesai_menjabat')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group mb-3">
                    <label for="posisi_jabatan">Posisi Jabatan</label>
                    <input type="text" name="posisi_jabatan" id="posisi_jabatan" value="{{ old('posisi_jabatan') }}" class="form-control @error('posisi_jabatan') is-invalid border-danger @enderror" />
                    @error('posisi_jabatan')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nama_organisasi">Nama Organisasi</label>
                    <input type="text" name="nama_organisasi" id="nama_organisasi" value="{{ old('nama_organisasi') }}" class="form-control @error('nama_organisasi') is-invalid border-danger @enderror" />
                    @error('nama_organisasi')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mx-0">
                <div class="col-12 text-end border-top py-3 mt-3 px-0">
                    <a href="{{ route('akun.profile.organisasi') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-save me-1"></i>Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function() {
        $('input[name="masih_aktif"]').on('click', function() {
            if ($(this).is(':checked')) {
                $('#tahun_berakhir').val('');
                $('#tahun_berakhir').attr('readonly', 'readonly');
            } else {
                $('#tahun_berakhir').removeAttr('readonly');
            }
        });
    });
</script>
@endpush