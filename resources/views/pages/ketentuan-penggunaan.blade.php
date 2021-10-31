@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Ketentuan Penggunaan</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
@include('components.errors.halaman_dikembangkan')
@endsection
