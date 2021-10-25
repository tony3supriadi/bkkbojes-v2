@extends('admin.layouts.app')

@section('title', 'Pengumuman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-question-circle"></span>
        <span class="text-capitalize">Pengumuman</span>
    </h3>

    <div>
        @can('pengumuman-delete')
        <button type="button" onclick="action_destroy(`{{ route('admin.pengumuman.destroy', encrypt($pengumuman->id)) }}`)" class="btn btn-destroy btn-danger">
            <i class="la la-trash"></i> Hapus
        </button>
        @endcan

        @can('pengumuman-create')
        <a href="{{ route('admin.pengumuman.create') }}" role="button" class="btn btn-primary">
            <i class="la la-plus-circle"></i> Tambah
        </a>
        @endcan
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.pengumuman.update', encrypt($pengumuman->id)) }}" method="post">
        @csrf
        @method('put')

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">
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
                <input type="text" name="judul" id="judul" placeholder="Tulis Judul...." value="{{ old('judul') ? old('judul') : $pengumuman->judul }}" class="form-control form-control-lg @error('judul') is-invalid @enderror" />
                @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <textarea name="konten" id="konten" class="form-control tinymce">{{ old('konten') ? old('konten') : $pengumuman->konten }}</textarea>
            </div>

            <div class="form group">
                <input type="checkbox" name="publish" value="1" id="publish" {{ old('publish') ? 'checked' : ($pengumuman->publish == 1 ? 'checked' : '') }} />
                <label for="publish">Ceklis untuk publikasikan pengumuman.</label>
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">
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