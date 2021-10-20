<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'username' => 'admin',
            'password' => bcrypt('admin1234'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'isadmin' => true
        ]);
    }
}
