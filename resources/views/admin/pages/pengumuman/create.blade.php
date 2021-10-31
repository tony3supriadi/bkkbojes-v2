@extends('admin.layouts.app')

@section('title', 'Pengumuman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-bullhorn"></span>
        <span class="text-capitalize">Pengumuman</span>
    </h3>
</div>

<div class="card">
    <form action="{{ route('admin.pengumuman.store') }}" method="post">
        @csrf

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">
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
                <input type="text" name="judul" id="judul" placeholder="Tulis Judul...." value="{{ old('judul') }}" class="form-control form-control-lg @error('judul') is-invalid @enderror" />
                @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <textarea name="konten" id="konten" class="form-control tinymce">{{ old('konten') }}</textarea>
            </div>

            <div class="form-group">
                <label for="migtra_id">Pilih mitra <small class="text-muted">(Catatan: Anda tidak perlu memilih mitra jika pengumuman tidak berhubungan dengan mitra.)</small></label>
                <select name="mitra_id" id="mitra_id" data-placeholder="" class="form-control select2">
                    <option value=""></option>
                    @foreach($mitras as $mitra)
                    <option value="{{ $mitra->id }}" {{ old('mitra_id') == $mitra->id ? 'selected' : '' }}>{{ $mitra->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form group">
                <input type="checkbox" name="publish" value="1" id="publish" {{ old('publish') ? 'checked' : '' }} />
                <label for="publish">Ceklis untuk publikasikan pengumuman.</label>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">
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
            width: '100%',
        });

        tinymce.init({
            selector: '.tinymce',
            height: '420px',
            menubar: false,
            plugins: 'lists',
            statusbar: false,
            toolbar: 'bold italic underline | numlist bullist',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:1rem; color: #6e707e }'
        });
    });
</script>
@endpush