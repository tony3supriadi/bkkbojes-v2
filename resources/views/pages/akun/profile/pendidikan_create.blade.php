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

        <form action="{{ route('akun.profile.pendidikan.store') }}" method="post" class="row">
            @csrf
            <input type="hidden" name="personal_id" value="{{ Auth::guard('personal')->user()->id }}">

            <div class="col-md-4">
                <div class="form-group mb-3 row">
                    <label for="tanggal_mulai" class="col-12">Mulai</label>
                    <div class="col-6 pe-1">
                        <select name="bulan_mulai" id="bulan_mulai" data-placeholder="Bulan" class="form-control select2-nosearch @error('bulan_mulai') is_invalid border-danger @enderror">
                            <option value=""></option>
                            @php
                            $months = [
                            [ "value" => "Jan", "text" => "Januari" ],
                            [ "value" => "Feb", "text" => "Februari" ],
                            [ "value" => "Mar", "text" => "Maret" ],
                            [ "value" => "Apr", "text" => "April" ],
                            [ "value" => "Mei", "text" => "Mei" ],
                            [ "value" => "Jun", "text" => "Juni" ],
                            [ "value" => "Jul", "text" => "Juli" ],
                            [ "value" => "Agt", "text" => "Agustus" ],
                            [ "value" => "Sep", "text" => "September" ],
                            [ "value" => "Okt", "text" => "Oktober" ],
                            [ "value" => "Nov", "text" => "November" ],
                            [ "value" => "Des", "text" => "Desember" ],
                            ];
                            @endphp

                            @foreach($months as $month)
                            <option value="{{ $month['value'] }}">{{ $month['text'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6 ps-1">
                        <select name="tahun_mulai" id="tahun_mulai" data-placeholder="Tahun" class="form-control select2-nosearch  @error('tahun_mulai') is_invalid border-danger @enderror">
                            <option value=""></option>
                            @for($year = date('Y'); $year >= 2002; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    @if($errors->has('bulan_mulai') || $errors->has('tahun_mulai'))
                    <div class="text-danger" style="font-size:.875em">Bulan dan tahun mulai harus diisi</div>
                    @endif
                </div>

                <div class="form-group mb-3 row">
                    <label for="tanggal_selesai" class="col-12">Selesai</label>
                    <div class="col-6 pe-1">
                        <select name="bulan_selesai" id="bulan_selesai" data-placeholder="Bulan" class="form-control select2-nosearch  @error('bulan_selesai') is_invalid border-danger @enderror" @if(old('masih_sekolah')) disabled @endif>
                            <option value=""></option>
                            @php
                            $months = [
                            [ "value" => "Jan", "text" => "Januari" ],
                            [ "value" => "Feb", "text" => "Februari" ],
                            [ "value" => "Mar", "text" => "Maret" ],
                            [ "value" => "Apr", "text" => "April" ],
                            [ "value" => "Mei", "text" => "Mei" ],
                            [ "value" => "Jun", "text" => "Juni" ],
                            [ "value" => "Jul", "text" => "Juli" ],
                            [ "value" => "Agt", "text" => "Agustus" ],
                            [ "value" => "Sep", "text" => "September" ],
                            [ "value" => "Okt", "text" => "Oktober" ],
                            [ "value" => "Nov", "text" => "November" ],
                            [ "value" => "Des", "text" => "Desember" ],
                            ];
                            @endphp

                            @foreach($months as $month)
                            <option value="{{ $month['value'] }}">{{ $month['text'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6 ps-1">
                        <select name="tahun_selesai" id="tahun_selesai" data-placeholder="Tahun" class="form-control select2-nosearch  @error('tahun_selesai') is_invalid border-danger @enderror" @if(old('masih_sekolah')) disabled @endif>
                            <option value=""></option>
                            @for($year = date('Y'); $year >= 2002; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" name="masih_sekolah" type="checkbox" value="1" id="masih_sekolah" @if(old('masih_sekolah')) checked @endif>
                            <label class="form-check-label" for="masih_sekolah">
                                Masih Sekolah
                            </label>
                        </div>
                    </div>

                    @if($errors->has('bulan_selesai') || $errors->has('tahun_selesai'))
                    <div class="text-danger" style="font-size:.875em">Bulan dan tahun selesai harus diisi</div>
                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group mb-3">
                    <label for="nama_sekolah">Nama Sekolah / PTN / PTS</label>
                    <input type="text" name="nama_sekolah" id="nama_sekolah" value="{{ old('nama_sekolah') }}" class="form-control @error('nama_sekolah') is-invalid border-danger @enderror">
                    @error('nama_sekolah')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama_sekolah"><i class="la la-map-marker me-1"></i>Lokasi</label>
                    <div class="mb-2">
                        <select name="provinsi" data-placeholder="Pilih provinsi" id="provinsi" class="form-control select2-basic @error('provinsi') is-invalid border-danger @enderror">
                            <option value=""></option>
                            @foreach($provinsi as $prov)
                            <option value="{{ $prov['kode'] }}">{{ $prov['nama'] }}</option>
                            @endforeach
                        </select>
                        @error('provinsi')
                        <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>

                    <select name="kabupaten" data-placeholder="Pilih kabupaten" id="kabupaten" class="form-control select2-basic @error('kabupaten') is-invalid border-danger @enderror">
                        <option value=""></option>
                    </select>

                    @error('kabupaten')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama_sekolah"><i class="la la-graduation-cup me-1"></i>Jenjang Pendidikan</label>
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
                            <option value="{{ $item }}" {{ old('jenjang_pendidikan') == $item ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('jenjang_pendidikan')
                        <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" value="{{old('jurusan')}}" class="form-control @error('jurusan') is-invalid border-danger @enderror">
                    @error('jurusan')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nilai_akhir">Nilai Akhir / NEM / IPK</label>
                    <input type="text" name="nilai_akhir" id="nilai_akhir" value="{{ old('nilai_akhir') }}" class="form-control @error('nilai_akhir') is-invalid border-danger @enderror">
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
                $('#bulan_selesai').attr('disabled', 'disabled');
                $('#tahun_selesai').attr('disabled', 'disabled');
            } else {
                $('#bulan_selesai').removeAttr('disabled');
                $('#tahun_selesai').removeAttr('disabled');
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