<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = "mitra";
    protected $fillable = [
        'logo', 'nama', 'slug', 'lokasi', 'bidang_usaha',
        'badan_usaha', 'bentuk_usaha', 'jumlah_karyawan',
        'waktu_kerja', 'busana_kerja', 'kontak', 'telephone',
        'email', 'faxmail', 'website', 'profile_perusahaan',
        'mitra_unggulan', 'publish'
    ];
}
