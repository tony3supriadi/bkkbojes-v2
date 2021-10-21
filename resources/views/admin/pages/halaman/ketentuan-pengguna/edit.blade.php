@extends('admin.layouts.app')

@section('title', 'Ketentuan Pengguna')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-question-circle"></span>
        <span class="text-capitalize">Ketentuan Pengguna</span>
    </h3>

    <div>
        @can('ketentuan-pengguna-delete')
        <button type="button" onclick="action_destroy(`{{ route('admin.ketentuan-pengguna.destroy', encrypt($ketentuan_pengguna->id)) }}`)" class="btn btn-destroy btn-danger">
            <i class="la la-trash"></i> Hapus
        </button>
        @endcan

        @can('ketentuan-pengguna-create')
        <a href="{{ route('admin.ketentuan-pengguna.create') }}" role="button" class="btn btn-primary">
            <i class="la la-plus-circle"></i> Tambah
        </a>
        @endcan
    </div>
</div>

<div class="card">
    <form action="{{ route('admin.ketentuan-pengguna.update', encrypt($ketentuan_pengguna->id)) }}" method="post">
        @csrf
        @method('put')

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.ketentuan-pengguna.index') }}" class="btn btn-secondary">
                        <i class="la la-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-save btn-primary">
                        <i class="la la-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <div class="col-4 col-md-2">
                    <label for="ordering">Nomor Urut</label>
                    <input type="number" name="ordering" id="ordering" placeholder="0" value="{{ old('ordering') ? old('ordering') : $ketentuan_pengguna->ordering }}" class="form-control @error('ordering') is-invalid @enderror" />
                    @error('ordering')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="point">Ketentuan Pengguna</label>
                <input type="text" name="point" id="point" value="{{ old('point') ? old('point') : $ketentuan_pengguna->point }}" class="form-control @error('point') is-invalid @enderror" />
                @error('point')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Keterangan</label>
                <textarea name="content" id="content" class="form-control tinymce @error('content') is-invalid @enderror">{{ old('content') ? old('content') : $ketentuan_pengguna->content }}</textarea>
                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.ketentuan-pengguna.index') }}" class="btn btn-secondary">
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