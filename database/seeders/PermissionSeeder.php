<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ["name" => "users-read", "fullname" => "Users", "guard_name" => "web", "parent_id" => null],
            ["name" => "users-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 1],
            ["name" => "users-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 1],
            ["name" => "users-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 1],

            ["name" => "hak-akses-read", "fullname" => "Hak Akses", "guard_name" => "web", "parent_id" => null],
            ["name" => "hak-akses-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 5],
            ["name" => "hak-akses-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 5],
            ["name" => "hak-akses-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 5],

            ["name" => "pengaturan-read", "fullname" => "Pengaturan", "guard_name" => "web", "parent_id" => null],
            ["name" => "pengaturan-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 9],

            ["name" => "faq-read", "fullname" => "FAQ", "guard_name" => "web", "parent_id" => null],
            ["name" => "faq-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 11],
            ["name" => "faq-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 11],
            ["name" => "faq-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 11],

            ["name" => "ketentuan-pengguna-read", "fullname" => "Ketentuan Pengguna", "guard_name" => "web", "parent_id" => null],
            ["name" => "ketentuan-pengguna-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 15],
            ["name" => "ketentuan-pengguna-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 15],
            ["name" => "ketentuan-pengguna-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 15],

            ["name" => "kebijakan-privasi-read", "fullname" => "Kebijakan Privasi", "guard_name" => "web", "parent_id" => null],
            ["name" => "kebijakan-privasi-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 19],
            ["name" => "kebijakan-privasi-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 19],
            ["name" => "kebijakan-privasi-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 19],

            ["name" => "tentang-kami-read", "fullname" => "Tentang Kami", "guard_name" => "web", "parent_id" => null],
            ["name" => "tentang-kami-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 23],
            ["name" => "tentang-kami-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 23],
            ["name" => "tentang-kami-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 23],

            ["name" => "mitra-read", "fullname" => "Daftar Mitra", "guard_name" => "web", "parent_id" => null],
            ["name" => "mitra-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 27],
            ["name" => "mitra-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 27],
            ["name" => "mitra-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 27],

            ["name" => "pengumuman-read", "fullname" => "Pengumuman", "guard_name" => "web", "parent_id" => null],
            ["name" => "pengumuman-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 31],
            ["name" => "pengumuman-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 31],
            ["name" => "pengumuman-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 31],

            ["name" => "lowongan-read", "fullname" => "Lowongan", "guard_name" => "web", "parent_id" => null],
            ["name" => "lowongan-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 35],
            ["name" => "lowongan-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 35],
            ["name" => "lowongan-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 35],

            ["name" => "artikel-read", "fullname" => "Artikel", "guard_name" => "web", "parent_id" => null],
            ["name" => "artikel-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 39],
            ["name" => "artikel-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 39],
            ["name" => "artikel-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 39],

            ["name" => "pengguna-read", "fullname" => "Pengguna", "guard_name" => "web", "parent_id" => null],
            ["name" => "pengguna-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 43],
            ["name" => "pengguna-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 43],
            ["name" => "pengguna-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 43],

            ["name" => "testimonial-read", "fullname" => "Testimonial", "guard_name" => "web", "parent_id" => null],
            ["name" => "testimonial-create", "fullname" => "Tambah", "guard_name" => "web", "parent_id" => 47],
            ["name" => "testimonial-update", "fullname" => "Ubah", "guard_name" => "web", "parent_id" => 47],
            ["name" => "testimonial-delete", "fullname" => "Hapus", "guard_name" => "web", "parent_id" => 47],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
