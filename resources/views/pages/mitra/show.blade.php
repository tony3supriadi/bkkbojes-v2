@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('daftar-mitra') }}">Daftar Mitra</a></li>
            <li class="breadcrumb-item active">{{ $mitra->nama }}</li>
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
            <div class="col-md-9">
                <!-- Content Mitra -->
                @include('pages.mitra.partials.mitra-content')
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