@extends('admin.layouts.app')

@section('title', 'Ubah Pengaturan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-cog"></span>
        <span class="text-capitalize">pengaturan</span>
    </h3>
</div>

<form action="{{ route('admin.pengaturan.update', encrypt($pengaturan->id)) }}" method="post" class="card">
    @csrf
    @method('put')

    <div class="card-header">
        <a href="{{ route('admin.pengaturan.index') }}" role="button" class="btn btn-secondary">
            <i class="la la-arrow-left"></i>
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="la la-save mr-1"></i>Simpan
        </button>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ $pengaturan->nama }}" class="form-control @error('nama') is-invalid @enderror" readonly>

            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="konten">Konten</label>
            <textarea name="konten" id="konten" class="form-control tinymce @error('konten') is-invalid @enderror">{{ $pengaturan->konten }}</textarea>

            @error('konten')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</form>
@endsection

@push('styles')
@endpush

@push('scripts')
<script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
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