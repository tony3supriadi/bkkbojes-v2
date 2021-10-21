<?php

namespace Database\Seeders;

use App\Models\Halaman;
use Illuminate\Database\Seeder;

class HalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $halaman = [
            [
                'name' => 'faq',
                'point' => 'Apa itu BKK SMK Negeri 1 Bojongsari',
                'content' => '<strong>BKK (Bursa Kerja Khusus) SMK N 1 Bojongsari</strong> adalah situs lowongan kerja untuk alumni SMK N 1 Bojongsari akan tetapi tetap dapa diakses untuk umum bagi para pencari kerja',
                'ordering' => 1
            ],
            [
                'name' => 'faq',
                'point' => 'Siapa saja yang dapat menggunakan situs ini?',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus ornare sem, at lobortis nulla consectetur et. Fusce a tempor mi. Sed lacinia mi id cursus pretium. Sed eros turpis.',
                'ordering' => 2
            ],
            [
                'name' => 'faq',
                'point' => 'Lowongan apa saja yang tersedia?',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus ornare sem, at lobortis nulla consectetur et. Fusce a tempor mi. Sed lacinia mi id cursus pretium. Sed eros turpis.',
                'ordering' => 3
            ],
            [
                'name' => 'faq',
                'point' => 'Apa yang saya dapatkan ketika saya mendaftar?',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus ornare sem, at lobortis nulla consectetur et. Fusce a tempor mi. Sed lacinia mi id cursus pretium. Sed eros turpis.',
                'ordering' => 4
            ],
            [
                'name' => 'faq',
                'point' => 'Dapatkah saya membagikan info lowongan kerja? ',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus ornare sem, at lobortis nulla consectetur et. Fusce a tempor mi. Sed lacinia mi id cursus pretium. Sed eros turpis.',
                'ordering' => 5
            ],
            [
                'name' => 'faq',
                'point' => 'Apakah data dan informasi saya aman?',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus ornare sem, at lobortis nulla consectetur et. Fusce a tempor mi. Sed lacinia mi id cursus pretium. Sed eros turpis.',
                'ordering' => 6
            ],
            [
                'name' => 'faq',
                'point' => 'Bagaimana ketentuan penggunaan situs ini?',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus ornare sem, at lobortis nulla consectetur et. Fusce a tempor mi. Sed lacinia mi id cursus pretium. Sed eros turpis.',
                'ordering' => 7
            ],
            [
                'name' => 'faq',
                'point' => 'Bagaimana cara mendaftar di situs ini?',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus ornare sem, at lobortis nulla consectetur et. Fusce a tempor mi. Sed lacinia mi id cursus pretium. Sed eros turpis.',
                'ordering' => 8
            ],
            [
                'name' => 'faq',
                'point' => 'Kenapa saya tidak dapat melamar lowongan kerja di situs ini?',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus ornare sem, at lobortis nulla consectetur et. Fusce a tempor mi. Sed lacinia mi id cursus pretium. Sed eros turpis.',
                'ordering' => 9
            ],
            [
                'name' => 'faq',
                'point' =>  'Bagaimana cara mengunduh CV saya?',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus maximus ornare sem, at lobortis nulla consectetur et. Fusce a tempor mi. Sed lacinia mi id cursus pretium. Sed eros turpis.',
                'ordering' => 10
            ],

            // Ketentuan Penggunaan
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Perjanjian yang Mengikat',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nisi diam, tincidunt vitae nisl sit amet, mattis venenatis ligula. Morbi euismod lorem non efficitur rutrum. Nunc semper est risus, ac consectetur sapien consectetur id. Morbi dui massa, fringilla ac ullamcorper et, accumsan vitae mauris. Nunc placerat odio non leo scelerisque bibendum. In tincidunt felis placerat, condimentum ex quis, lobortis sapien. Etiam sit amet sapien commodo, lobortis enim sit amet, scelerisque nibh. Nullam at molestie elit. Curabitur pulvinar sapien sed ipsum mollis eleifend a in arcu. Sed malesuada nibh vestibulum dolor scelerisque elementum. Cras id nibh cursus, semper quam vitae, viverra nunc. Etiam pulvinar justo arcu, et faucibus nulla sollicitudin eget. Quisque pretium sit amet urna in semper. Etiam molestie, neque et condimentum gravida, nibh libero efficitur sem, vitae maximus lacus urna at eros. Aliquam fermentum orci tortor, a lacinia tortor malesuada non.</p><p>Mauris porta velit ac ligula feugiat convallis. Fusce sodales vitae magna at iaculis. Aenean non tellus dictum, mollis massa sed, tristique odio. Donec laoreet risus sed dui pulvinar, sit amet tempus purus gravida. Mauris sed diam dolor. Integer sit amet felis tincidunt metus imperdiet aliquam vitae faucibus felis. Aliquam turpis nisi, eleifend et libero eget, ultrices sagittis massa. Mauris vehicula ullamcorper metus, non cursus dolor feugiat nec. Nunc lacinia mollis neque ac consectetur. Aliquam vitae laoreet erat, eu pretium nisi. Maecenas sed mi dui. Curabitur turpis nisi, consectetur in blandit et, dapibus aliquet elit. Nulla neque purus, hendrerit eu euismod non, imperdiet vitae elit.</p><p>Praesent et faucibus dui. Fusce congue egestas mi id elementum. Nam maximus enim quis justo sodales congue. Sed non nisi non risus porta ultricies sed lobortis ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent est erat, maximus cursus auctor ut, lacinia vel orci. Sed gravida dolor vel libero hendrerit fermentum.</p>',
                'ordering' => 1
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Definisi',
                'content' => '',
                'ordering' => 2
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Pendaftaran',
                'content' => '',
                'ordering' => 3
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Kata Sandi dan Keamanan',
                'content' => '',
                'ordering' => 4
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Hak Milik Intelektual (Intellectial Propery Right)',
                'content' => '',
                'ordering' => 5
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Ketersediaan situs web Bursa Kerja Khusus SMK N 1 Bojongsari',
                'content' => '',
                'ordering' => 6
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'pengguna anda atas situs web Bursa Kerja Khusus SMK N 1 Bojongsari',
                'content' => '',
                'ordering' => 7
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Penggunaan anda atas layanan',
                'content' => '',
                'ordering' => 8
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Ketentuan tambahan berlaku untuk Pengusaha',
                'content' => '',
                'ordering' => 9
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Ketentuan Tambahan berlaku untuk Pemegang Akun Perusahaan yang menggunakan situs web Bursa Kerja Khusus SMK N 1 Bojongsari',
                'content' => '',
                'ordering' => 10
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Ketentuan tambahan berlaku untuk Calon',
                'content' => '',
                'ordering' => 11
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Konten dan pengiriman pengguna',
                'content' => '',
                'ordering' => 12
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Kewajiban Bursa Kerja Khusus SMK N 1 Bojongsari',
                'content' => '',
                'ordering' => 13
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Penafian',
                'content' => '',
                'ordering' => 14
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Situs web pihak ketiga',
                'content' => '',
                'ordering' => 15
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Kebijakan Periklanan dan Sponsorship',
                'content' => '',
                'ordering' => 16
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Kebijakan Periklanan dan Sponsorship',
                'content' => '',
                'ordering' => 17
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Pengembalian dana',
                'content' => '',
                'ordering' => 18
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Hukum yang berlaku',
                'content' => '',
                'ordering' => 19
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Penggunaan Internasional',
                'content' => '',
                'ordering' => 20
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Penggunaan Internasional',
                'content' => '',
                'ordering' => 21
            ],
            [
                'name' => 'ketentuan-pengguna',
                'point' =>  'Umum',
                'content' => '',
                'ordering' => 22
            ],

            // Kebijakan Privasi ========================
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Pemberitahuan privasi ini menjelaskan hal-hal berikut',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nisi diam, tincidunt vitae nisl sit amet, mattis venenatis ligula. Morbi euismod lorem non efficitur rutrum. Nunc semper est risus, ac consectetur sapien consectetur id. Morbi dui massa, fringilla ac ullamcorper et, accumsan vitae mauris. Nunc placerat odio non leo scelerisque bibendum. In tincidunt felis placerat, condimentum ex quis, lobortis sapien. Etiam sit amet sapien commodo, lobortis enim sit amet, scelerisque nibh. Nullam at molestie elit. Curabitur pulvinar sapien sed ipsum mollis eleifend a in arcu. Sed malesuada nibh vestibulum dolor scelerisque elementum. Cras id nibh cursus, semper quam vitae, viverra nunc. Etiam pulvinar justo arcu, et faucibus nulla sollicitudin eget. Quisque pretium sit amet urna in semper. Etiam molestie, neque et condimentum gravida, nibh libero efficitur sem, vitae maximus lacus urna at eros. Aliquam fermentum orci tortor, a lacinia tortor malesuada non.</p><p>Mauris porta velit ac ligula feugiat convallis. Fusce sodales vitae magna at iaculis. Aenean non tellus dictum, mollis massa sed, tristique odio. Donec laoreet risus sed dui pulvinar, sit amet tempus purus gravida. Mauris sed diam dolor. Integer sit amet felis tincidunt metus imperdiet aliquam vitae faucibus felis. Aliquam turpis nisi, eleifend et libero eget, ultrices sagittis massa. Mauris vehicula ullamcorper metus, non cursus dolor feugiat nec. Nunc lacinia mollis neque ac consectetur. Aliquam vitae laoreet erat, eu pretium nisi. Maecenas sed mi dui. Curabitur turpis nisi, consectetur in blandit et, dapibus aliquet elit. Nulla neque purus, hendrerit eu euismod non, imperdiet vitae elit.</p><p>Praesent et faucibus dui. Fusce congue egestas mi id elementum. Nam maximus enim quis justo sodales congue. Sed non nisi non risus porta ultricies sed lobortis ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent est erat, maximus cursus auctor ut, lacinia vel orci. Sed gravida dolor vel libero hendrerit fermentum.</p>',
                'ordering' => 1
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Koleksi Informasi Pribadi',
                'content' => '',
                'ordering' => 2
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Tujuan mengumpulkan informasi anda',
                'content' => '',
                'ordering' => 3
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Lainnya',
                'content' => '',
                'ordering' => 4
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Pilihan Akses dan Informasi Pribadi',
                'content' => '',
                'ordering' => 5
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Retensi Informasi Pribadi',
                'content' => '',
                'ordering' => 6
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Keamanan Informasi Pribadi',
                'content' => '',
                'ordering' => 7
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Kemana saja informasi pribadi ditutup',
                'content' => '',
                'ordering' => 8
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Kewajiban anda mengenai informasi pribadi anda',
                'content' => '',
                'ordering' => 9
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Transfer dari informasi pribadi anda di luar yuridiksi lokal anda',
                'content' => '',
                'ordering' => 10
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Situs Terkait',
                'content' => '',
                'ordering' => 11
            ],
            [
                'name' => 'kebijakan-privasi',
                'point' =>  'Persyaratan Anda',
                'content' => '',
                'ordering' => 12
            ],

            // Tentang Kami ========================
            [
                "name" => 'tentang-kami',
                "point" => "Latar Belakang",
                "content" => "<p>Kemudahan teknologi memudahkan kita mengakses informasi lowongan kerja, sayangnya terlalu banyak informasi justru menjadi tantangan untuk melakukan seleksi dalam memilih dan memvalidasi informasi lowongan kerja yang ada di internet. Tidak hanya itu, jaminan keamanan data juga menjadi perhatian agar tidak disalahgunakan, berangkat dari situ, kami membangun situs ini untuk memberikan solusi terhadap masalah yang dialami para pencari kerja khususnya siswa SMK N 1 Bojongsari, walaupun tidak terbatas untuk siswa atau alumni saja, tapi juga dapat diakses oleh pengguna umum.</p><p>Bagi Instansi/ perusahaan juga dapat lebih mudah mendapatkan calon tenaga kerja lulusan SMK yang sesuai dengan kualifikasi perusahaan, mengirimkan informasi lowongan kerja ke situs ini, untuk mendapatkan calon tenaga kerja yang sesuai dengan kriteria/ kualifikasi yang diinginkan.</p>",
                "ordering" => 1
            ],
            [
                "name" => 'tentang-kami',
                "point" => "Fitur / Layanan Kami",
                "content" => "<h5>Untuk calon tenaga kerja :</h5><ul><li>Pendaftaran Akun</li><li>Mesin pencarian lowongan kerja dengan filter untuk memudahkan pencarian yang lebih spesifik</li><li>Fitur Ajukan Lamaran untuk melamar pekerjaan langsung</li><li>Dashboard profil untuk memperbaharui profil dan Resume</li><li>Laman Pengumuman untuk mengetahui update terkini</li><li>Email Subscription, langganan email untuk menerima informasi terkini terkait informasi lowongan yang dilamar</li><li>Unduh untuk mencetak Resume</li></ul>",
                "ordering" => 2
            ],
            [
                "name" => 'tentang-kami',
                "point" => "Legalitas",
                "content" => "Surat Keputusan Kepala SMK N 1 Bojongsari Nomor -",
                "ordering" => 3
            ],
            [
                "name" => 'tentang-kami',
                "point" => "Kepengurusan",
                "content" => `<p><strong>Penanggung Jawab</strong><br />Lorem ipsum dolor sit amet</p>
                    <p><strong>Pembina</strong><br />Lorem ipsum dolor sit amet</p>
                    <p><strong>Ketua BKK</strong><br />Lorem ipsum dolor sit amet</p>
                    <p><strong>Petugas Administrasi/tata Usaha & Pendaftaran</strong><br />Lorem ipsum dolor sit amet</p>
                    <p><strong>Petugas Penyuluhan & Bimbingan Jabatan dan Analisis Jabatan</strong><br />Lorem ipsum dolor sit amet</p>
                    <p><strong>Petugas Informasi Pasar Kerja & Penelusuran Alumni</strong><br />Lorem ipsum dolor sit amet</p>
                    <p><strong>Petugas Penempatan Kerja dan Kunjungan Perusahaan</strong><br />Lorem ipsum dolor sit amet</p>
                    <p><strong>Web Administrator</strong><br />Lorem ipsum dolor sit amet</p>`,
                "ordering" => 4
            ],
            [
                "name" => 'tentang-kami',
                "point" => "Hubungi Kami",
                "content" => "<strong>Alamat : </strong> - <br /><strong>Telepon : </strong> - <br /><strong>Email : </strong> - <br />",
                "ordering" => 5
            ]
        ];

        foreach ($halaman as $item) {
            Halaman::create($item);
        }
    }
}
