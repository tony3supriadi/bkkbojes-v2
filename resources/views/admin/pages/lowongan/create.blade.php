@extends('admin.layouts.app')

@section('title', 'Lowongan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-file"></span>
        <span class="text-capitalize">Lowongan</span>
    </h3>
</div>

<div class="card">
    <form action="{{ route('admin.lowongan.store') }}" method="post">
        @csrf
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.lowongan.index') }}" class="btn btn-secondary">
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
                <label for="judul">Judul / Posisi / Jabatan</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" placeholder="Tuliskan judul atau posisi jabatan yang ditawarkan..." class="form-control @error('judul') is-invalid @enderror">
                @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="mitra_id">Pilih Mitra Terkait <small class="text-muted">(Note: Kosongkan bila tidak ada hubungannya dengan mitra terdaftar)</small></label>
                <select name="mitra_id" data-placeholder="" id="mitra_id" class="form-control select2 @error('mitra_id') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($mitras as $mitra)
                    <option value="{{ $mitra->id }}">{{ $mitra->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                <select name="tipe_pekerjaan" data-placeholder="" id="tipe_pekerjaan" class="form-control select2 @error('tipe_pekerjaan') is-invalid @enderror">
                    <option value=""></option>
                    <option value="Penuh Waktu">Penuh Waktu</option>
                    <option value="Paruh Waktu">Paruh Waktu</option>
                    <option value="Pekerja Lepas">Pekerja Lepas</option>
                    <option value="Magang">Magang</option>
                    <option value="Prakerind (SMK)">Prakerind (SMK)</option>
                </select>
                @error('tipe_pekerjaan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="program_studi">Program Studi</label>
                <select name="program_studi[]" data-placeholder="" id="program_studi" multiple class="form-control select2 @error('program_studi') is-invalid @enderror">
                    <option value=""></option>
                    @foreach($programstudi as $studi)
                    <option value="{{ $studi->id }}">{{ $studi->nama }}</option>
                    @endforeach
                </select>
                @error('program_studi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kisaran_gaji">Gaji yang ditawarkan</label>
                <input type="number" name="kisaran_gaji" id="kisaran_gaji" value="{{ old('kisaran_gaji') }}" class="form-control @error('kisaran_gaji') is-invalid @enderror">
                <input type="checkbox" value="1" name="tampilkan_gaji" id="tampilkan_gaji" class="mr-1">
                <label for="tampilkan_gaji">Ceklis untuk menampilkan gaji pada lowongan yang dilihat pelamar.</label>
                @error('kisaran_gaji')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Pekerjaan</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Tuliskan deskripsi pekerjaan mengenai tugas-tugas yang diberikan..." class="form-control tinymce"></textarea>
                @error('deskripsi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kualifikasi">Kualifikasi</label>
                <textarea name="kualifikasi" id="kualifikasi" placeholder="Tuliskan kualifikasi atau syarat minimum untuk melamar pekerjaan ini..." class="form-control tinymce"></textarea>
                @error('kualifikasi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="benefit">Benefit / Keuntungan</label>
                <textarea name="benefit" id="benefit" placeholder="Tuliskan benefit atau keuntungan yang diberikan mitra kepada karyawan yang diterima..." class="form-control tinymce"></textarea>
                @error('benefit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" placeholder="Tuliskan catatan untuk pelamar agar memahami proses rekrutmen..." class="form-control tinymce"></textarea>
                @error('catatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" value="{{ old('tanggal_berakhir') }}" class="form-control @error('tanggal_berakhir') is-invalid @enderror" />
                @error('catatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.lowongan.index') }}" class="btn btn-secondary">
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
        $('.select2').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%'
        });

        tinymce.init({
            selector: '.tinymce',
            height: '300px',
            menubar: false,
            plugins: 'lists',
            statusbar: false,
            toolbar: 'bold italic underline | numlist bullist',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif;font-size:1rem;color:#6e707e}.mce-content-body[data-mce-placeholder]:not(.mce-visualblocks)::before{color:#D9E2EF;opacity:1}'
        });
    });
</script>
@endpush