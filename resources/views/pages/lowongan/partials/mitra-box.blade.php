@php
use App\Models\Mitra;
$Daftarmitra = Mitra::orderBy('id', 'DESC')->limit(1)->get();
@endphp
<div class="card card-body box-card mb-3">
    <div class="box-title d-flex">
        <img src="{{ asset('images/icons/orange/handshake32x32.png') }}" class="me-3" />
        Mitra Kami
    </div>

    <div class="py-1">
        <div class="row">
            <div class="col-12">
                @if (count($Daftarmitra))
                @foreach($Daftarmitra as $mitra)
                <a href="{{ route('daftar-mitra-detail', $mitra->uuid) }}" class="text-decoration-none">
                    <img src="{{ asset('images/mitra/'.$mitra->logo) }}" />
                </a>
                @endforeach
                @else
                <div class="card card-body text-center">
                    <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
                    <p class="text-muted">BELUM ADA DAFTAR MITRA</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>