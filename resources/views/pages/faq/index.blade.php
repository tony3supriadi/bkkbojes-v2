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
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed border-bottom" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <strong>Accordion Item #1</strong>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                            </div>
                        </div>
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