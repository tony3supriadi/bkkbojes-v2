@extends('pages.akun.akun')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.profile.personal') }}">Akun</a></li>
            <li class="breadcrumb-item d-none d-md-inline-block"><a href="{{ route('akun.profile.personal') }}">Profil Saya</a></li>
            <li class="breadcrumb-item active">Pengalaman</li>
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
                <i class="la la-briefcase text-primary"></i>
                <span>Pengalaman Kerja</span>
            </h4>
        </div>

        <form action="{{ route('akun.profile.pengalaman.update', encrypt($pengalaman->id)) }}" method="post" class="row">
            @csrf
            @method('put')

            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="mulai_bekerja">Mulai</label>
                    <input type="date" name="mulai_bekerja" id="mulai_bekerja" data-date-format="DD MMM YYYY" placeholder="Tanggal mulai" value="{{ old('mulai_bekerja') ? old('mulai_bekerja') : $pengalaman->mulai_bekerja }}" class="form-control @error('mulai_bekerja') is-invalid border-danger @enderror">
                    @error('mulai_bekerja')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="selesai_bekerja">Selesai</label>
                    <input type="date" name="selesai_bekerja" data-date-format="DD MMM YYYY" placeholder="{{($pengalaman->selesai_bekerja) ? $pengalaman->selesai_bekerja : '-'}}" id="selesai_bekerja" value="{{ old('selesai_bekerja') ? old('selesai_bekerja') : (($pengalaman->selesai_bekerja) ? $pengalaman->selesai_bekerja : '-') }}" class="form-control @error('selesai_bekerja') is-invalid border-danger @enderror" @if(old('masih_bekerja') || $pengalaman->masih_bekerja) readonly @endif>

                    <div class="form-check">
                        <input class="form-check-input" name="masih_bekerja" type="checkbox" value="1" id="masih_bekerja" @if(old('masih_bekerja') || $pengalaman->masih_bekerja) checked @endif>
                        <label class="form-check-label" for="masih_bekerja">
                            Masih Bekerja
                        </label>
                    </div>

                    @error('selesai_bekerja')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group mb-3">
                    <label for="posisi_jabatan">Posisi Jabatan</label>
                    <input type="text" name="posisi_jabatan" id="posisi_jabatan" value="{{ old('posisi_jabatan') ? old('posisi_jabatan') : $pengalaman->posisi_jabatan }}" class="form-control @error('posisi_jabatan') is-invalid border-danger @enderror">
                    @error('posisi_jabatan')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama_perusahaan">
                        <i class="la la-building me-1"></i>
                        Nama Perusahaan / Instansi
                    </label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="{{ old('nama_perusahaan') ? old('nama_perusahaan') : $pengalaman->nama_perusahaan }}" class="form-control @error('nama_perusahaan') is-invalid border-danger @enderror">
                    @error('nama_perusahaan')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="bidang_industri">
                        <i class="las la-industry"></i>
                        Industri / Bidang
                    </label>
                    @php
                    $industries = ["Agrikultural / Perkebunan / Peternakan Unggas / Perikanan","Akuntansi / Audit / Pelayanan Pajak","Asuransi","Automobil / Mesin Tambahan Automotif / Kendaraan","Bahan Kimia / Pupuk / Pestisida","BioTeknologi / Farmasi / Riset klinik","Call Center / IT","Elektrikal & Elektronik","Hiburan / Media","Hotel / Pariwisata","Hukum / Legal","Ilmu Pengetahuan & Teknologi ","Industri Berat / Mesin / Peralatan","Jual Beli Saham / Sekuritas","Jurnalisme","Kayu / Fiber / Kertas","Keamanan / Penegak hukum","Kelautan / Aquakultur","Kesehatan / Medis ","Komputer / Teknologi Informasi","Konstruksi / Bangunan / Teknik","Konsultan (Bisnis & Manajemen)","Konsultan (IT, Ilmu Pengetahuan, Teknis & Teknikal)","Layanan Umum / Tenaga Penggerak","Lingkungan / Kesehatan / Keamanan","Luar Angkasa / Aviasi / Pesawat Terbang","Makanan & Minuman / Katering / Rumah Makan","Manajemen / Konsulting HR","Manufaktur / Produksi","Minyak / Gas / Petroleum","Olahraga","Organisasi Nirlaba / Pelayanan Sosial / LSM","Pakaian","Pameran / Manajemen acara / PIKP","Pelayanan Arsitek / Desain Interior","Pelayanan Perbaikan & Pemeliharaan","Pemerintahan / Pertahanan","Pendidikan ","Perawatan / Kecantikan / Fitnes","Perbankan / Pelayanan Keuangan","Percetakan / Penerbitan","Periklanan / Marketing / Promosi / Hubungan Masyarakat","Permata / Perhiasan","Perpustakaan / Museum","Pertambangan","Polymer / Plastik / Karet / Ban","Produk Konsumen / Barang konsumen yang bergerak cepat","Properti / Real Estate","Retail / Merchandise","Semikonduktor / Fabrikasi","Seni / Desain / Fashion","Tekstil / Garment","Telekomunikasi","Tembakau","Transportasi / Logistik","Traveling / Pariwisata"];
                    @endphp

                    <!-- <input type="text" name="bidang_industri" id="bidang_industri" placeholder="Cth: " value="{{ old('bidang_industri') }}" class="form-control @error('bidang_industri') is-invalid border-danger @enderror"> -->
                    <select name="bidang_industri" data-placeholder="Pilih industri / bidang usaha" id="bidang_industri" class="form-control select2-basic @error('bidang_industri') is-invalid border-danger @enderror">
                        <option value=""></option>
                        @foreach($industries as $ind)
                        <option value="{{ $ind }}" <?= old('bidang_industri') == $ind ? 'selected' : (($pengalaman->bidang_industri == $ind) ? 'selected' : '') ?>>{{ $ind }}</option>
                        @endforeach

                        <option value="Lainnya" <?= (old('bidang_industri') && !in_array(old('bidang_industri') ? old('bidang_industri') : $pengalaman->bidang_industri, $industries)) ? 'selected' : '' ?>>Lainnya</option>
                    </select>

                    <input type="text" name="bidang_industri" placeholder="Tuliskan bidang usaha lainnya" value="{{ old('bidang_industri') }}" class="form-control <?= (old('bidang_industri') && !in_array((old('bidang_industri') ? old('bidang_industri') : $pengalaman->bidang_industri), $industries)) ? '' : 'd-none' ?> mt-2 @error('bidang_industri') is-invalid border-danger @enderror" <?= (old('bidang_industri') && !in_array((old('bidang_industri') ? old('bidang_industri') : $pengalaman->bidang_industri), $industries)) ? '' : 'disabled' ?>>

                    @error('bidang_industri')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">
                        <i class="la la-map-marker me-1"></i>
                        Lokasi Perusahaan
                    </label>

                    <div class="mb-2">
                        <input type="text" name="alamat" id="alamat" placeholder="Alamat" value="{{ old('alamat') ? old('alamat') : $pengalaman->alamat }}" class="form-control @error('alamat') is-invalid border-danger @enderror">
                        @error('alamat')
                        <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <select name="provinsi" data-placeholder="Pilih provinsi" id="provinsi" class="form-control select2-basic @error('provinsi') is-invalid border-danger @enderror">
                            <option value=""></option>
                            @foreach($provinsi as $prov)
                            <option value="{{ $prov['kode'] }}" <?= $prov['kode'] == $pengalaman->provinsi ? 'selected' : '' ?>>{{ $prov['nama'] }}</option>
                            @endforeach
                        </select>
                        @error('provinsi')
                        <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>

                    <select name="kabupaten" data-placeholder="Pilih kabupaten" id="kabupaten" class="form-control select2-basic @error('kabupaten') is-invalid border-danger @enderror">
                        <option value=""></option>
                        @foreach($kabupaten as $kab)
                        <option value="{{ $kab['kode'] }}" <?= $kab['kode'] == $pengalaman->kabupaten ? 'selected' : '' ?>>{{ $kab['nama'] }}</option>
                        @endforeach
                    </select>

                    @error('kabupaten')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div>

                <!-- <div class="form-group mb-3">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" class="form-control @error('jabatan') is-invalid border-danger @enderror">
                    @error('jabatan')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div> -->

                <!-- <div class="form-group mb-3">
                    <label for="bidang_pekerjaan">Bidang Pekerjaan</label>
                    <input type="text" name="bidang_pekerjaan" id="bidang_pekerjaan" value="{{ old('bidang_pekerjaan') }}" class="form-control @error('bidang_pekerjaan') is-invalid border-danger @enderror">
                    @error('bidang_pekerjaan')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div> -->

                <!-- <div class="form-group mb-3">
                    <label for="gaji">Gaji Bulanan</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">IDR</span>
                        <input type="hidden" name="gaji_prefix" value="IDR">
                        <input type="text" name="gaji" id="gaji" value="{{ old('gaji') }}" class="form-control @error('gaji') is-invalid border-danger @enderror">
                    </div>
                    @error('gaji')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div> -->

                <!-- <div class="form-group mb-3">
                    <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan</label>
                    <textarea name="deskripsi_pekerjaan" id="deskripsi_pekerjaan" class="form-control tinymce @error('deskripsi_pekerjaan') is-invalid border-danger @enderror">{{ old('deskripsi_pekerjaan') }}</textarea>
                    @error('deskripsi_pekerjaan')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div> -->

                <!-- <div class="form-group">
                    <label for="tools">Tools / Aplikasi / Alat yang digunakan :</label>
                    <textarea name="tools" id="tools" class="form-control tinymce @error('tools') is-invalid border-danger @enderror">{{ old('tools') }}</textarea>
                    @error('tools')
                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror
                </div> -->
            </div>

            <div class="row mx-0">
                <div class="col-12 text-end border-top py-3 mt-3 px-0">
                    <a href="{{ route('akun.profile.pengalaman') }}" class="btn btn-secondary">Batal</a>
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
        $('input[name="masih_bekerja"]').on('click', function() {
            if ($(this).is(':checked')) {
                $('#selesai_bekerja').val('');
                $('#selesai_bekerja').attr('placeholder', '-');
                $('#selesai_bekerja').attr('readonly', 'readonly');
            } else {
                $('#selesai_bekerja').attr('placeholder', 'Tanggal selesai');
                $('#selesai_bekerja').removeAttr('readonly');
            }
        });


        $('select[name="bidang_industri"]').on('change', function() {
            bidangUsahaLainnya();
            $('select[name="bidang_industri"]').focus();
        });

        bidangUsahaLainnya();
    });

    function bidangUsahaLainnya() {
        if ($('select[name="bidang_industri"]').val() == "Lainnya") {
            $('input[name="bidang_industri"]')
                .removeAttr("disabled")
                .removeClass("d-none")
                .val("<?= old('bidang_industri') ? old('bidang_industri') : '' ?>");
        } else {
            $('input[name="bidang_industri"]').addClass("d-none").attr("disabled", "disabled");
        }
    }
</script>
@endpush