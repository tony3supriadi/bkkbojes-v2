<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = "lowongan";
    protected $fillable = [
        'judul', 'slug', 'mitra_id', 'tipe_pekerjaan',
        'program_studi', 'kisaran_gaji', 'tampilkan_gaji',
        'deskripsi', 'kualifikasi', 'benefit', 'catatan',
        'tanggal_berakhir', 'counter', 'publish',
        'applicant'
    ];
}
