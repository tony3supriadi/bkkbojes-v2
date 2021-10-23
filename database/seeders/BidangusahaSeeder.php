<?php

namespace Database\Seeders;

use App\Models\Bidangusaha;
use Illuminate\Database\Seeder;

class BidangusahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return vokode
     */
    public function run()
    {
        $bidang_usaha = [
            ['kode' => 1, 'nama' => 'Pertanian, Peternakan, Perburuan'],
            ['kode' => 10, 'nama' => 'Ind. Makanan'],
            ['kode' => 11, 'nama' => 'Ind. Minuman'],
            ['kode' => 12, 'nama' => 'Ind. Pengolahan Tembakau'],
            ['kode' => 13, 'nama' => 'Ind. Tekstil'],
            ['kode' => 14, 'nama' => 'Ind. Pakaian Jadi'],
            ['kode' => 15, 'nama' => 'Ind. Kulit, dan Alas Kaki'],
            ['kode' => 16, 'nama' => 'Ind. Kayu, dan Gabus'],
            ['kode' => 17, 'nama' => 'Ind. Kertas dan Barang dari Kertas'],
            ['kode' => 18, 'nama' => 'Ind. Pencetakan dan Repr. Media Rekaman'],
            ['kode' => 19, 'nama' => 'Ind. Prod Bt Bara, Kilang Minyak Bumi'],
            ['kode' => 2, 'nama' => 'Kehutanan dan Penebangan Kayu'],
            ['kode' => 20, 'nama' => 'Ind. Bahan Kimia'],
            ['kode' => 21, 'nama' => 'Ind. Farmasi'],
            ['kode' => 22, 'nama' => 'Ind. Karet dan Plastik'],
            ['kode' => 23, 'nama' => 'Ind. Barang Galian Bukan Logam'],
            ['kode' => 24, 'nama' => 'Ind. Logam Dasar'],
            ['kode' => 25, 'nama' => 'Ind. Barang Logam, Bukan Mesin'],
            ['kode' => 26, 'nama' => 'Ind. Komputer, Brg Elektronik dan Optik'],
            ['kode' => 27, 'nama' => 'Ind. Peralatan Listrik'],
            ['kode' => 28, 'nama' => 'Ind. Mesin dan Perlengkapan ytdl'],
            ['kode' => 29, 'nama' => 'Ind. Kendaraan Bermotor'],
            ['kode' => 3, 'nama' => 'Perikanan'],
            ['kode' => 30, 'nama' => 'Ind. Alat Angkutan Lainnya'],
            ['kode' => 31, 'nama' => 'Ind. Furnitur'],
            ['kode' => 32, 'nama' => 'Ind. Pengolahan Lainnya'],
            ['kode' => 33, 'nama' => 'Jasa Reparasi Mesin'],
            ['kode' => 35, 'nama' => 'Pengadaan Listrik, Gas, Uap'],
            ['kode' => 36, 'nama' => 'Pengadaan Air'],
            ['kode' => 37, 'nama' => 'Pengelolaan Limbah'],
            ['kode' => 38, 'nama' => 'Pengelolaan Sampah dan Daur Ulang'],
            ['kode' => 39, 'nama' => 'Jasa Pengelolaan Sampah Lain'],
            ['kode' => 41, 'nama' => 'Konstruksi Gedung'],
            ['kode' => 42, 'nama' => 'Konstruksi Bangunan Sipil'],
            ['kode' => 43, 'nama' => 'Konstruksi Khusus'],
            ['kode' => 45, 'nama' => 'Perdagangan Mobil dan Sepeda Motor 342'],
            ['kode' => 46, 'nama' => 'Perdagangan Besar, Bukan Mobil'],
            ['kode' => 47, 'nama' => 'Perdagangan Eceran, Bukan Mobil'],
            ['kode' => 49, 'nama' => 'Angkutan Darat dan Melalui Saluran Pipa'],
            ['kode' => 5, 'nama' => 'Tmbg Batu Bara dan Lignit'],
            ['kode' => 50, 'nama' => 'Angkutan Air'],
            ['kode' => 51, 'nama' => 'Angkutan Udara'],
            ['kode' => 52, 'nama' => 'Pergudangan dan Jasa Penunjang Angkutan'],
            ['kode' => 53, 'nama' => 'Pos dan Kurir'],
            ['kode' => 55, 'nama' => 'Penyediaan Akomodasi'],
            ['kode' => 56, 'nama' => 'Penyediaan Makanan dan Minuman'],
            ['kode' => 58, 'nama' => 'Penerbitan'],
            ['kode' => 59, 'nama' => 'Produksi Vkodeeo dan Musik'],
            ['kode' => 6, 'nama' => 'Tmbg Mnyk Bumi, Gas Alam, Panas Bumi'],
            ['kode' => 60, 'nama' => 'Penyiaran dan Pemrograman'],
            ['kode' => 61, 'nama' => 'Telekomunikasi'],
            ['kode' => 62, 'nama' => 'Kegiatan Pemrograman'],
            ['kode' => 63, 'nama' => 'Kegiatan Jasa Informasi'],
            ['kode' => 64, 'nama' => 'Jasa Keuangan'],
            ['kode' => 65, 'nama' => 'Asuransi dan Dana Pensiun'],
            ['kode' => 66, 'nama' => 'Jasa Penunjang Jasa Keuangan'],
            ['kode' => 68, 'nama' => 'Real Estat'],
            ['kode' => 69, 'nama' => 'Jasa Hukum dan Akuntansi'],
            ['kode' => 7, 'nama' => 'Tmbg Bijih Logam'],
            ['kode' => 70, 'nama' => 'Kegiatan Konsultansi Manajemen'],
            ['kode' => 71, 'nama' => 'Jasa Arsitektur dan Teknik Sipil'],
            ['kode' => 72, 'nama' => 'Penelitian Ilmu Pengetahuan'],
            ['kode' => 73, 'nama' => 'Periklanan dan Penelitian Pasar'],
            ['kode' => 74, 'nama' => 'Jasa Profesional, Ilmiah dan Teknis'],
            ['kode' => 75, 'nama' => 'Jasa Kesehatan Hewan'],
            ['kode' => 77, 'nama' => 'Jasa Persewaan'],
            ['kode' => 78, 'nama' => 'Jasa Ketenagakerjaan'],
            ['kode' => 79, 'nama' => 'Jasa Agen Perjalanan'],
            ['kode' => 8, 'nama' => 'Tmbg dan Penggalian Lainnya'],
            ['kode' => 80, 'nama' => 'Jasa Keamanan dan Penyelkodeikan'],
            ['kode' => 81, 'nama' => 'Jasa Untuk Gedung dan Pertamanan'],
            ['kode' => 82, 'nama' => 'Jasa Administrasi Kantor'],
            ['kode' => 84, 'nama' => 'Administrasi Pemerintahan, Pertahanan'],
            ['kode' => 85, 'nama' => 'Jasa Pendkodeikan'],
            ['kode' => 86, 'nama' => 'Jasa Kesehatan Manusia'],
            ['kode' => 87, 'nama' => 'Jasa Kegiatan Sosial di Dalam Panti'],
            ['kode' => 88, 'nama' => 'Jasa Kegiatan Sosial di Luar Panti'],
            ['kode' => 9, 'nama' => 'Jasa Pertambangan'],
            ['kode' => 90, 'nama' => 'Kegiatan Hiburan, Kesenian'],
            ['kode' => 91, 'nama' => 'Perpustakaan, Arsip, Museum'],
            ['kode' => 93, 'nama' => 'Kegiatan Olahraga dan Rekreasi'],
            ['kode' => 94, 'nama' => 'Kegiatan Keanggotaan Organisasi'],
            ['kode' => 95, 'nama' => 'Jasa Reparasi Komputer'],
            ['kode' => 96, 'nama' => 'Jasa Perorangan Lainnya'],
            ['kode' => 97, 'nama' => 'Jasa Perorangan yg Melayani Rmh Tangga'],
            ['kode' => 98, 'nama' => 'Keg. Rmh Tangga yang Digunakan Sendiri'],
            ['kode' => 99, 'nama' => 'Keg. Badan Internasional lain']
        ];

        foreach ($bidang_usaha as $item) {
            Bidangusaha::create($item);
        }
    }
}
