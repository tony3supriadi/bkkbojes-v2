@extends('pages.akun.akun')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.profile.personal') }}">Akun</a></li>
            <li class="breadcrumb-item active">Pemberitahuan</li>
        </ol>
    </div>
</nav>
@endsection

@section('account-content')
<div class="card card-body p-0">
    <div class="account-content p-0">
        <div class="page-title p-3 d-flex justify-content-between">
            <h4 class="d-inline-block mb-0">
                <i class="la la-bookmark text-primary"></i>
                <span>Lowongan tersimpan</span>
            </h4>
        </div>
        <div class="page-content bg-light p-3 slimscroll">
            @if (count($pengumuman))
            @foreach($pengumuman as $item)
            <div class="card card-body border-0 shadow-sm mb-3">
                <h6 class="{{ date_diff(date_create(), date_create($item->created_at))->d > 1 ? 'fw-normal' : 'fw-bold' }}">
                    <a href="{{ route('akun.pemberitahuan-detail', $item->slug) }}" class="text-decoration-none text-secondary">
                        {{ $item->judul }}
                    </a>
                </h6>
                <div class="d-flex justify-content-between">
                    <small class="text-muted me-1 d-inline-block">
                        <i class="la la-history me-1"></i>{{ date_diff(date_create(), date_create($item->created_at))->d > 1 ? 'Diterbitkan pada: ' . Carbon\Carbon::parse($item->created_at)->isoFormat('D MMM Y H:m') : $item->created_at->diffForHumans() }}
                    </small>
                    <small class="d-inline-block mx-1">
                        <a href="{{ route('akun.pemberitahuan-detail', $item->slug) }}" class="text-decoration-none text-muted">
                            Lihat detail <i class="la la-angle-double-right"></i>
                        </a>
                    </small>
                </div>
            </div>
            @endforeach
            @else
            <div class="card card-body border-0 shadow-sm text-center p-5">
                <span class="la la-file-alt fa-5x text-muted mb-3"></span>
                <h5 class="text-muted">Tidak ada pemberitahuan untuk anda.</h5>
            </div>
            @endif
        </div>
    </div>
</div>
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