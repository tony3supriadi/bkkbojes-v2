@extends('admin.layouts.app')

@section('title', 'Artikel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-book"></span>
        <span class="text-capitalize">Artikel</span>
    </h3>
</div>

<div class="card">
    <form action="{{ route('admin.artikel.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">
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
                <label for="image">Image</label>
                <input type="file" name="image" id="image" value="{{ old('image') }}" class="form-control p-1 @error('image') is-invalid @enderror" />
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="meta_tag">Meta Tags</label>
                <input type="text" name="meta_tag" id="meta_tag" value="{{ old('meta_tag') }}" class="form-control @error('meta_tag') is-invalid @enderror" />
                @error('meta_tag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="meta_deskripsi">Meta Deskripsi</label>
                <textarea name="meta_deskripsi" id="meta_deskripsi" class="form-control @error('meta_deskripsi') is-invalid @enderror">{{ old('meta_deskripsi') }}</textarea>
                @error('meta_tag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form group">
                <input type="checkbox" name="publish" value="1" id="publish" {{ old('publish') ? 'checked' : '' }} />
                <label for="publish">Ceklis untuk publikasikan artikel.</label>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">
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
@endpush

@push('scripts')
<script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
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