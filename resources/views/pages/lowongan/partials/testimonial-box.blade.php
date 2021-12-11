@php
use App\Models\Testimonial;
$daftarTestimonial = Testimonial::select('testimonial.*', 'personal.photo', 'personal.nama_depan', 'personal.nama_belakang')
->join('personal', 'personal.id', '=', 'personal_id')
->orderBy('testimonial.created_at', 'DESC')
->limit(1)
->get();
@endphp
<div class="card card-body box-card mb-3">
    <div class="box-title d-flex">
        <i class="la la-comments me-3"></i>
        Kata Mereka
    </div>

    <div class="py-2">
        @if(count($daftarTestimonial))
        @foreach($daftarTestimonial as $testimoni)
        <div class="row d-flex align-items-center">
            <div class="col-4">
                <div class="avatar-image avatar-md">
                    @if($testimoni->photo)
                    <img src="{{ asset('uploads/personal/'.$testimoni->photo) }}" alt="avatar" />
                    @else
                    <div class="user-photo bg-primary text-white mb-2 rounded-circle d-flex align-items-center justify-content-center fw-semibold fs-1" style="width:70px;height:70px">
                        {{ strtoupper(substr($testimoni->nama_depan, 0, 1)) }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-8 px-0">
                <h6 class="text-primary fw-bold mb-2">{{ $testimoni->nama_depan }} {{ $testimoni->nama_belakang }}</h6>
            </div>
            <div class="col-12 mt-3">
                <small>
                    {!! $testimoni->testimonial !!}
                </small>
            </div>
        </div>
        @endforeach
        @else
        <div class="card card-body text-center">
            <i class="la la-warning fa-5x text-muted d-block mb-3"></i>
            <p class="text-muted">BELUM ADA TESTIMONIAL</p>
        </div>
        @endif
    </div>
</div>