@extends('admin.layouts.app')

@section('title', 'Daftar Mitra')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-question-circle"></span>
        <span class="text-capitalize">Daftar Mitra</span>
    </h3>
</div>

<div class="card">
    <form action="{{ route('admin.mitra.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.mitra.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Mitra / Perusahaan</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control p-1 @error('logo') is-invalid @enderror">
                @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <select name="lokasi" data-placeholder="" id="lokasi" class="form-control select2 @error('lokasi') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($cities as $item)
                    <option value="{{ $item['nama'] }}" {{ old('lokasi') == $item['nama'] ? 'selected' : '' }}>{{ $item['nama'] }}</option>
                    @endforeach
                </select>
                @error('lokasi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="bidang_usaha">Bidang Usaha</label>
                <select name="bidang_usaha" data-placeholder="" id="bidang_usaha" class="form-control select2 @error('bidang_usaha') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($bidangusaha as $item)
                    <option value="{{ $item->nama }}" {{ old('bidang_usaha') == $item->nama ? 'selected' : '' }}>{{ $item->nama }}</option>
                    @endforeach
                </select>
                @error('bidang_usaha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="badan_usaha">Badan Usaha</label>
                <select name="badan_usaha" data-placeholder="" id="badan_usaha" class="form-control select2 @error('badan_usaha') is-invalid @enderror">
                    <option value=""></option>
                    <option value="BUMN" {{ old('badan_usaha') == "BUMN" ? 'selected' : '' }}>BUMN</option>
                    <option value="Swasta" {{ old('badan_usaha') == "Swasta" ? 'selected' : '' }}>Swasta</option>
                    <option value="Asing" {{ old('badan_usaha') == "Asing" ? 'selected' : '' }}>Asing</option>
                </select>
                @error('badan_usaha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="bentuk_usaha">Bentuk Usaha</label>
                <select name="bentuk_usaha" data-placeholder="" id="bentuk_usaha" class="form-control select2 @error('bentuk_usaha') is-invalid @enderror">
                    <option value=""></option>
                    <option value="Perseorangan" {{ old('bentuk_usaha') == "Perseorangan" ? 'selected' : '' }}>Perseorangan</option>
                    <option value="Firma" {{ old('bentuk_usaha') == "Firma" ? 'selected' : '' }}>Firma</option>
                    <option value="Persekutuan Komanditer (CV)" {{ old('bentuk_usaha') == "Persekutuan Komanditer (CV)" ? 'selected' : '' }}>Persekutuan Komanditer (CV)</option>
                    <option value="Perseroan Terbatas (PT)" {{ old('bentuk_usaha') == "Perseroan Terbatas (PT)" ? 'selected' : '' }}>Perseroan Terbatas (PT)</option>
                    <option value="Perseroan Terbatas Negara (Persero)" {{ old('bentuk_usaha') == "Perseroan Terbatas Negara (Persero)" ? 'selected' : '' }}>Perseroan Terbatas Negara (Persero)</option>
                    <option value="Perusahaan Daerah (PD)" {{ old('bentuk_usaha') == "Perusahaan Daerah (PD)" ? 'selected' : '' }}>Perusahaan Daerah (PD)</option>
                    <option value="Perusahaan Negara Umum (Perum)" {{ old('bentuk_usaha') == "Perusahaan Negara Umum (Perum)" ? 'selected' : '' }}>Perusahaan Negara Umum (Perum)</option>
                    <option value="Perusahaan Negara Jawatan (Perjan)" {{ old('bentuk_usaha') == "Perusahaan Negara Jawatan (Perjan)" ? 'selected' : '' }}>Perusahaan Negara Jawatan (Perjan)</option>
                    <option value="Koperasi" {{ old('bentuk_usaha') == "Koperasi" ? 'selected' : '' }}>Koperasi</option>
                    <option value="Yayasan" {{ old('bentuk_usaha') == "Yayasan" ? 'selected' : '' }}>Yayasan</option>
                </select>
                @error('bentuk_usaha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_karyawan">Jumlah Karyawan</label>
                <input type="text" name="jumlah_karyawan" id="jumlah_karyawan" placeholder="Cth: 1 - 10 orang" value="{{ old('jumlah_karyawan') }}" class="form-control @error('jumlah_karyawan') is-invalid @enderror">
                @error('jumlah_karyawan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="waktu_kerja">Waktu Kerja</label>
                <input type="text" name="waktu_kerja" id="waktu_kerja" placeholder="Cth: Senin - Jumat, Jam 08:00 - 17:00 WIB" value="{{ old('waktu_kerja') }}" class="form-control @error('waktu_kerja') is-invalid @enderror">
                @error('waktu_kerja')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="busana_kerja">Busana Kerja</label>
                <input type="text" name="busana_kerja" id="busana_kerja" placeholder="Cth: Seragam Perusahaan, Batik, Bebas" value="{{ old('busana_kerja') }}" class="form-control @error('busana_kerja') is-invalid @enderror">
                @error('busana_kerja')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kontak">Kontak / Alamat</label>
                <input type="text" name="kontak" id="kontak" placeholder="Cth: Jl Raya Bojongsari Kec. Bojongsari - Desa Bojongsari Purbalingga - Jawa Tengah 53362" value="{{ old('kontak') }}" class="form-control @error('kontak') is-invalid @enderror">
                @error('kontak')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" name="telephone" id="telephone" placeholder="-" value="{{ old('telephone') }}" class="form-control @error('telephone') is-invalid @enderror">
                @error('telephone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" placeholder="-" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="faxmail">Fax-Mail</label>
                <input type="text" name="faxmail" id="faxmail" placeholder="-" value="{{ old('faxmail') }}" class="form-control @error('faxmail') is-invalid @enderror">
                @error('faxmail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="website">Website / Company Profile</label>
                <input type="text" name="website" id="website" placeholder="-" value="{{ old('website') }}" class="form-control @error('website') is-invalid @enderror">
                @error('website')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="profile_perusahaan">Profile Perusahaan / Deskripsi Perusahaan Mitra</label>
                <textarea name="profile_perusahaan" id="profile_perusahaan" class="form-control tinymce @error('profile_perusahaan') is-invalid @enderror">{{ old('profile_perusahaan') }}</textarea>
                @error('profile_perusahaan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-1">
                <input type="checkbox" name="mitra_unggulan" id="mitra_unggulan" value="1" class="mr-2" {{ old('mitra_unggulan') ? 'checked' : '' }}>
                <label for="mitra_unggulan">Centang untuk menjadikan mitra ini unggulan.</label>
            </div>

            <div class="form-group mb-1">
                <input type="checkbox" name="publish" id="publish" value="1" class="mr-2" {{ old('publish') ? 'checked' : '' }}>
                <label for="mitra_unggulan">Publikasikan atau masukan ke draft.</label>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.mitra.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2-bootstrap.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/vendors/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%'
        });

        tinymce.init({
            selector: '.tinymce',
            height: '520px',
            menubar: false,
            plugins: 'lists',
            statusbar: false,
            toolbar: 'bold italic underline | numlist bullist',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:1rem; color: #6e707e }'
        });
    });
</script>
@endpush