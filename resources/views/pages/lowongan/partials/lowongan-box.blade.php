<a href="{{ route('lowongan.show', $lowongan->slug) }}">
    <div class="card card-body box-card mb-3">
        <div class="box-title">
            <div class="row">
                <div class="col-md-5">
                    <a href="{{ route('lowongan.show', $lowongan->slug) }}" class="" style="text-decoration:none">
                        <h5>{{ $lowongan->judul }}</h5>
                    </a>
                    <h6>{{ $lowongan->mitra_nama }}</h6>
                </div>

                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="col-md-12">
                                <div class="icons-desc-group d-flex align-items-center mb-2">
                                    <img src="{{ asset('images/icons/map-marker-alt-solid.png') }}" class="me-2" />
                                    <span>{{ $lowongan->provinsi ? $wilayah->getName($lowongan->kabupaten) . ", " . $wilayah->getName($lowongan->provinsi) : '-' }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icons-desc-group d-flex align-items-center mb-2">
                                    <img src="{{ asset('images/icons/user-tag-solid.png') }}" class="me-2" />
                                    <span>
                                        @php use App\Models\Programstudi; @endphp
                                        @php $program_studi = [] @endphp
                                        @foreach(json_decode($lowongan->program_studi) as $item)
                                        @php $program_studi[] = Programstudi::find($item)->nama @endphp
                                        @endforeach
                                        {{ implode(", ", $program_studi) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="col-md-12">
                                <div class="icons-desc-group d-flex align-items-center mb-2">
                                    <img src="{{ asset('images/icons/business-time-solid.png') }}" class="me-2" />
                                    <span>{{ $lowongan->tipe_pekerjaan }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icons-desc-group d-flex align-items-center">
                                    <img src="{{ asset('images/icons/hand-holding-usd-solid.png') }}" class="me-2" />
                                    <span>Rp{{ $lowongan->tampilkan_gaji ? number_format($lowongan->kisaran_gaji, 0, ",", ".") : 'Disembunyikan' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <div class="icons-desc-group me-3">
                            <img src="{{ asset('images/icons/day-ago.png') }}" class="me-1" />
                            <span>{{ $lowongan->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="icons-desc-group">
                            <i class="la la-calendar-times-o me-1" style="font-size:16px"></i>
                            <span>Berakhir pada {{ Carbon\Carbon::parse($lowongan->tanggal_berakhir)->isoFormat('DD MMMM Y') }}</span>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="icons-desc-group mx-1">
                            <i class="la la-eye me-1" style="font-size:16px"></i>
                            <span>dilihat {{ $lowongan->counter }} kali</span>
                        </div>
                        @if (date('Y-m-d') > $lowongan->tanggal_berakhir)
                        <div class="icons-desc-group mx-1">
                            <span class="badge bg-danger text-white">
                                Tutup
                            </span>
                        </div>
                        @else
                        <div class="icons-desc-group mx-1">
                            <span class="badge bg-success text-white">
                                Buka
                            </span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>