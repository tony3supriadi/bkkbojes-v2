<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = "wilayah";

    protected $fillable = [
        "nama", "kode"
    ];

    public function provinsi()
    {
        $index = 0;
        $provinces = [];
        foreach ($this->orderBy('nama', 'ASC')->get() as $key => $val) {
            if (strlen($val->kode) == 2) {
                $provinces[$index] = [
                    "kode" => $val->kode,
                    "nama" => ucwords(strtolower($val->nama))
                ];
                $index++;
            }
        };
        return (object) $provinces;
    }

    public function kabupaten($provId = null)
    {
        $index = 0;
        $regencies = [];

        $data = [];
        if ($provId != null) {
            $data = $this->where('kode', 'like', $provId . '%')->orderBy('nama', 'ASC')->get();
        } else {
            $data = $this->orderBy('nama', 'ASC')->get();
        }

        foreach ($data as $key => $val) {
            if (strlen($val->kode) == 5) {
                $regencies[$index] = [
                    "kode" => $val->kode,
                    "nama" => str_replace(["Kab. ", "Kab "], ["", ""], ucwords(strtolower($val->nama)))
                ];
                $index++;
            }
        }
        return $regencies;
    }

    public function kecamatan($kabId = null)
    {
        $index = 0;
        $districts = [];

        $data = [];
        if ($kabId != null) {
            $data = $this->where('kode', 'like', $kabId . '%')->orderBy('nama', 'ASC')->get();
        } else {
            $data = $this->orderBy('nama', 'ASC')->get();
        }

        foreach ($data as $key => $val) {
            if (strlen($val->kode) == 8) {
                $districts[$index] = [
                    "kode" => $val->kode,
                    "nama" => $val->nama
                ];
                $index++;
            }
        }
        return $districts;
    }

    public function desa($kecId = null)
    {
        $index = 0;
        $villages = [];

        $data = [];
        if ($kecId != null) {
            $data = $this->where('kode', 'like', $kecId . '%')->orderBy('nama', 'ASC')->get();
        } else {
            $data = $this->orderBy('nama', 'ASC')->get();
        }

        foreach ($data as $key => $val) {
            if (strlen($val->kode) > 8) {
                $villages[$index] = [
                    "kode" => $val->kode,
                    "nama" => $val->nama
                ];
                $index++;
            }
        }
        return $villages;
    }

    public function findByCode($code)
    {
        return $this->where('kode', $code)->first();
    }

    public function getName($code)
    {
        $wilayah = $this->findByCode($code);
        $wilayah = ucwords(strtolower($wilayah->nama));
        return $wilayah;
    }
}
