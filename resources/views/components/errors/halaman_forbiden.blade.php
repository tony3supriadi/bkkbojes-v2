@section('content')
<section>
    <div class="container pt-3 mt-3 mb-5 pb-5 text-center">
        <h3 class="text-danger mt-4"><strong>Ups.. sayang sekali</strong></h3>
        <p class="mb-3">Kamu belum bisa mengaksesnya, karena kamu <strong>belum login</strong></p>
        <p><img src="{{ asset('images/hero-403.png') }}" alt="Maaf, laman ini masih dalam pengembangan" /></p>
        <a href="{{ route('login') }}" role="button" class="btn btn-primary mb-2">Login</a>
        <p>atau <a href="{{ route('daftar') }}" class="text-secondary">buat akun disini</a>.</p>
    </div>
</section>
@endsection