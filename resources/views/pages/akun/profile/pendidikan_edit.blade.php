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
        </div>

        <form action="{{ route('akun.profile.pendidikan.update', encrypt($pendidikan->id)) }}" method="post" class="row">
            @csrf
            @method('put')

            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="mulai_sekolah">Mulai</label>
                    <input type="date" name="mulai_sekolah" id="mulai_sekolah" data-date-format="DD MMM YYYY" placeholder="Tanggal mulai" value="{{ old('mulai_sekolah') ? old('mulai_sekolah') : $pendidikan->mulai_sekolah }}" class="form-control @error('mulai_sekolah') is-invalid border-danger @enderror">
                    @error('mulai_sekolah')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="selesai_sekolah">Selesai</label>
                    <input type="date" name="selesai_sekolah" data-date-format="DD MMM YYYY" placeholder="Tanggal selesai" id="selesai_sekolah" value="{{ old('selesai_sekolah') ? old('selesai_sekolah') : $pendidikan->selesai_sekolah }}" class="form-control @error('selesai_sekolah') is-invalid border-danger @enderror" @if(old('masih_sekolah')) readonly @endif>

                    <div class="form-check">
                        <input class="form-check-input" name="masih_sekolah" type="checkbox" value="1" id="masih_sekolah" @if(old('masih_sekolah')) checked @endif>
                        <label class="form-check-label" for="masih_sekolah">
                            Masih Sekolah
                        </label>
                    </div>

                    @error('selesai_sekolah')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group mb-3">
                    <label for="nama_sekolah">Nama Sekolah / PTN / PTS</label>
                    <input type="text" name="nama_sekolah" id="nama_sekolah" value="{{ old('nama_sekolah') ? old('nama_sekolah') : $pendidikan->nama_sekolah }}" class="form-control @error('nama_sekolah') is-invalid border-danger @enderror">
                    @error('nama_sekolah')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="{{ old('alamat') ? old('alamat') : $pendidikan->alamat }}" class="form-control @error('alamat') is-invalid border-danger @enderror">
                    @error('alamat')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="lokasi"><i class="la la-map-marker me-1"></i>Lokasi</label>
                    <div class="mb-2">
                        <select name="provinsi" data-placeholder="Pilih provinsi" id="provinsi" class="form-control select2-basic @error('provinsi') is-invalid border-danger @enderror">
                            <option value=""></option>
                            @foreach($provinsi as $prov)
                            <option value="{{ $prov['kode'] }}" <?= $prov['kode'] == $pendidikan->provinsi ? 'selected' : '' ?>>{{ $prov['nama'] }}</option>
                            @endforeach
                        </select>
                        @error('provinsi')
                        <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>

                    <select name="kabupaten" data-placeholder="Pilih kabupaten" id="kabupaten" class="form-control select2-basic @error('kabupaten') is-invalid border-danger @enderror">
                        <option value=""></option>
                        @foreach($kabupaten as $kab)
                        <option value="{{ $kab['kode'] }}" <?= $kab['kode'] == $pendidikan->kabupaten ? 'selected' : '' ?>>{{ $kab['nama'] }}</option>
                        @endforeach
                    </select>

                    @error('kabupaten')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="jenjang_pendidikan"><i class="la la-graduation-cup me-1"></i>Jenjang Pendidikan</label>
                    <div class="mb-2">
                        <select name="jenjang_pendidikan" data-placeholder="" id="jenjang_pendidikan" class="form-control select2-basic @error('jenjang_pendidikan') is-invalid border-danger @enderror">
                            <option value=""></option>
                            @php
                            $jenjang_pendidikan = [
                            "SD/MI",
                            "SMP/MTs",
                            "SMA/SMK/MA",
                            "Diploma-1 (D1)",
                            "Diploma-2 (D2)",
                            "Diploma-3 (D3)",
                            "Strata-1 (S1)",
                            "Strata-2 (S2)",
                            "Strata-3 (S3)"
                            ];
                            @endphp
                            @foreach($jenjang_pendidikan as $item)
                            <option value="{{ $item }}" <?= $item == $pendidikan->jenjang_pendidikan ? 'selected' : '' ?>>{{ $item }}</option>
                            @endforeach
                        </select>

                        @error('jenjang_pendidikan')
                        <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="program_studi">Program Studi</label>
                    <input type="text" name="program_studi" id="program_studi" value="{{ old('program_studi') ? old('program_studi') : $pendidikan->program_studi }}" class="form-control @error('program_studi') is-invalid border-danger @enderror">
                    @error('program_studi')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nilai_akhir">Nilai Akhir / NEM / IPK</label>
                    <input type="text" name="nilai_akhir" id="nilai_akhir" value="{{ old('nilai_akhir') ? old('nilai_akhir') : $pendidikan->nilai_akhir }}" class="form-control @error('nilai_akhir') is-invalid border-danger @enderror">
                    @error('nilai_akhir')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12 text-end border-top py-3 mt-3 px-0">
                    <a href="{{ route('akun.profile.pendidikan') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-save me-1"></i>Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/inits/select2.js') }}"></script>

<script type="text/javascript">
    $(function() {
        $('input[name="masih_sekolah"]').on('click', function() {
            if ($(this).is(':checked')) {
                $('#selesai_sekolah').val('');
                $('#selesai_sekolah').attr('placeholder', '-');
                $('#selesai_sekolah').attr('readonly', 'readonly');
            } else {
                $('#selesai_sekolah').attr('placeholder', 'Tanggal selesai');
                $('#selesai_sekolah').removeAttr('readonly');
            }
        });

        $('#provinsi').on('change', function() {
            $.get(`/api/kabupaten/${$(this).val()}`, function(data, status) {
                $('#kabupaten').removeAttr('disabled');

                $('#kabupaten').html('');
                $kabOptions = `<option></option>`;
                data.forEach((item, index) => {
                    $kabOptions += `<option value="${item.kode}">${item.nama}</option>`;
                });
                $('#kabupaten').html($kabOptions);
            });
        });
    });
</script>
@endpush