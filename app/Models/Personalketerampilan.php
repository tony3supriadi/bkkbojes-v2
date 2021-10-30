<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalketerampilan extends Model
{
    use HasFactory;
    protected $table = "personal_keterampilan";
    protected $fillable = ['personal_id', 'keterampilan', 'level'];
}
