@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Tentang Kami</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section class="title">
    <div class="container">
        <div class="icons-group text-secondary d-flex align-items-center">
            <img src="{{ asset('images/icons/orange/id-card.png') }}" class="me-3" />
            <h2 class="mb-0 fw-bold">Tentang Kami</h2>
        </div>
    </div>
</section>

<section id="tentang-kami">
    <div class="container mb-5">
        @foreach($tentang_kami as $item)
        <div class="field-content">
            <h2 class="section-title"><span>{{ $item->point }}<span></h2>
            {!! $item->content !!}
        </div>
        @endforeach
    </div>
</section>
@endsection