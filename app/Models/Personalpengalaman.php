<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalpengalaman extends Model
{
    use HasFactory;
    protected $table = "personal_pengalaman";
    protected $fillable = [
        'personal_id', 'mulai_bekerja', 'selesai_bekerja', 'masih_bekerja', 'posisi_jabatan',
        'nama_perusahaan', 'bidang_industri', 'alamat', 'provinsi', 'kabupaten'
    ];
}
