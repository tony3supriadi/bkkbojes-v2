<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kirimlamaran extends Model
{
    use HasFactory;
    protected $table = "personal_lowongan_terkirim";
    protected $fillable = ['personal_id', 'lowongan_id'];
}
