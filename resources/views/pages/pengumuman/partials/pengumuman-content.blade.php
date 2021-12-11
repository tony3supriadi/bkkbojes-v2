<div class="card card-body box-card mb-3">
    <div class="box-content py-3 px-2">
        <div class="row">
            @if($pengumuman_detail->mitra_id)
            <div class="col-3 me-4 col-md-1 box-content-logo">
                <img src="{{ asset('uploads/mitra/'.$pengumuman_detail->mitra_logo) }}" width="80px" height="80px" class="border rounded" />
            </div>
            @endif
            <div class="col-8 col-md-8 box-content-title">
                <h5>{{ $pengumuman_detail->judul }}</h5>
                <h6>{{ $pengumuman_detail->mitra_nama }}</h6>
            </div>
        </div>
    </div>

    <div class="box-content-body">
        {!! $pengumuman_detail->konten !!}
    </div>

    <div class="box-content-footer d-flex justify-content-between">
        <div class="icons-group d-flex align-items-center">
            <i class="la la-calendar-o me-2"></i>
            <span>Diposting {{ Carbon\Carbon::parse($pengumuman_detail->created_at)->isoFormat('DD MMMM Y') }}</span>
        </div>
        <div class="icons-group d-flex align-items-center">
            <i class="la la-eye me-2"></i>
            <span>Dilihat {{ $pengumuman_detail->counter }} kali</span>
        </div>
    </div>
</div>