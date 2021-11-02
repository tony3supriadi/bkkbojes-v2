@extends('admin.layouts.app')

@section('title', 'Pengguna')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-user"></span>
        <span class="text-capitalize">Pengguna</span>
    </h3>

    <div>
        @can('pengguna-update')
        <a href="{{ route('admin.pengguna.edit', encrypt($pengguna->id)) }}" role="button" class="btn btn-secondary">
            <i class="la la-edit"></i> Ubah
        </a>
        @endcan

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
    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.show' ? 'active' : '' }}" href="{{ route('admin.pengguna.show', encrypt($pengguna->id)) }}">Personal</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.pengalaman' ? 'active' : '' }}" href="{{ route('admin.pengguna.pengalaman', encrypt($pengguna->id)) }}">Pengalaman</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.pendidikan' ? 'active' : '' }}" href="{{ route('admin.pengguna.pendidikan', encrypt($pengguna->id)) }}">Pendidikan</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.keterampilan' ? 'active' : '' }}" href="{{ route('admin.pengguna.keterampilan', encrypt($pengguna->id)) }}">Keterampilan</a></li>
            <li class="nav-item"><a class="nav-link {{ request()->route()->getName() == 'admin.pengguna.organisasi' ? 'active' : '' }}" href="{{ route('admin.pengguna.organisasi', encrypt($pengguna->id)) }}">Organisasi</a></li>
        </ul>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped w-100 mb-0">
            <tr>
                <td width="22%">NIK</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->nik }}</td>
            </tr>

            <tr>
                <td width="22%">Nama Lengkap</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->nama_depan }} {{ $pengguna->nama_belakang }}</td>
            </tr>

            <tr>
                <td width="22%">Jenis Kelamin</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            </tr>

            <tr>
                <td width="22%">Tempat, Tanggal Lahir</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->tempat_lahir }}, {{ Carbon\Carbon::parse($pengguna->tanggal_lahir)->isoFormat('DD MMMM Y') }}</td>
            </tr>

            <tr>
                <td width="22%">Alamat</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->alamat }}</td>
            </tr>

            <tr>
                <td width="22%">Desa</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->desa ? $wilayah->getName($pengguna->desa) : '-' }}</td>
            </tr>

            <tr>
                <td width="22%">Kecamatan</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->kecamatan ? $wilayah->getName($pengguna->kecamatan) : '-' }}</td>
            </tr>

            <tr>
                <td width="22%">Kabupaten / Kota</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->kabupaten ? $wilayah->getName($pengguna->kabupaten) : '-' }}</td>
            </tr>

            <tr>
                <td width="22%">Provinsi</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->provinsi ? $wilayah->getName($pengguna->provinsi) : '-' }}</td>
            </tr>

            <tr>
                <td width="22%">Kodepos</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->kodepos }}</td>
            </tr>

            <tr>
                <td width="22%">HP / WA</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->phone }}</td>
            </tr>

            <tr>
                <td width="22%">E-Mail</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->email }}</td>
            </tr>

            <tr>
                <td width="22%">Username</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->username }}</td>
            </tr>

            <tr>
                <td width="22%">Jenis Akun</td>
                <td width="5px">:</td>
                <td>{{ $pengguna->jenis_akun }}</td>
            </tr>

            <tr>
                <td width="22%">Terdaftar pada</td>
                <td width="5px">:</td>
                <td>{{ Carbon\Carbon::parse($pengguna->created_at)->isoFormat('DD MMMM Y, H:m:s') }}</td>
            </tr>
        </table>
    </div>
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