<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('lowongan', [LowonganController::class, 'index'])->name('lowongan');
Route::get('lowongan-detail', [LowonganController::class, 'lowongan_detail'])->name('lowongan-detail');
Route::get('pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('pengumuman/{link}', [PengumumanController::class, 'pengumuman-detail'])->name('pengumuman-detail');
Route::get('daftar-mitra', [DaftarMitraController::class, 'index'])->name('daftar-mitra');
Route::get('daftar-mitra/{uuid}', [DaftarMitraController::class, 'show'])->name('daftar-mitra-details');
Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');
Route::get('ketentuan-penggunaan', [KetentuanPenggunaanController::class, 'index'])->name('ketentuan-penggunaan');
Route::get('kebijakan-privasi', [KebijakanPrivasiController::class, 'index'])->name('kebijakan-privasi');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);

//Daftar Akun
Route::get('daftar', [DaftarController::class, 'index'])->name('daftar');
Route::post('daftar', [DaftarController::class, 'register']);
Route::get('/daftar/konfirmasi', [DaftarController::class, 'confirm_page'])->name('verification.notice');
Route::post('/daftar/konfirmasi/resend', [DaftarController::class, 'confirm_resend'])
    ->name('verification.resend')->middleware(['auth:personal', 'throttle:6,1']);
Route::get('/daftar/konfirmasi/{id}/{hash}', [DaftarController::class, 'confirm_verify'])
    ->name('verification.verify')->middleware(['auth:personal', 'signed', 'throttle:6,1']);
Route::get('/daftar/berhasil', [DaftarController::class, 'success_page'])->name('daftar.berhasil');

Route::get('/lupa-sandi', [LupaSandiController::class, 'index'])->name('lupa-sandi');

Route::post('/logout', [LoginController::class, 'logout'])->name('akun.logout');

/** Routes Akun - Login */
Route::group([
    "prefix" => "/akun",
    "as" => "akun.",
    "middleware" => ["auth:personal", "verified"]
], function () {
    Route::get('/', [AkunController::class, 'redirectTo']);

    Route::group([
        "prefix" => "/profile-saya",
        "as" => "profile."
    ], function () {
        Route::get('/', [ProfileController::class, 'redirectTo'])->name('personal');

        Route::get('/personal', [ProfileController::class, 'personal'])->name('personal');
        Route::get('/personal/{id}/edit', [ProfileController::class, 'personal_edit'])->name('personal.edit');
        Route::put('/personal/{id}', [ProfileController::class, 'personal_update'])->name('personal.update');

        Route::get('/pengalaman', [ProfileController::class, 'pengalaman'])->name('pengalaman');
        Route::get('/pengalaman/tambah', [ProfileController::class, 'pengalaman_create'])->name('pengalaman.create');
        Route::post('/pengalaman', [ProfileController::class, 'pengalaman_store'])->name('pengalaman.store');
        Route::get('/pengalaman/{id}/edit', [ProfileController::class, 'pengalaman_edit'])->name('pengalaman.edit');
        Route::put('/pengalaman/{id}', [ProfileController::class, 'pengalaman_update'])->name('pengalaman.update');
        Route::delete('/pengalaman/{id}', [ProfileController::class, 'pengalaman_destroy'])->name('pengalaman.destroy');

        Route::get('/pendidikan', [ProfileController::class, 'pendidikan'])->name('pendidikan');
        Route::get('/pendidikan/create', [ProfileController::class, 'pendidikan_create'])->name('pendidikan.create');
        Route::post('/pendidikan', [ProfileController::class, 'pendidikan_store'])->name('pendidikan.store');
        Route::get('/pendidikan/{id}/edit', [ProfileController::class, 'pendidikan_edit'])->name('pendidikan.edit');
        Route::put('/pendidikan/{id}', [ProfileController::class, 'pendidikan_update'])->name('pendidikan.update');
        Route::delete('/pendidikan/{id}', [ProfileController::class, 'pendidikan_destroy'])->name('pendidikan.destroy');

        Route::get('/keterampilan', [ProfileController::class, 'keterampilan'])->name('keterampilan');
        Route::get('/keterampilan/edit', [ProfileController::class, 'keterampilan_edit'])->name('keterampilan.edit');
        Route::put('/keterampilan', [ProfileController::class, 'keterampilan_update'])->name('keterampilan.update');
        Route::delete('/keterampilan/{id}', [ProfileController::class, 'keterampilan_destroy'])->name('keterampilan.destroy');

        Route::get('/organisasi', [ProfileController::class, 'organisasi'])->name('organisasi');
        Route::get('/organisasi/tambah', [ProfileController::class, 'organisasi_create'])->name('organisasi.create');
        Route::post('/organisasi', [ProfileController::class, 'organisasi_store'])->name('organisasi.store');
        Route::get('/organisasi/{id}/edit', [ProfileController::class, 'organisasi_edit'])->name('organisasi.edit');
        Route::put('/organisasi/{id}', [ProfileController::class, 'organisasi_update'])->name('organisasi.update');
        Route::delete('/organisasi/{id}', [ProfileController::class, 'organisasi_destroy'])->name('organisasi.destroy');
    });

    Route::get('/resume', [AkunController::class, 'resume'])->name('resume');
    Route::get('/resume/download', [AkunController::class, 'resume_download'])->name('resume-download');
    Route::get('/resume/view/stream', [AkunController::class, 'resume_stream'])->name('resume-stream');

    Route::get('/pemberitahuan', [AkunController::class, 'pemberitahuan'])->name('pemberitahuan');
    Route::get('/pemberitahuan/{id}', [AkunController::class, 'pemberitahuan_detail'])->name('pemberitahuan-detail');

    Route::get('/lowongan-tersimpan', [AkunController::class, 'lowongan_tersimpan'])->name('lowongan-tersimpan');
    Route::get('/lamaran-terkirim', [AkunController::class, 'lamaran_terkirim'])->name('lamaran-terkirim');
    Route::get('/latihan-tes', [AkunController::class, 'latihan_tes'])->name('latihan-tes');
});


// ==========================================================================================
/** Routes Admin */
Route::get('/bkk-admin', [App\Http\Controllers\Admin\AdminController::class, 'redirectTo']);
Route::get('/app', [App\Http\Controllers\Admin\AdminController::class, 'redirectTo']);
Route::get('/app/v1', [App\Http\Controllers\Admin\AdminController::class, 'redirectTo']);

/**
 * ------------------
 * Admin Routing
 * ------------------
 * */
Route::group([
    "prefix" => "/app/v1/bkk-admin",
    "as" => "admin."
], function () {

    Route::get("/login", [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('auth.login');
    Route::post("/login", [App\Http\Controllers\Admin\LoginController::class, 'login']);

    Route::group([
        "middleware" => ["auth", "authIsAdmin"]
    ], function () {

        Route::get("/", [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
        Route::get("/dashboard", [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Artikel
        Route::get("/artikel", [App\Http\Controllers\Admin\ArtikelController::class, 'index'])->name('artikel.index');
        Route::get("/artikel/tambah", [App\Http\Controllers\Admin\ArtikelController::class, 'create'])->name('artikel.create');
        Route::post("/artikel", [App\Http\Controllers\Admin\ArtikelController::class, 'store'])->name('artikel.store');
        Route::get("/artikel/{id}/ubah", [App\Http\Controllers\Admin\ArtikelController::class, 'edit'])->name('artikel.edit');
        Route::put("/artikel/{id}", [App\Http\Controllers\Admin\ArtikelController::class, 'update'])->name('artikel.update');
        Route::delete("/artikel/{id}", [App\Http\Controllers\Admin\ArtikelController::class, 'destroy'])->name('artikel.destroy');
        Route::delete("/artikel", [App\Http\Controllers\Admin\ArtikelController::class, 'bulk_destroy'])->name('artikel.bulk_destroy');

        // Lowongan
        Route::get("/lowongan", [App\Http\Controllers\Admin\LowonganController::class, 'index'])->name('lowongan.index');
        Route::get("/lowongan/tambah", [App\Http\Controllers\Admin\LowonganController::class, 'create'])->name('lowongan.create');
        Route::post("/lowongan", [App\Http\Controllers\Admin\LowonganController::class, 'store'])->name('lowongan.store');
        Route::get("/lowongan/{id}", [App\Http\Controllers\Admin\LowonganController::class, 'show'])->name('lowongan.show');
        Route::get("/lowongan/{id}/ubah", [App\Http\Controllers\Admin\LowonganController::class, 'edit'])->name('lowongan.edit');
        Route::put("/lowongan/{id}", [App\Http\Controllers\Admin\LowonganController::class, 'update'])->name('lowongan.update');
        Route::delete("/lowongan/{id}", [App\Http\Controllers\Admin\LowonganController::class, 'destroy'])->name('lowongan.destroy');
        Route::delete("/lowongan", [App\Http\Controllers\Admin\LowonganController::class, 'bulk_destroy'])->name('lowongan.bulk_destroy');

        // Pengumuman
        Route::get("/pengumuman", [App\Http\Controllers\Admin\PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::get("/pengumuman/tambah", [App\Http\Controllers\Admin\PengumumanController::class, 'create'])->name('pengumuman.create');
        Route::post("/pengumuman", [App\Http\Controllers\Admin\PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::get("/pengumuman/{id}/ubah", [App\Http\Controllers\Admin\PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::put("/pengumuman/{id}", [App\Http\Controllers\Admin\PengumumanController::class, 'update'])->name('pengumuman.update');
        Route::delete("/pengumuman/{id}", [App\Http\Controllers\Admin\PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
        Route::delete("/pengumuman", [App\Http\Controllers\Admin\PengumumanController::class, 'bulk_destroy'])->name('pengumuman.bulk_destroy');

        // Daftar Mitra
        Route::get("/daftar-mitra", [App\Http\Controllers\Admin\MitraController::class, 'index'])->name('mitra.index');
        Route::get("/daftar-mitra/tambah", [App\Http\Controllers\Admin\MitraController::class, 'create'])->name('mitra.create');
        Route::post("/daftar-mitra", [App\Http\Controllers\Admin\MitraController::class, 'store'])->name('mitra.store');
        Route::get("/daftar-mitra/{id}/ubah", [App\Http\Controllers\Admin\MitraController::class, 'edit'])->name('mitra.edit');
        Route::put("/daftar-mitra/{id}", [App\Http\Controllers\Admin\MitraController::class, 'update'])->name('mitra.update');
        Route::delete("/daftar-mitra/{id}", [App\Http\Controllers\Admin\MitraController::class, 'destroy'])->name('mitra.destroy');
        Route::delete("/daftar-mitra", [App\Http\Controllers\Admin\MitraController::class, 'bulk_destroy'])->name('mitra.bulk_destroy');

        // Testimonial
        Route::get("/testimonial", [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('testimonial.index');
        Route::get("/testimonial/tambah", [App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('testimonial.create');
        Route::post("/testimonial", [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('testimonial.store');
        Route::get("/testimonial/{id}/ubah", [App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::put("/testimonial/{id}", [App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('testimonial.update');
        Route::delete("/testimonial/{id}", [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])->name('testimonial.destroy');
        Route::delete("/testimonial", [App\Http\Controllers\Admin\TestimonialController::class, 'bulk_destroy'])->name('testimonial.bulk_destroy');

        // Daftar Mitra
        Route::get("/pengguna/{id}/pengalaman", [App\Http\Controllers\Admin\PenggunaController::class, 'pengalaman'])->name('pengguna.pengalaman');
        Route::get("/pengguna/{id}/pendidikan", [App\Http\Controllers\Admin\PenggunaController::class, 'pendidikan'])->name('pengguna.pendidikan');
        Route::get("/pengguna/{id}/keterampilan", [App\Http\Controllers\Admin\PenggunaController::class, 'keterampilan'])->name('pengguna.keterampilan');
        Route::get("/pengguna/{id}/organisasi", [App\Http\Controllers\Admin\PenggunaController::class, 'organisasi'])->name('pengguna.organisasi');

        // Daftar Mitra
        Route::get("/pengguna", [App\Http\Controllers\Admin\PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get("/pengguna/tambah", [App\Http\Controllers\Admin\PenggunaController::class, 'create'])->name('pengguna.create');
        Route::post("/pengguna", [App\Http\Controllers\Admin\PenggunaController::class, 'store'])->name('pengguna.store');
        Route::get("/pengguna/{id}", [App\Http\Controllers\Admin\PenggunaController::class, 'show'])->name('pengguna.show');
        Route::get("/pengguna/{id}/ubah", [App\Http\Controllers\Admin\PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::put("/pengguna/{id}", [App\Http\Controllers\Admin\PenggunaController::class, 'update'])->name('pengguna.update');
        Route::delete("/pengguna/{id}", [App\Http\Controllers\Admin\PenggunaController::class, 'destroy'])->name('pengguna.destroy');
        Route::delete("/pengguna", [App\Http\Controllers\Admin\PenggunaController::class, 'bulk_destroy'])->name('pengguna.bulk_destroy');

        // FAQ
        Route::get("/faq", [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('faq.index');
        Route::get("/faq/tambah", [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('faq.create');
        Route::post("/faq", [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('faq.store');
        Route::get("/faq/{id}/ubah", [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('faq.edit');
        Route::put("/faq/{id}", [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('faq.update');
        Route::delete("/faq/{id}", [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('faq.destroy');
        Route::delete("/faq", [App\Http\Controllers\Admin\FaqController::class, 'bulk_destroy'])->name('faq.bulk_destroy');

        // Ketentuan Pengguna
        Route::get("/ketentuan-pengguna", [App\Http\Controllers\Admin\KetentuanpenggunaController::class, 'index'])->name('ketentuan-pengguna.index');
        Route::get("/ketentuan-pengguna/tambah", [App\Http\Controllers\Admin\KetentuanpenggunaController::class, 'create'])->name('ketentuan-pengguna.create');
        Route::post("/ketentuan-pengguna", [App\Http\Controllers\Admin\KetentuanpenggunaController::class, 'store'])->name('ketentuan-pengguna.store');
        Route::get("/ketentuan-pengguna/{id}/ubah", [App\Http\Controllers\Admin\KetentuanpenggunaController::class, 'edit'])->name('ketentuan-pengguna.edit');
        Route::put("/ketentuan-pengguna/{id}", [App\Http\Controllers\Admin\KetentuanpenggunaController::class, 'update'])->name('ketentuan-pengguna.update');
        Route::delete("/ketentuan-pengguna/{id}", [App\Http\Controllers\Admin\KetentuanpenggunaController::class, 'destroy'])->name('ketentuan-pengguna.destroy');
        Route::delete("/ketentuan-pengguna", [App\Http\Controllers\Admin\KetentuanpenggunaController::class, 'bulk_destroy'])->name('ketentuan-pengguna.bulk_destroy');

        // kebijakan-privasi
        Route::get("/kebijakan-privasi", [App\Http\Controllers\Admin\KebijakanprivasiController::class, 'index'])->name('kebijakan-privasi.index');
        Route::get("/kebijakan-privasi/tambah", [App\Http\Controllers\Admin\KebijakanprivasiController::class, 'create'])->name('kebijakan-privasi.create');
        Route::post("/kebijakan-privasi", [App\Http\Controllers\Admin\KebijakanprivasiController::class, 'store'])->name('kebijakan-privasi.store');
        Route::get("/kebijakan-privasi/{id}/ubah", [App\Http\Controllers\Admin\KebijakanprivasiController::class, 'edit'])->name('kebijakan-privasi.edit');
        Route::put("/kebijakan-privasi/{id}", [App\Http\Controllers\Admin\KebijakanprivasiController::class, 'update'])->name('kebijakan-privasi.update');
        Route::delete("/kebijakan-privasi/{id}", [App\Http\Controllers\Admin\KebijakanprivasiController::class, 'destroy'])->name('kebijakan-privasi.destroy');
        Route::delete("/kebijakan-privasi", [App\Http\Controllers\Admin\KebijakanprivasiController::class, 'bulk_destroy'])->name('kebijakan-privasi.bulk_destroy');

        // tentang-kami
        Route::get("/tentang-kami", [App\Http\Controllers\Admin\TentangkamiController::class, 'index'])->name('tentang-kami.index');
        Route::get("/tentang-kami/tambah", [App\Http\Controllers\Admin\TentangkamiController::class, 'create'])->name('tentang-kami.create');
        Route::post("/tentang-kami", [App\Http\Controllers\Admin\TentangkamiController::class, 'store'])->name('tentang-kami.store');
        Route::get("/tentang-kami/{id}/ubah", [App\Http\Controllers\Admin\TentangkamiController::class, 'edit'])->name('tentang-kami.edit');
        Route::put("/tentang-kami/{id}", [App\Http\Controllers\Admin\TentangkamiController::class, 'update'])->name('tentang-kami.update');
        Route::delete("/tentang-kami/{id}", [App\Http\Controllers\Admin\TentangkamiController::class, 'destroy'])->name('tentang-kami.destroy');
        Route::delete("/tentang-kami", [App\Http\Controllers\Admin\TentangkamiController::class, 'bulk_destroy'])->name('tentang-kami.bulk_destroy');

        // User
        Route::get("/users", [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get("/users/tambah", [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::post("/users", [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        Route::get("/users/{id}/ubah", [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        Route::put("/users/{id}", [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
        Route::delete("/users/{id}", [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        Route::delete("/users", [App\Http\Controllers\Admin\UserController::class, 'bulk_destroy'])->name('users.bulk_destroy');

        // Hak Akses
        Route::get("/hak-akses", [App\Http\Controllers\Admin\HakaksesController::class, 'index'])->name('hak-akses.index');
        Route::get("/hak-akses/tambah", [App\Http\Controllers\Admin\HakaksesController::class, 'create'])->name('hak-akses.create');
        Route::post("/hak-akses", [App\Http\Controllers\Admin\HakaksesController::class, 'store'])->name('hak-akses.store');
        Route::get("/hak-akses/{id}/ubah", [App\Http\Controllers\Admin\HakaksesController::class, 'edit'])->name('hak-akses.edit');
        Route::put("/hak-akses/{id}", [App\Http\Controllers\Admin\HakaksesController::class, 'update'])->name('hak-akses.update');
        Route::delete("/hak-akses/{id}", [App\Http\Controllers\Admin\HakaksesController::class, 'destroy'])->name('hak-akses.destroy');
        Route::delete("/hak-akses", [App\Http\Controllers\Admin\HakaksesController::class, 'bulk_destroy'])->name('hak-akses.bulk_destroy');

        // Setting
        Route::get("/pengaturan", [App\Http\Controllers\Admin\PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::get("/pengaturan/{id}/ubah", [App\Http\Controllers\Admin\PengaturanController::class, 'edit'])->name('pengaturan.edit');
        Route::put("/pengaturan/{id}", [App\Http\Controllers\Admin\PengaturanController::class, 'update'])->name('pengaturan.update');
    });
});
