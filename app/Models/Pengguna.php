<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Personal extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = "personal";

    protected $fillable = [
        'nik',
        'photo',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'kodepos',
        'phone',
        'username',
        'jenis_akun',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
