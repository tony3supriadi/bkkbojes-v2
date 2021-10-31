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

        <form action="{{ route('akun.profile.organisasi.update', encrypt($organisasi->id)) }}" method="post" class="row">
            @csrf
            @method('put')
            <input type="hidden" name="personal_id" value="{{ Auth::guard('personal')->user()->id }}" />

            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="tahun_mulai">Tahun Mulai</label>
                    <input type="number" name="tahun_mulai" id="tahun_mulai" value="{{ old('tahun_mulai') ? old('tahun_mulai') : $organisasi->tahun_mulai }}" class="form-control @error('tahun_mulai') is-invalid border-danger @enderror">
                    @error('tahun_mulai')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tahun_berakhir">Tahun Selesai</label>
                    <input type="number" name="tahun_berakhir" id="tahun_berakhir" value="{{ old('tahun_berakhir') ? old('tahun_berakhir') : $organisasi->tahun_berakhir }}" class="form-control @error('tahun_berakhir') is-invalid border-danger @enderror" @if(old('masih_aktif') || $organisasi->masih_aktif) readonly @endif>

                    <div class="form-check">
                        <input class="form-check-input" name="masih_aktif" type="checkbox" value="1" id="masih_aktif" @if(old('masih_aktif') || $organisasi->masih_aktif) checked @endif>
                        <label class="form-check-label" for="masih_aktif">
                            Masih Aktif
                        </label>
                    </div>

                    @error('tahun_berakhir')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group mb-3">
                    <label for="posisi_jabatan">Posisi Jabatan</label>
                    <input type="text" name="posisi_jabatan" id="posisi_jabatan" value="{{ old('posisi_jabatan') ? old('posisi_jabatan') : $organisasi->posisi_jabatan }}" class="form-control @error('posisi_jabatan') is-invalid border-danger @enderror" />
                    @error('posisi_jabatan')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nama_organisasi">Nama Organisasi</label>
                    <input type="text" name="nama_organisasi" id="nama_organisasi" value="{{ old('nama_organisasi') ? old('nama_organisasi') : $organisasi->nama_organisasi }}" class="form-control @error('nama_organisasi') is-invalid border-danger @enderror" />
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