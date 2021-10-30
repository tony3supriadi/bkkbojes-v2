@extends('admin.layouts.app')

@section('title', 'Pengguna')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-user"></span>
        <span class="text-capitalize">Pengguna</span>
    </h3>

    <div>
        @can('pengguna-delete')
        <button type="button" onclick="action_destroy(`{{ route('admin.pengguna.destroy', encrypt($pengguna->id)) }}`)" class="btn btn-destroy btn-danger">
            <i class="la la-trash"></i> Hapus
        </button>
        @endcan

        @can('pengguna-create')
        <a href="{{ route('admin.pengguna.create') }}" role="button" class="btn btn-primary">
            <i class="la la-plus-circle"></i> Tambah
        </a>
        @endcan
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.pengguna.update', encrypt($pengguna->id)) }}" method="post">
        @csrf
        @method('put')

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.pengguna.index') }}" class="btn btn-secondary">
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
                <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                <input type="number" name="nik" id="nik" value="{{ old('nik') ? old('nik') : $pengguna->nik }}" class="form-control @error('nik') is-invalid @enderror" />
                @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" id="nama_depan" value="{{ old('nama_depan') ? old('nama_depan') : $pengguna->nama_depan }}" class="form-control @error('nama_depan') is-invalid @enderror" />
                @error('nama_depan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" id="nama_belakang" value="{{ old('nama_belakang') ? old('nama_belakang') : $pengguna->nama_belakang }}" class="form-control @error('nama_belakang') is-invalid @enderror" />
                @error('nama_belakang')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" data-placeholder="" id="jenis_kelamin" class="form-control select2-nosearch @error('jenis_kelamin') is-invalid @enderror">
                    <option value=""></option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ?  'selected' : ($pengguna->jenis_kelamin == 'L' ? 'selected' : '') }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ?  'selected' : ($pengguna->jenis_kelamin == 'P' ? 'selected' : '') }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') ? old('tempat_lahir') : $pengguna->tempat_lahir }}" class="form-control @error('tempat_lahir') is-invalid @enderror" />
                @error('tempat_lahir')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $pengguna->tanggal_lahir }}" class="form-control @error('tanggal_lahir') is-invalid @enderror" />
                @error('tanggal_lahir')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="{{ old('alamat') ? old('alamat') : $pengguna->alamat }}" class="form-control @error('alamat') is-invalid @enderror" />
                @error('alamat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi" data-placeholder="" id="provinsi" class="form-control select2-nosearch @error('provinsi') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($provinces as $item)
                    <option value="{{ $item['kode'] }}" {{ old('provinsi') == $item['kode'] ? 'selected' : ($pengguna->provinsi == $item['kode'] ? 'selected' : '') }}>{{ $item['nama'] }}</option>
                    @endforeach
                </select>
                @error('provinsi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kabupaten">Kabupaten / Kota <span class="fa fa-spin fa-spinner cities-loading d-none"></span></label>
                <select name="kabupaten" data-placeholder="" id="kabupaten" class="form-control select2-nosearch @error('kabupaten') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($wilayah->kabupaten($pengguna->provinsi) as $item)
                    <option value="{{ $item['kode'] }}" {{ old('kabupaten') == $item['kode'] ? 'selected' : ($pengguna->kabupaten == $item['kode'] ? 'selected' : '') }}>{{ $item['nama'] }}</option>
                    @endforeach
                </select>
                @error('kabupaten')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan <span class="fa fa-spin fa-spinner regencies-loading d-none"></span></label>
                <select name="kecamatan" data-placeholder="" id="kecamatan" class="form-control select2-nosearch @error('kecamatan') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($wilayah->kecamatan($pengguna->kabupaten) as $item)
                    <option value="{{ $item['kode'] }}" {{ old('kecamatan') == $item['kode'] ? 'selected' : ($pengguna->kecamatan == $item['kode'] ? 'selected' : '') }}>{{ $item['nama'] }}</option>
                    @endforeach
                </select>
                @error('kecamatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="desa">Desa / Kelurahan <span class="fa fa-spin fa-spinner villages-loading d-none"></span></label>
                <select name="desa" data-placeholder="" id="desa" class="form-control select2-nosearch @error('desa') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($wilayah->desa($pengguna->kecamatan) as $item)
                    <option value="{{ $item['kode'] }}" {{ old('desa') == $item['kode'] ? 'selected' : ($pengguna->desa == $item['kode'] ? 'selected' : '') }}>{{ $item['nama'] }}</option>
                    @endforeach
                </select>
                @error('desa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kodepos">Kodepos</label>
                <input type="text" name="kodepos" id="kodepos" value="{{ old('kodepos') ? old('kodepos') : $pengguna->kodepos }}" class="form-control @error('kodepos') is-invalid @enderror" />
                @error('kodepos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">HP / WA</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') ? old('phone') : $pengguna->phone }}" class="form-control @error('phone') is-invalid @enderror" />
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') ? old('email') : $pengguna->email }}" class="form-control @error('email') is-invalid @enderror" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username') ? old('username') : $pengguna->username }}" class="form-control @error('username') is-invalid @enderror" />
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror" />
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_akun">Jenis Akun</label>
                <select name="jenis_akun" data-placeholder="" id="jenis_akun" class="form-control select2-nosearch @error('jenis_akun') is-invalid @enderror">
                    <option value=""></option>
                    <option value="Alumni" {{ old('jenis_akun') == 'Alumni' ?  'selected' : ($pengguna->jenis_akun == 'Alumni' ? 'selected' : '') }}>Alumni</option>
                    <option value="Siswa" {{ old('jenis_akun') == 'Siswa' ?  'selected' : ($pengguna->jenis_akun == 'Siswa' ? 'selected' : '') }}>Siswa</option>
                    <option value="Umum" {{ old('jenis_akun') == 'Umum' ?  'selected' : ($pengguna->jenis_akun == 'Umum' ? 'selected' : '') }}>Umum</option>
                </select>
                @error('jenis_akun')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.pengguna.index') }}" class="btn btn-secondary">
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
<script type="text/javascript">
    $('.select2-nosearch').select2({
        theme: 'bootstrap',
        dropdownAutoWidth: true,
        minimumResultsForSearch: -1,
        width: '100%'
    });

    $('select[name="provinsi"]').select2({
        theme: 'bootstrap',
        dropdownAutoWidth: true,
        width: '100%'
    }).on('change', function() {
        $('.cities-loading').removeClass('d-none');
        $.get('/app/v1/bkk-admin/pengguna/tambah?get=cities&kode=' + $(this).val(),
            function(cities) {
                let html = "<option></option>"
                cities.forEach((item) => {
                    html += '<option value="' + item.kode + '">' + item.nama + '</option>';
                })

                $('select[name="kabupaten"]').html(html);
                $('select[name="kecamatan"]').html('');
                $('select[name="desa"]').html('');
                $('.cities-loading').addClass('d-none');
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
    }).on('change', function() {
        $('.regencies-loading').removeClass('d-none');
        $.get('/app/v1/bkk-admin/pengguna/tambah?get=regencies&kode=' + $(this).val(),
            function(regencies) {
                let html = "<option></option>"
                regencies.forEach((item) => {
                    html += '<option value="' + item.kode + '">' + item.nama + '</option>';
                })

                $('select[name="kecamatan"]').html(html);
                $('select[name="desa"]').html('');
                $('.regencies-loading').addClass('d-none');
            });
    });

    $('select[name="kecamatan"]').select2({
        theme: 'bootstrap',
        dropdownAutoWidth: true,
        width: '100%',
        language: {
            noResults: function() {
                return "Kecamatan tidak ditemukan. Pilih kabupaten dahulu!";
            }
        }
    }).on('change', function() {
        $('.villages-loading').removeClass('d-none');
        $.get('/app/v1/bkk-admin/pengguna/tambah?get=villages&kode=' + $(this).val(),
            function(villages) {
                let html = "<option></option>"
                villages.forEach((item) => {
                    html += '<option value="' + item.kode + '">' + item.nama + '</option>';
                })

                $('select[name="desa"]').html(html);
                $('.villages-loading').addClass('d-none');
            });
    });

    $('select[name="desa"]').select2({
        theme: 'bootstrap',
        dropdownAutoWidth: true,
        width: '100%',
        language: {
            noResults: function() {
                return "Desa tidak ditemukan. Pilih kecamatan dahulu!";
            }
        }
    })
</script>
@endpush