@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">FAQ</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section class="faq my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card card-body border-0 box-card p-md-4 p-2 mb-3">
                    <div class="accordion accordion-flush">
                        @php $index = 0; @endphp
                        @foreach($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $faq->id }}" aria-expanded="{{ $index > 0 ? 'false' : 'true' }}" aria-controls="flush-collapse-{{ $faq->id }}" class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}">
                                    <strong>{{ $faq->point }}</strong>
                                </button>
                            </h2>
                            <div id="flush-collapse-{{ $faq->id }}" class="accordion-collapse collapse {{ $index > 0 ? '' : 'show' }}" aria-labelledby="flush-heading-{{ $faq->id }}" data-bs-parent="#accordion-flus-{{ $faq->id }}">
                                <div class="accordion-body">{!! $faq->content !!}</div>
                            </div>
                        </div>
                        @php $index++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Lowongan Kerja -->
                @include('pages.faq.partials.lowongan-box')

                <!-- Pengumuman -->
                @include('pages.lowongan.partials.pengumuman-box')

                <!-- Mitra Kami -->
                @include('pages.lowongan.partials.mitra-box')

            </div>
        </div>
    </div>
</section>
@endsection