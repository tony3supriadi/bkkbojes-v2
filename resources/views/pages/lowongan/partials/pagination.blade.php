<div class="mt-3">
    <div class="row">
        <div class="col-md-6 mb-2">
            <a href="{{ $data->onFirstPage() ? '#' : $data->url(1)  }}" class="text-decoration-none">
                <span class="la la-angle-left {{ $data->onFirstPage() ? 'text-muted' : 'text-secondary' }} fw-bold"></span>
            </a>

            <!-- @if (!$data->onFirstPage())
            <a href="#" class="text-decoration-none">
                <small class="text-secondary mx-3">...</small>
            </a>
            @endif -->

            @for($i = 0; $i < $data->lastPage(); $i++)
                <a href="{{ $data->url($i + 1) }}" class="text-decoration-none">
                    <small class="{{ $data->currentPage() == ($i + 1) ? 'text-primary' : 'text-secondary' }} mx-3">{{ $i + 1 }}</small>
                </a>
                @endfor

                <!-- <a href="#" class="text-decoration-none">
                <small class="text-secondary mx-3">...</small>
            </a> -->

                <a href="{{ $data->lastPage() == $data->currentPage() ? '#' : $data->url($data->lastPage())  }}" class="text-decoration-none">
                    <span class="la la-angle-right {{ $data->lastPage() == $data->currentPage() ? 'text-muted' : 'text-secondary' }} fw-bold"></span>
                </a>
        </div>

        <div class="col-md-6 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <small style="float: right">
                        Menampilkan <strong>{{ $data->currentPage() }}</strong> dari <strong>{{ $data->lastPage() }}</strong> halaman |
                        Total <strong>{{ $data->total() }}</strong> Lowongan
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>