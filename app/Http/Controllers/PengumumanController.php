<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('pages.pengumuman.index');
    }

    public function show($slug)
    {
        $pengumuman_detail = Pengumuman::select('pengumuman.*', 'mitra.logo as mitra_logo', 'mitra.nama as mitra_nama')
            ->where('pengumuman.slug', '=', $slug)
            ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
            ->first();

        $pengumuman_detail->counter = $pengumuman_detail->counter + 1;
        $pengumuman_detail->save();

        return view('pages.pengumuman.show', compact('pengumuman_detail'));
    }
}
