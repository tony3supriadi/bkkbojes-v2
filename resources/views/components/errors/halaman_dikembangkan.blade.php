@section('content')
<section>
    <div class="container pt-3 mt-3 mb-5 pb-5 text-center">
        <img src="{{ asset('images/hero-dev.png') }}" alt="Maaf, laman ini masih dalam pengembangan" />
        <h3 class="text-danger mt-4"><strong>Oops!!</strong></h3>
        <p class="mb-5">Maaf, laman ini masih dalam pengembangan</p>

        <a href="{{ url()->previous() }}" class="btn btn-danger text-white">Kembali</a>
    </div>
</section>
@endsection