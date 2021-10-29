<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidangusaha extends Model
{
    use HasFactory;
    protected $table = "bidang_usaha";
    protected $fillable = [
        "kode", "nama"
    ];
}
