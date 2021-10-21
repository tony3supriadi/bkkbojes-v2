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
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
