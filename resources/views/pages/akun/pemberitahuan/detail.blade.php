@extends('pages.akun.akun')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.profile.personal') }}">Akun</a></li>
            <li class="breadcrumb-item"><a href="{{ route('akun.pemberitahuan') }}">Pemberitahuan</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
</nav>
@endsection

@section('account-content')
@include('pages.pengumuman.partials.pengumuman-content')
@endsection