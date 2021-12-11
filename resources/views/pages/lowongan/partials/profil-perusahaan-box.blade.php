<div class="card card-body box-card mb-3">
    <div class="box-title d-flex">
        <i class="la la-briefcase me-3"></i>
        Profil Perusahaan
    </div>

    <div class="box-content-body py-2">
        <div class="row mb-3">
            <div class="col-2 p-0 me-3 com-md-2">
                <div class="sidebar-logo">
                    <img width="50px" height="50px" src="{{ asset('uploads/mitra/'.$mitra->logo) }}" alt="{{ $mitra->logo }}" class="border rounded">
                </div>
            </div>
            <div class="col-8 p-0 col-md-9">
                <h4 class="fw-bold mt-1">{{ $mitra->nama }}</h4>
                <h5>{{ $wilayah->getName($mitra->provinsi) }}</h5>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-1 p-1 me-2 col-md-1">
                <img width="20" heigt="20" src="{{ asset('images/icons/briefcase-solid.png') }}" />
            </div>
            <div class="col-10 p-1 col-md-10 mt-1">
                <h5 class="fw-bold mb-1">Bentuk Usaha</h5>
                <h6>{{ $mitra->bentuk_usaha }}</h6>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-1 p-1 me-2 col-md-1">
                <img width="20" heigt="20" src="{{ asset('images/icons/industry-solid.png') }}" />
            </div>
            <div class="col-10 p-1 col-md-10 mt-1">
                <h5 class="fw-bold mb-1">Industri / Bidang Usaha</h5>
                <h6>{{ $mitra->bidang_usaha }}</h6>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-1 p-1 me-2 col-md-1">
                <img width="20" heigt="20" src="{{ asset('images/icons/users-solid.png') }}" />
            </div>
            <div class="col-10 p-1 col-md-10 mt-1">
                <h5 class="fw-bold mb-1">Jumlah Karyawan</h5>
                <h6>{{ $mitra->jumlah_karyawan }}</h6>
            </div>
        </div>

        <div class="row mt-3">
            <div class="content-body-paragraph p-1">
                <div class="col-12 p-0">
                    {!! $mitra->profile_perusahaan !!}
                </div>
            </div>
        </div>
    </div>

</div>