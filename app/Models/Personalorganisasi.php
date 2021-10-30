<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalorganisasi extends Model
{
    use HasFactory;
    protected $table = "personal_organisasi";
    protected $fillable = [
        'personal_id',  'mulai_menjabat', 'selesai_menjabat',
        'masih_menjabat', 'posisi_jabatan', 'nama_organisasi'
    ];
}
