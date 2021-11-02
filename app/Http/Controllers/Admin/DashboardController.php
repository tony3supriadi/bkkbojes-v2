<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Models\Personal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_pengguna = Personal::count();
        $jml_alumni = Personal::where('jenis_akun', '=', 'Alumni')->count();
        $jml_siswa = Personal::where('jenis_akun', '=', 'Siswa')->count();
        $jml_umum = Personal::where('jenis_akun', '=', 'Umum')->count();
        $sudah_bekerja = Personal::where('jenis_akun', '=', 'Alumni')
            ->where('personal_pengalaman.mulai_bekerja', '!=', NULL)
            ->leftJoin('personal_pengalaman', 'personal.id', '=', 'personal_id')
            ->count();

        $index = 0;
        $results = [];
        $lowongan = Lowongan::where('publish', '=', true)
            ->where('tanggal_berakhir', '>', date('Y-m-d'))
            ->get();

        if (request()->get('type') == "json") {
            foreach ($lowongan as $item) {
                $results[$index] = $item;
                $results[$index]["encryptid"] = encrypt($item->id);
                $results[$index]["tanggal_berakhir"] = Carbon::parse($item->tanggal_berakhir)->isoFormat('DD MMM Y');
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.dashboard', compact(
            'lowongan',
            'total_pengguna',
            'jml_alumni',
            'jml_siswa',
            'jml_umum',
            'sudah_bekerja'
        ));
    }
}
