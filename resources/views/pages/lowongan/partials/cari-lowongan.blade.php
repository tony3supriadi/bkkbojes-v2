@php
use App\Models\Wilayah;
use App\Models\Programstudi;
@endphp
<div class="card card-body box-card mb-3">
    <form action="" method="get">
        <div class="box py-2">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Ketik kata kunci, nama perusahaan, posisi, dll...">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button">
                        <i class="la la-search" style="color: white"></i>
                    </button>
                </span>
            </div>
            <div class="row m-0">
                <div class="col-md-2 ps-md-0 pe-md-1 pe-0 mb-2 mb-md-0">
                    <select name="order" id="urutkan" data-placeholder="Urutkan" class="form-control">
                        <i class="la la-angle-down"></i>
                        <option value=""></option>
                        <option value="terfavorit">Terfavorit</option>
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>
                </div>
                <div class="col-md-2 px-0 px-md-1 mb-2 mb-md-0">
                    <select id="lokasi" name="lokasi" data-placeholder="Lokasi" class="form-control">
                        <i class="la la-angle-down"></i>
                        <option value=""></option>
                        @foreach(Wilayah::where(DB::raw('LENGTH(kode)'), '<=', 2)->get() as $wilayah)
                            <option value="{{ $wilayah->kode }}">{{ ucwords(strtolower($wilayah->nama)) }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="col-md-2 px-0 px-md-1 mb-2 mb-md-0">
                    <select id="kisaran_gaji" name="range" data-placeholder="Gaji" class="form-control">
                        <option value=""></option>
                        <option value="3000000">3.000.000</option>
                        <option value="5000000">5.000.000</option>
                        <option value="10000000">10.000.000</option>
                        <option value="15000000">15.000.000</option>
                    </select>
                </div>
                <div class="col-md-3 px-0 px-md-1 mb-2 mb-md-0">
                    <select id="jenis_pekerjaan" name="jp" data-placeholder="Jenis Pekerjaan" class="form-control">
                        <i class="la la-angle-down"></i>
                        <option value=""></option>
                        <option value="Penuh Waktu">Penuh Waktu</option>
                        <option value="Paruh Waktu">Paruh Waktu</option>
                        <option value="Freelance">Freelance</option>
                        <option value="Magang">Magang</option>
                        <option value="Prakerind">Prakerind (SMK)</option>
                    </select>
                </div>
                <div class="col-md-3 ps-0 pe-0 ps-md-1 mb-2 mb-md-0">
                    <select id="program_studi" name="ps" data-placeholder="Program Studi" class="form-control">
                        <i class="la la-angle-down"></i>
                        <option value=""></option>
                        @foreach(Programstudi::all() as $studi)
                        <option value="{{ $studi->id }}">{{ $studi->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>


@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script>
    $('select').select2({
        theme: "bootstrap-5",
        dropdownCssClass: "select2--small",
    });
</script>
@endpush