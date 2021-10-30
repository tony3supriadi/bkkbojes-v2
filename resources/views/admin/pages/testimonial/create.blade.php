@extends('admin.layouts.app')

@section('title', 'Testimonial')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>
        <span class="la la-comment"></span>
        <span class="text-capitalize">Testimonial</span>
    </h3>
</div>

<div class="card">
    <form action="{{ route('admin.testimonial.store') }}" method="post">
        @csrf

        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary">
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
                <label for="personal_id">Pengguna</label>
                <select name="personal_id" data-placeholder="" id="personal_id" class="form-control select2">
                    <option value=""></option>
                    @foreach($personal as $item)
                    <option value="{{ $item->id }}" {{ $item->id == old('personal_id') ? 'selected' : '' }}>{{ $item->nik }} - {{ $item->nama_depan }} {{ $item->nama_belakang }}</option>
                    @endforeach
                </select>
                @error('personal_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_akun">Jenis Akun</label>
                <select name="jenis_akun" data-placeholder="" id="jenis_akun" class="form-control select2-nosearch">
                    <option value=""></option>
                    <option value="Alumni" {{ old('jenis_akun') == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                    <option value="Siswa" {{ old('jenis_akun') == 'Siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="Umum" {{ old('jenis_akun') == 'Umum' ? 'selected' : '' }}>Umum</option>
                </select>
                @error('jenis_akun')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group d-none" id="tahun_lulus_input">
                <label for="tahun_lulus">Tahun Lulus</label>
                <input type="number" name="tahun_lulus" value="{{ old('tahun_lulus') }}" id="tahun_lulus" class="form-control @error('tahun_lulus') is_invalid @enderror">
                @error('tahun_lulus')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="bekerja_di">Bekerja / Prakerind di</label>
                <input type="text" name="bekerja_di" value="{{ old('bekerja_id') }}" id="bekerja_di" class="form-control @error('bekerja_di') is_invalid @enderror">
                @error('bekerja_di')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="testimonial">Testimonial</label>
                <textarea name="testimonial" id="testimonial" class="form-control tinymce">{{ old('testimonial') }}</textarea>
                @error('testimonial')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary">
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
<script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/vendors/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%'
        });

        $('select[name="jenis_akun"]').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            minimumResultsForSearch: -1,
            width: '100%'
        }).on('change', function() {
            if ($(this).val() == "Alumni") {
                $('#tahun_lulus_input').removeClass('d-none');
            } else {
                $('input[name="tahun_lulus"]').val("");
                $('#tahun_lulus_input').addClass('d-none');
            }
        });

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