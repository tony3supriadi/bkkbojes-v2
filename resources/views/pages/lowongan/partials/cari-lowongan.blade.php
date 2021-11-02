@php
use App\Models\Wilayah;
use App\Models\Programstudi;
@endphp
<div class="card card-body box-card mb-3">
    <form action="" method="get">
        <div class="box py-2">
            <div class="input-group mb-3">
                <input type="text" name="q" class="form-control" value="{{ request()->get('q') }}" style="border-right:0" placeholder="Ketik kata kunci, nama perusahaan, posisi, dll...">
                <span class="input-group-text input-group-query" style="border-left: 0;"><i class="fa fa-search"></i></span>
            </div>

            <div class="row m-0">
                <div class="col-md-2 ps-md-0 pe-md-1 pe-0 mb-2 mb-md-0">
                    <input type="hidden" name="sort" value="{{ request()->get('sort') ? request()->get('sort') : 'semua' }}">
                    <select id="sort" data-placeholder="Urutkan" class="form-control" onchange="$('input[name=sort]').val($(this).val())">
                        <i class="la la-angle-down"></i>
                        <option value=""></option>
                        <option value="terfavorit" {{ request()->get('sort') == 'terfavorit' ? 'selected' : '' }}>Terfavorit</option>
                        <option value="terbaru" {{ request()->get('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="terlama" {{ request()->get('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                    </select>
                </div>
                <div class="col-md-2 px-0 px-md-1 mb-2 mb-md-0">
                    <input type="hidden" name="lokasi" value="{{ request()->get('lokasi') ? request()->get('lokasi') : 'semua' }}">
                    <select id="lokasi" data-placeholder="Lokasi" class="form-control" onchange="$('input[name=lokasi]').val($(this).val())">
                        <i class="la la-angle-down"></i>
                        <option value=""></option>
                        @foreach(Wilayah::where(DB::raw('LENGTH(kode)'), '<=', 2)->get() as $wilayah)
                            <option value="{{ $wilayah->kode }}" {{ request()->get('lokasi') == $wilayah->kode ? 'selected' : '' }}>{{ ucwords(strtolower($wilayah->nama)) }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="col-md-2 px-0 px-md-1 mb-2 mb-md-0">
                    <input type="hidden" name="range" value="{{ request()->get('range') ? request()->get('range') : 'semua' }}">
                    <select id="kisaran_gaji" data-placeholder="Gaji" class="form-control" onchange="$('input[name=range]').val($(this).val())">
                        <option value=""></option>
                        <option value="3000000" {{ request()->get('range') == '3000000' ? 'selected' : '' }}>3.000.000</option>
                        <option value="5000000" {{ request()->get('range') == '5000000' ? 'selected' : '' }}>5.000.000</option>
                        <option value="10000000" {{ request()->get('range') == '10000000' ? 'selected' : '' }}>10.000.000</option>
                        <option value="15000000" {{ request()->get('range') == '15000000' ? 'selected' : '' }}>15.000.000</option>
                    </select>
                </div>
                <div class="col-md-2 px-0 px-md-1 mb-2 mb-md-0">
                    <input type="hidden" name="type" value="{{ request()->get('type') ? request()->get('type') : 'semua' }}">
                    <select id="jenis_pekerjaan" data-placeholder="Jenis Pekerjaan" class="form-control" onchange="$('input[name=type]').val($(this).val())">
                        <i class="la la-angle-down"></i>
                        <option value=""></option>
                        <option value="Penuh Waktu" {{ request()->get('type') == 'Penuh Waktu' ? 'selected' : '' }}>Penuh Waktu</option>
                        <option value="Paruh Waktu" {{ request()->get('type') == 'Paruh Waktu' ? 'selected' : '' }}>Paruh Waktu</option>
                        <option value="Freelance" {{ request()->get('type') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="Magang" {{ request()->get('type') == 'Magang' ? 'selected' : '' }}>Magang</option>
                        <option value="Prakerind" {{ request()->get('type') == 'Prakerind' ? 'selected' : '' }}>Prakerind (SMK)</option>
                    </select>
                </div>
                <div class="col-md-2 ps-0 pe-0 ps-md-1 mb-2 mb-md-0">
                    <input type="hidden" name="studi" value="{{ request()->get('studi') ? request()->get('studi') : 'semua' }}">
                    <select id="program_studi" data-placeholder="Program Studi" class="form-control" onchange="$('input[name=studi]').val($(this).val())">
                        <i class="la la-angle-down"></i>
                        <option value=""></option>
                        @foreach(Programstudi::all() as $studi)
                        <option value="{{ $studi->id }}" {{ request()->get('studi') == $studi->id ? 'selected' : '' }}>{{ $studi->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 ps-0 pe-0 ps-md-1 mb-2 mb-md-0 d-grid gap-2">
                    <button class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>


@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2-bootstrap.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/vendors/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function() {
        $('select').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%'
        });

        $('input[name="q"]').on('focusin', function() {
            $('.input-group-query').css("border", "1px solid #ffb694");
        })

        $('input[name="q"]').on('focusout', function() {
            $('.input-group-query').css("border", "1px solid #adb5bd");
        })
    })
</script>
@endpush