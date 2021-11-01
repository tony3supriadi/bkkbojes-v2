<div class="card mb-3 border-0 shadow-sm">
    <div class="card-header bg-white border-white">
        <div class="box-title-detail">
            <div class="row">
                <div class="col-9">
                    <h4 class="text-primary fw-bold">{{ $lowongan->judul }}</h4>
                    <h6>{{ $lowongan->mitra_nama }}</h6>
                </div>

                <div class="col-3">
                    <div class="row">
                        <div class="col-12 text-end">
                            @if ($tersimpan)
                            <button type="button" class="btn btn-link btn-sm text-decoration-none">
                                <small class="text-primary d-flex align-items-center">
                                    <i class="fas fa-bookmark me-2" style="font-size:16px"></i>
                                    <span class="d-none d-md-inline-block" style="font-size:14px;">Tersimpan</span>
                                </small>
                            </button>
                            @else
                            <form action="{{ route('lowongan.save') }}" method="post" id="lowongan_save">
                                @csrf
                                <input type="hidden" name="personal_id" value="{{ Auth::guard('personal')->user()->id }}">
                                <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                                <button type="submit" class="btn btn-link btn-sm text-decoration-none">
                                    <small class="d-flex align-items-center">
                                        <i class="far fa-bookmark me-2" style="font-size:16px"></i>
                                        <span class="d-none d-md-inline-block text-secondary" style="font-size:14px;">Simpan</span>
                                    </small>
                                </button>
                            </form>
                            @endif
                        </div>
                        <!-- <div class="col-6">
                            <button type="button" class="btn btn-link btn-sm text-decoration-none">
                                <small class="d-flex align-items-center">
                                    <img src="{{ asset('images/icons/share-solid.png') }}" class="me-2">
                                    <span class="d-none d-md-inline-block text-secondary" style="font-size:14px;">Bagikan</span>
                                </small>
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="py-3 ms-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="input-group d-flex align-items-center" style="color: gray">
                            <h6><small>
                                    <img src="{{ asset('images/icons/map-marker-alt-solid.png') }}" class="me-2" />
                                    {{ $wilayah->getName($lowongan->kabupaten) }}, {{ $wilayah->getName($lowongan->provinsi) }}
                                </small></h6>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group d-flex align-items-center" style="color: gray">
                            <h6><small>
                                    <img src="{{ asset('images/icons/user-tag-solid.png') }}" class="me-2" />
                                    @php use App\Models\Programstudi; @endphp
                                    @php $program_studi = [] @endphp
                                    @foreach(json_decode($lowongan->program_studi) as $item)
                                    @php $program_studi[] = Programstudi::find($item)->nama @endphp
                                    @endforeach
                                    {{ implode(", ", $program_studi) }}
                            </h6></small>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="col-md-12">
                        <div class="input-group d-flex align-items-center" style="color: gray">
                            <h6><small>
                                    <img src="{{ asset('images/icons/business-time-solid.png') }}" class="me-2" />
                                    {{ $lowongan->tipe_pekerjaan }}
                            </h6></small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group d-flex align-items-center" style="color: gray">
                            <h6><small>
                                    <img src="{{ asset('images/icons/hand-holding-usd-solid.png') }}" class="me-2" />
                                    <span>Rp{{ $lowongan->tampilkan_gaji ? number_format($lowongan->kisaran_gaji, 0, ",", ".") : 'Disembunyikan' }}</span>
                            </h6></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group">
            <div class="card-header border-white box-description">
                <div class="description-title d-flex">
                    <img src="{{ asset('images/icons/tasks-solid.png') }}" class="me-3">
                    Deskripsi Pekerjaan
                </div>
            </div>
            <div class="card-body">
                <div class="list-content">
                    {!! $lowongan->deskripsi !!}
                </div>
            </div>
        </li>
        <li class="list-group">
            <div class="card-header border-white box-description">
                <div class="description-title d-flex">
                    <img src="{{ asset('images/icons/user-check-solid.png') }}" class="me-3">
                    Kualifikasi
                </div>
            </div>
            <div class="card-body">
                <div class="list-content">
                    {!! $lowongan->kualifikasi !!}
                </div>
            </div>
        </li>
        <li class="list-group">
            <div class="card-header border-white box-description">
                <div class="description-title d-flex">
                    <img src="{{ asset('images/icons/file-invoice-dollar-solid.png') }}" class="me-3">
                    Gaji dan Fasilitas
                </div>
            </div>
            <div class="card-body">
                <div class="list-content">
                    {!! $lowongan->benefit !!}
                </div>
            </div>
        </li>
        <li class="list-group">
            <div class="card-header border-white box-description">
                <div class="description-title d-flex">
                    <img src="{{ asset('images/icons/sticky-note.png') }}" class="me-3">
                    Catatan
                </div>
            </div>
            <div class="card-body">
                <div class="list-content">
                    {!! $lowongan->catatan !!}
                </div>
            </div>
        </li>
    </ul>

    <div class="row p-3">
        <div class="col-9 d-flex">
            <div class="icons-group d-flex align-items-center mx-2">
                <img src="{{ asset('images/icons/day-ago.png') }}" class="me-1" />
                <span>{{ $lowongan->created_at->diffForHumans() }}</span>
            </div>
            <div class="icons-group d-flex align-items-center mx-2">
                <i class="la la-calendar-times-o me-1" style="font-size:16px"></i>
                <span>Berakhir pada {{ Carbon\Carbon::parse($lowongan->tanggal_berakhir)->isoFormat('DD MMMM Y') }}</span>
            </div>
            <div class="icons-group d-flex align-items-center mx-2">
                <i class="la la-eye me-1" style="font-size:16px"></i>
                <span>dilihat {{ $lowongan->counter }} kali</span>
            </div>
        </div>
        <div class="col-3 d-grid gap-2">
            @if ($lamaran)
            <button type="button" role="button" class="btn btn-primary text-white" disabled>
                <i class="fa fa-paper-plane me-1"></i>
                Kirim Lamaran
            </button>
            @else
            <a href="{{ route('lowongan.kirim-lamaran', $lowongan->slug) }}" role="button" class="btn btn-primary">
                <i class="fa fa-paper-plane me-1"></i>
                Kirim Lamaran
            </a>
            @endif
        </div>
    </div>
</div>