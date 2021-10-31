@extends('admin.layouts.app')

@section('title', 'Daftar Mitra')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-industry"></span>
        <span class="text-capitalize">Daftar Mitra</span>
    </h3>

    <div>
        @can('mitra-delete')
        <button type="button" onclick="action_destroy(`{{ route('admin.mitra.destroy', encrypt($mitra->id)) }}`)" class="btn btn-destroy btn-danger">
            <i class="la la-trash"></i> Hapus
        </button>
        @endcan

        @can('mitra-create')
        <a href="{{ route('admin.mitra.create') }}" role="button" class="btn btn-primary">
            <i class="la la-plus-circle"></i> Tambah
        </a>
        @endcan
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.mitra.update', encrypt($mitra->id)) }}" method="post">
        @csrf
        @method('put')

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.mitra.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-save btn-primary">
                        <i class="la la-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Mitra / Perusahaan</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') ? old('nama') : $mitra->nama }}" class="form-control @error('nama') is-invalid @enderror">
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control p-1 @error('logo') is-invalid @enderror">
                <img src="{{ Storage::url('public/uploads/mitra/'.$mitra->logo) }}" height="80px" alt="{{ $mitra->logo }}" class="my-1">
                @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi" data-placeholder="" id="provinsi" class="form-control select2 @error('provinsi') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($provinces as $item)
                    <option value="{{ $item['kode'] }}" {{ old('provinsi') == $item['kode'] ? 'selected' : ($mitra->provinsi == $item['kode'] ? 'selected' : '') }}>{{ $item['nama'] }}</option>
                    @endforeach
                </select>
                @error('provinsi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kabupaten">Kota / Kabupaten <span class="fa fa-spin fa-spinner d-none"></span></label>
                <select name="kabupaten" data-placeholder="" id="kabupaten" class="form-control select2 @error('kabupaten') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($cities as $item)
                    <option value="{{ $item['kode'] }}" {{ old('kabupaten') == $item['kode'] ? 'selected' : ($mitra->kabupaten == $item['kode'] ? 'selected' : '') }}>{{ $item['nama'] }}</option>
                    @endforeach
                </select>
                @error('kabupaten')
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
                    <option value="{{ $item->nama }}" {{ old('bidang_usaha') == $item->nama ? 'selected' : ($mitra->bidang_usaha == $item->nama ? 'selected' : '')  }}>{{ $item->nama }}</option>
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
                    <option value="BUMN" {{ old('badan_usaha') == "BUMN" ? 'selected' : ($mitra->badan_usaha == 'BUMN' ? 'selected' : '') }}>BUMN</option>
                    <option value="Swasta" {{ old('badan_usaha') == "Swasta" ? 'selected' : ($mitra->badan_usaha == 'Swasta' ? 'selected' : '') }}>Swasta</option>
                    <option value="Asing" {{ old('badan_usaha') == "Asing" ? 'selected' : ($mitra->badan_usaha == 'Asing' ? 'selected' : '') }}>Asing</option>
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
                    <option value="Perseorangan" {{ old('bentuk_usaha') == "Perseorangan" ? 'selected' : ($mitra->bentuk_usaha == 'Perseorangan' ? 'selected' : '') }}>Perseorangan</option>
                    <option value="Firma" {{ old('bentuk_usaha') == "Firma" ? 'selected' : ($mitra->bentuk_usaha == 'Firma' ? 'selected' : '') }}>Firma</option>
                    <option value="Persekutuan Komanditer (CV)" {{ old('bentuk_usaha') == "Persekutuan Komanditer (CV)" ? 'selected' : ($mitra->bentuk_usaha == 'Persekutuan Komanditer (CV)' ? 'selected' : '') }}>Persekutuan Komanditer (CV)</option>
                    <option value="Perseroan Terbatas (PT)" {{ old('bentuk_usaha') == "Perseroan Terbatas (PT)" ? 'selected' : ($mitra->bentuk_usaha == 'Perseroan Terbatas (PT)' ? 'selected' : '') }}>Perseroan Terbatas (PT)</option>
                    <option value="Perseroan Terbatas Negara (Persero)" {{ old('bentuk_usaha') == "Perseroan Terbatas Negara (Persero)" ? 'selected' : ($mitra->bentuk_usaha == 'Perseroan Terbatas Negara (Persero)' ? 'selected' : '') }}>Perseroan Terbatas Negara (Persero)</option>
                    <option value="Perusahaan Daerah (PD)" {{ old('bentuk_usaha') == "Perusahaan Daerah (PD)" ? 'selected' : ($mitra->bentuk_usaha == 'Perusahaan Daerah (PD)' ? 'selected' : '') }}>Perusahaan Daerah (PD)</option>
                    <option value="Perusahaan Negara Umum (Perum)" {{ old('bentuk_usaha') == "Perusahaan Negara Umum (Perum)" ? 'selected' : ($mitra->bentuk_usaha == 'Perusahaan Negara Umum (Perum)' ? 'selected' : '') }}>Perusahaan Negara Umum (Perum)</option>
                    <option value="Perusahaan Negara Jawatan (Perjan)" {{ old('bentuk_usaha') == "Perusahaan Negara Jawatan (Perjan)" ? 'selected' : ($mitra->bentuk_usaha == 'Perusahaan Negara Jawatan (Perjan)' ? 'selected' : '') }}>Perusahaan Negara Jawatan (Perjan)</option>
                    <option value="Koperasi" {{ old('bentuk_usaha') == "Koperasi" ? 'selected' : ($mitra->bentuk_usaha == 'Koperasi' ? 'selected' : '') }}>Koperasi</option>
                    <option value="Yayasan" {{ old('bentuk_usaha') == "Yayasan" ? 'selected' : ($mitra->bentuk_usaha == 'Yayasan' ? 'selected' : '') }}>Yayasan</option>
                </select>
                @error('bentuk_usaha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_karyawan">Jumlah Karyawan</label>
                <input type="text" name="jumlah_karyawan" id="jumlah_karyawan" placeholder="Cth: 1 - 10 orang" value="{{ old('jumlah_karyawan') ? old('jumlah_karyawan') : $mitra->jumlah_karyawan }}" class="form-control @error('jumlah_karyawan') is-invalid @enderror">
                @error('jumlah_karyawan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="waktu_kerja">Waktu Kerja</label>
                <input type="text" name="waktu_kerja" id="waktu_kerja" placeholder="Cth: Senin - Jumat, Jam 08:00 - 17:00 WIB" value="{{ old('waktu_kerja') ? old('waktu_kerja') : $mitra->waktu_kerja }}" class="form-control @error('waktu_kerja') is-invalid @enderror">
                @error('waktu_kerja')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="busana_kerja">Busana Kerja</label>
                <input type="text" name="busana_kerja" id="busana_kerja" placeholder="Cth: Seragam Perusahaan, Batik, Bebas" value="{{ old('busana_kerja') ? old('busana_kerja') : $mitra->busana_kerja }}" class="form-control @error('busana_kerja') is-invalid @enderror">
                @error('busana_kerja')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kontak">Kontak / Alamat</label>
                <input type="text" name="kontak" id="kontak" placeholder="Cth: Jl Raya Bojongsari Kec. Bojongsari - Desa Bojongsari Purbalingga - Jawa Tengah 53362" value="{{ old('kontak') ? old('kontak') : $mitra->kontak }}" class="form-control @error('kontak') is-invalid @enderror">
                @error('kontak')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" name="telephone" id="telephone" placeholder="-" value="{{ old('telephone') ? old('telephone') : $mitra->telephone }}" class="form-control @error('telephone') is-invalid @enderror">
                @error('telephone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" placeholder="-" value="{{ old('email') ? old('email') : $mitra->email }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="faxmail">Fax-Mail</label>
                <input type="text" name="faxmail" id="faxmail" placeholder="-" value="{{ old('faxmail') ? old('faxmail') : $mitra->faxmail }}" class="form-control @error('faxmail') is-invalid @enderror">
                @error('faxmail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="website">Website / Company Profile</label>
                <input type="text" name="website" id="website" placeholder="-" value="{{ old('website') ? old('website') : $mitra->website }}" class="form-control @error('website') is-invalid @enderror">
                @error('website')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="profile_perusahaan">Profile Perusahaan / Deskripsi Perusahaan Mitra</label>
                <textarea name="profile_perusahaan" id="profile_perusahaan" class="form-control tinymce @error('profile_perusahaan') is-invalid @enderror">{{ old('profile_perusahaan') ? old('profile_perusahaan') : $mitra->profile_perusahaan }}</textarea>
                @error('profile_perusahaan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-1">
                <input type="checkbox" name="mitra_unggulan" id="mitra_unggulan" value="1" class="mr-2" {{ old('mitra_unggulan') ? 'checked' : ($mitra->mitra_unggulan ? 'checked' : '') }}>
                <label for="mitra_unggulan">Centang untuk menjadikan mitra ini unggulan.</label>
            </div>

            <div class="form-group mb-1">
                <input type="checkbox" name="publish" id="publish" value="1" class="mr-2" {{ old('publish') ? 'checked' : ($mitra->publish ? 'checked' : '') }}>
                <label for="mitra_unggulan">Publikasikan atau masukan ke draft.</label>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.mitra.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-save btn-primary">
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
        $('.select2').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%'
        });

        $('select[name="provinsi"]').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%'
        }).on('change', function() {
            $('.fa-spin').removeClass('d-none');
            $.get('/app/v1/bkk-admin/daftar-mitra/tambah?get=cities&kode=' + $(this).val(),
                function(cities) {
                    let html = "<option></option>"
                    cities.forEach((item) => {
                        html += '<option value="' + item.kode + '">' + item.nama + '</option>';
                    })

                    $('select[name="kabupaten"]').html(html);
                    $('.fa-spin').addClass('d-none');
                });
        });

        $('select[name="kabupaten"]').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%',
            language: {
                noResults: function() {
                    return "Kabupaten tidak ditemukan. Pilih provinsi dahulu!";
                }
            }
        });

        tinymce.init({
            selector: '.tinymce',
            height: '300px',
            menubar: false,
            plugins: 'lists',
            statusbar: false,
            toolbar: 'bold italic underline | numlist bullist',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:1rem; color: #6e707e }'
        });
    });
</script>
@endpush