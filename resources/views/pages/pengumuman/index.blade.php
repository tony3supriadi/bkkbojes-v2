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
<section class="title">
    <div class="container text-secondary d-flex align-items-center">
        <i class="las la-bullhorn fa-4x text-primary me-4"></i>
        <h2 class="fw-bold">Pengumuman</h2>
    </div>
</section>
<section class="pengumuman">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-md-3">
                <!-- Box Pengumuman -->
                @include('pages.pengumuman.partials.pengumuman-box')
            </div>
            <div class="col-md-9">
                <!-- Content Pengumuman -->
                @include('pages.pengumuman.partials.pengumuman-content')
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
<script src="{{ asset('admin/vendors/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: '100%',
            minimumResultsForSearch: -1
        });
    });
</script>
@endpush