<?php

use App\Models\Pengumuman;

$pengumuman = Pengumuman::select('pengumuman.*', 'mitra.logo as mitra_logo', 'mitra.nama as mitra_nama')
    ->where('pengumuman.publish', '=', true)
    ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
    ->orderBy('pengumuman.created_at', 'DESC')->get();

if (request()->get('sort') == 'newest') {
    $pengumuman = Pengumuman::select('pengumuman.*', 'mitra.logo as mitra_logo', 'mitra.nama as mitra_nama')
        ->where('pengumuman.publish', '=', true)
        ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
        ->orderBy('pengumuman.created_at', 'DESC')->get();
} else
if (request()->get('sort') == 'oldest') {
    $pengumuman = Pengumuman::select('pengumuman.*', 'mitra.logo as mitra_logo', 'mitra.nama as mitra_nama')
        ->where('pengumuman.publish', '=', true)
        ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
        ->orderBy('pengumuman.created_at', 'ASC')->get();
} else
if (request()->get('sort') == 'visit') {
    $pengumuman = Pengumuman::select('pengumuman.*', 'mitra.logo as mitra_logo', 'mitra.nama as mitra_nama')
        ->where('pengumuman.publish', '=', true)
        ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
        ->orderBy('pengumuman.counter', 'DESC')->get();
}
?>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white">
        <div class="mb-2 mb-md-0">
            <select id="sorting" name="sort" class="form-control select2">
                <i class="la la-angle-down"></i>
                <option value="newest" {{ request()->get('sort') == 'newest' ? 'selected' : '' }}>Paling Baru</option>
                <option value="oldest" {{ request()->get('sort') == 'oldest' ? 'selected' : '' }}>Paling Lama</option>
                <option value="visit" {{ request()->get('sort') == 'visit' ? 'selected' : '' }}>Banyak Dilihat</option>
            </select>
        </div>
    </div>
    <div class="card-body bg-white p-2 slimscroll">
        @foreach($pengumuman as $item)
        <a href="{{ url('pengumuman/'.$item->slug) }}" class="text-decoration-none">
            <div class="card card-body mb-2 py-2">
                <div class="box-sidebar">
                    <div class="row">
                        <div class="{{ $item->mitra_id ? 'col-8 col-md-8' : 'col-12 col-md-12' }}">
                            <p class="fw-bold mb-0">{{ $item->judul }}</p>
                            @if ($item->mitra_id)
                            <div class="sidebar-description d-flex align-items-center">
                                {{ $item->mitra_nama }}
                            </div>
                            @endif
                        </div>

                        @if ($item->mitra_id)
                        <div class="col-2 me-5 col-md-1 sidebar-logo">
                            <img src="{{ Storage::url('public/uploads/mitra/'.$item->mitra_logo) }}" class="me-3" width="60px" height="60px" />
                        </div>
                        @endif
                    </div>
                </div>
                <div class="box-sidebar-footer d-flex justify-content-between">
                    <div class="icon-group d-flex align-items-center">
                        <img src="{{ asset('images/icons/day-ago.png') }}" class="me-2" />
                        {{ $item->created_at->diffForHumans() }}
                    </div>
                    <span class="icon-group">
                        <i class="la la-eye me-1" style="font-size: 14px;"></i>
                        Dilihat {{ $item->counter }} kali
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>