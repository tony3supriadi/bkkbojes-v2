@php
use App\Models\Pengumuman;
@endphp

@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Pengumuman</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section class="pengumuman">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Box Pengumuman -->
                @include('pages.pengumuman.partials.pengumuman-box')
            </div>
            <div class="col-md-9 p-5 text-center">
                <img src="{{ asset('images/hero-01.png') }}" alt="pengumuman" width="250px" class="mb-4" />
                <h5 class="text-secondary"><strong>Ada {{ number_format(Pengumuman::where('publish', '=', 1)->count(), 0, ',', '.') }} pengumuman terpublikasi.</strong></h5>
                <p class="text-muted">Pengumuman yang merupakan informasi mengenai lowongan pekerjaan.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2-bootstrap.min.css') }}">
@endpush

@push('scripts')
@push('scripts')
<script src="{{ asset('vendors/jQuery-slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('admin/vendors/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.slimscroll').slimScroll({
            height: '620px',
        });

        $('.select2').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%',
            minimumResultsForSearch: -1
        });

        $('#sorting').on('change', function() {
            window.location.href = '?sort=' + $(this).val();
        });
    });
</script>
@endpush