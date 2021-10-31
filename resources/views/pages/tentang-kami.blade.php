@extends('layouts.app')

@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <div class="container d-flex justify-content-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Tentang Kami</li>
        </ol>

        <div class="back m-0">
            <a href="#" class="text-secondary" style="text-decoration:none">
                <img src="{{ asset('images/icons/arrow-circle-left-solid.png') }}" />
                Kembali
            </a>
        </div>
    </div>
</nav>
@endsection

@section('content')
<section class="title">
    <div class="container">
        <div class="icons-group text-secondary d-flex align-items-center">
            <img src="{{ asset('images/icons/orange/id-card.png') }}" class="me-3" />
            <h2>Tentang Kami</h2>
        </div>
    </div>
</section>

<section id="tentang-kami">
    <div class="container mb-5">
        <div class="field-content">
            <h5><span>Latar Belakang<span></h5>
            <p>Kemudahan teknologi memudahkan kita mengakses informasi lowongan kerja, sayangnya terlalu banyak informasi justru menjadi tantangan untuk melakukan seleksi dalam memilih dan memvalidasi informasi lowongan kerja yang ada di internet. Tidak hanya itu, jaminan keamanan data juga menjadi perhatian agar tidak disalahgunakan, berangkat dari situ, kami membangun situs ini untuk memberikan solusi terhadap masalah yang dialami para pencari kerja khususnya siswa SMK N 1 Bojongsari, walaupun tidak terbatas untuk siswa atau alumni saja, tapi juga dapat diakses oleh pengguna umum.</p>
            <p>Bagi Instansi/ perusahaan juga dapat lebih mudah mendapatkan calon tenaga kerja lulusan SMK yang sesuai dengan kualifikasi perusahaan, mengirimkan informasi lowongan kerja ke situs ini, untuk mendapatkan calon tenaga kerja yang sesuai dengan kriteria/ kualifikasi yang diinginkan.</p>
        </div>

        <div class="field-content">
            <h5><span>Latar Belakang<span></h5>
            <div class="row">
                <div class="col-md-6 mt-2">
                    <p><strong>Untuk calon tenaga kerja :</strong></p>
                    <li>Pendaftaran Akun</li>
                    <li>Mesin pencarian lowongan kerja dengan filter untuk memudahkan pencarian yang lebih spesifik</li>
                    <li>Fitur <strong>Ajukan Lamaran</strong> untuk melamar pekerjaan langsung</li>
                    <li>Dashboard profil untuk memperbaharui profil dan Resume</li>
                    <li>Laman Pengumuman untuk mengetahui update terkini</li>
                    <li>Email Subscription, langganan email untuk menerima informasi terkini terkait informasi lowongan yang dilamar </li>
                    <li>Unduh untuk mencetak Resume</li>
                </div>
                <div class="col-md-6 mt-2">
                    <p><strong>Untuk Perusahaan / Mitra :</strong></p>
                </div>
            </div>
        </div>

        <div class="field-content">
            <h5><span>Legalitas<span></h5>
            <span>Surat Keputusan Depnaker Nomor : -</span><br>
            <span>Surat Tanda Terdaftar Bursa Kerja Khusus Dinas Koperasi, UKM, Tenaga Kerja dan Transmigrasi Pemerintah</span><br>
            <span>Kab. Purbalingga Nomor : -</span><br>
            <span>Surat Keputusan Kepala SMK N 1 Bojongsari Nomor -</span>
        </div>

        <div class="field-content">
            <h5><span>Kepengurusan<span></h5>
            <div class="mb-4">
                <span><strong>Penanggung jawab</strong></span><br>
                <span class="ms-3 mt-3">Lorem ipsum dolor sit amet</span><br>
            </div>
            <div class="mb-4">
                <span><strong>Pembina</strong></span><br>
                <span class="ms-3">Lorem ipsum dolor sit amet</span><br>
            </div>
            <div class="mb-4">
                <span><strong>Ketua BKK</strong></span><br>
                <span class="ms-3">Lorem ipsum dolor sit amet</span><br>
            </div>
            <div class="mb-4">
                <span><strong>Petugas Administrasi/tata usaha & Pendaftaran</strong></span><br>
                <span class="ms-3">Lorem ipsum dolor sit amet</span><br>
            </div>
            <div class="mb-4">
                <span><strong>Petugas Penyuluhan & Bimbingan Jabatan dan Analisi Jabatan</strong></span><br>
                <span class="ms-3">Lorem ipsum dolor sit amet</span><br>
            </div>
            <div class="mb-4">
                <p><strong>Petugas Informasi Pasar Kerja & Penelusuran Alumni</strong></p>
                <span class="ms-3">Lorem ipsum dolor sit amet</span><br>
            </div>
            <div class="mb-4">
                <span><strong>Petugas Penempatan Kerja dan Kunjungan Perusahaan</strong></span><br>
                <span class="ms-3">Lorem ipsum dolor sit amet</span><br>
            </div>
            <div class="mb-4">
                <span><strong>Web Administrator</strong></span><br>
                <span class="ms-3">Lorem ipsum dolor sit amet</span><br>
            </div>
        </div>

        <div class="field-content">
            <h5><span>Kontak Kami:<span></h5>
            <span>Alamat : Jl. Raya Bojongsari, Dusun 1, Bojongsari, Kec. Bojongsari, Kabupaten Purbalingga, Jawa Tengah, 53382</span><br>
            <span>Telpon: (0281) 6596942</span><br>
            <span>Email : bkk@smkn1bojongsari.sch.id</span><br>
        </div>
    </div>
</section>
@endsection
