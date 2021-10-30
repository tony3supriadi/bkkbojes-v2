<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalpendidikan extends Model
{
    use HasFactory;
    protected $table = "personal_pendidikan";
    protected $fillable = [
        'personal_id', 'mulai_sekolah', 'selesai_sekolah',
        'masih_sekolah', 'nama_sekolah', 'alamat', 'provinsi',
        'kabupaten', 'jenjang_pendidikan', 'program_studi',
        'nilai_akhir'
    ];
}
