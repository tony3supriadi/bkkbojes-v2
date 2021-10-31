@php
use App\Models\Lowongan;
$daftar_lowongan = Lowongan::where('publish', '=', true)
->where('tanggal_berakhir', '>', date('Y-m-d'))
->limit(5)
->get();
@endphp

<div class="card card-body box-card mb-3">
    <div class="box-title d-flex">
        <i class="la la-briefcase me-3"></i>
        Lowongan
    </div>

    @if (count($daftar_lowongan))
    <ul class="list-group list-group-flush">
        @foreach($daftar_lowongan as $item)
        <li class="list-group-item border-0 py-1 px-0">
            <a href="{{ $item->slug }}" class="text-decoration-none">{{ $item->judul }}</a>
        </li>
        @endforeach
    </ul>
    @else
    <div class="card card-body text-center">
        <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
        <p class="text-muted">TIDAK ADA LOWONGAN AKTIF</p>
    </div>
    @endif
</div>