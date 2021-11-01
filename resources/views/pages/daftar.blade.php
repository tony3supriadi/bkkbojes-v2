@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar</li>
        </ol>
    </div>
</nav>
@endsection

@section('content')
<section id="register-page">
    <div class="container">
        <div class="row">
            <div class="col-md-5 d-none d-md-inline-block">
                <div class="register-info">
                    <div class="images text-center mb-3">
                        <img src="{{ asset('images/hero-04.png') }}" alt="register-image" />
                    </div>
                    <h3 class="text-primary">Daftar Gratis</h3>
                    <p>Buat akun untuk mendapatkan fitur-fitur dari Bursa Kerja Khusus SMK N 1 Bojongsari :</p>
                    <ul>
                        <li>Pencarian lowongan dan ajukan lamaran</li>
                        <li>Simpan dan berbagi info lowongan kerja</li>
                        <li>Buat dan unduh Curriculum Vitae otomatis</li>
                        <li>Pantau progress lamaran dan terima update</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-body register-box">
                    <h3>Buat Akun</h3>
                    <p>Silahkan isi formulir berikut :</p>

                    <form action="{{ route('daftar') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input type="text" name="nama_depan" id="nama_depan" value="{{ old('nama_depan') }}" class="form-control @error('nama_depan') is-invalid border-danger @enderror" autocomplete="off" autofocus>

                                    @error('nama_depan')
                                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input type="text" name="nama_belakang" id="nama_belakang" value="{{ old('nama_belakang') }}" class="form-control @error('nama_belakang') is-invalid border-danger @enderror" autocomplete="off">

                                    @error('nama_belakang')
                                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">E-Mail</label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid border-danger @enderror" autocomplete="off">

                            @error('email')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">No HP / WA</label>
                            <input type="number" name="phone" id="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid border-danger @enderror" autocomplete="off">

                            @error('phone')
                            <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid border-danger @enderror" autocomplete="off">

                                    @error('username')
                                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="jenis_akun">Jenis Akun</label>
                                    <select name="jenis_akun" data-placeholder="" class="form-control select2-nosearch @error('jenis_akun') is-invalid @enderror">
                                        <option></option>
                                        <option value="Alumni" <?= old('jenis_akun') == 'Alumni' ? 'selected' : '' ?>>Alumni</option>
                                        <option value="Siswa" <?= old('jenis_akun') == 'Siswa' ? 'selected' : '' ?>>Siswa</option>
                                        <option value="Umum" <?= old('jenis_akun') == 'Umum' ? 'selected' : '' ?>>Umum</option>
                                    </select>

                                    @error('jenis_akun')
                                    <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Buat Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control @error('password') border-danger is-invalid @enderror" />
                                <div class="input-group-append password_eyes">
                                    <span class="input-group-text @error('password') border-danger @enderror">
                                        <i class="la la-eye-slash"></i>
                                    </span>
                                </div>

                                @error('password')
                                <div class="invalid-feedback">{{ ucfirst($message) }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                                <div class="input-group-append confirmation_eyes">
                                    <span class="input-group-text">
                                        <i class="la la-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input class="form-check-input @error('agree') border-danger @enderror" type="checkbox" value="1" id="agree" name="agree" {{ old('agree') ? 'checked' : '' }} />
                                <label class="form-check-label" for="agree">
                                    Dengan mendaftar, saya menyetujui <a href="">Ketentuan Penggunaan</a> & <a href="">Kebijakan Privasi</a>.
                                </label>
                            </div>

                            @error('agree')
                            <div class="text-danger"><small>{{ ucfirst($message) }}</small></div>
                            @enderror
                        </div>


                        <div class="form-group d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary">
                                Buat akun saya
                            </button>
                        </div>

                        <p class="text-login text-center">Sudah punya akun? <a href="{{ route('login') }}">Login disini</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/select2/css/select2-bootstrap.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('admin/vendors/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/inits/select2.js') }}"></script>
<script src="{{ asset('/js/pages/register.js') }}"></script>
@endpush