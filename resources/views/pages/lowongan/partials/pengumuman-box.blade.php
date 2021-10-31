@php
use App\Models\Pengumuman;
$daftarPengumuman = Pengumuman::where('publish', '=', true)->limit(5)->get();
@endphp

<div class="card card-body box-card mb-3">
    <div class="box-title d-flex">
        <i class="la la-newspaper me-3"></i>
        Pengumuman
    </div>

    <ul class="list-group list-group-flush">
        @if (count($daftarPengumuman))
        @foreach($daftarPengumuman as $item)
        <li class="list-group-item border-0 py-1 px-0">
            <a href="{{ route('pengumuman-detail', $item->link) }}">{{ $item->judul }}</a>
        </li>
        @endforeach
        @else
        <div class="card card-body text-center">
            <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
            <p class="text-muted">BELUM ADA PENGUMUMAN</p>
        </div>
        @endif
    </ul>
</div>