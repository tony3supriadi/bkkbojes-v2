@php
use App\Models\Mitra;
@endphp

@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Mitra</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section class="mitra">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Box Mitra -->
                @include('pages.mitra.partials.mitra-box')
            </div>
            <div class="col-md-9 p-5 text-center">
                <img src="{{ asset('images/hero-01.png') }}" alt="no-mitra" width="250px" class="mb-4" />
                <h5 class="text-secondary"><strong>Ada {{ number_format(Mitra::where('publish', '=', 1)->count(), 0, ',', '.') }} mitra kerja sama yang terdaftar.</strong></h5>
                <p class="text-muted">Mitra merupakan perusahaan atau intansi pemberi lapangan kerja.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('vendors/jQuery-slimScroll/jquery.slimscroll.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.slimscroll').slimScroll({
            height: '620px',
        });
    })
</script>
@endpush