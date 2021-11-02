<?php

namespace App\Http\Controllers;

use App\Models\Kirimlamaran;
use App\Models\Lowongan;
use App\Models\Mitra;
use App\Models\Simpanlowongan;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    public function index()
    {
        $wilayah = new Wilayah();
        $data = Lowongan::select('lowongan.*', 'mitra.nama as mitra_nama', 'mitra.provinsi', 'mitra.kabupaten')
            ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
            ->where('mitra.provinsi', request()->get('lokasi') != 'semua' ? '=' : '!=', request()->get('lokasi') != 'semua' ? request()->get('lokasi') : null)
            ->where('lowongan.tipe_pekerjaan', request()->get('type') != 'semua' ? '=' : '!=', request()->get('type') != 'semua' ? request()->get('type') : null)
            ->where('lowongan.tipe_pekerjaan', request()->get('studi') != 'semua' ? 'like' : '!=', request()->get('studi') != 'semua' ? '%' . request()->get('studi') . '%' : null)
            // ->orWhere('judul', 'like', '%' . request()->get('q') . '%')
            // ->orWhere('mitra.nama', 'like', '%' . request()->get('q') . '%')
            // ->orWhere('mitra.nama', 'like', '%' . request()->get('q') . '%')
            ->orderBy(request()->get('sort') == 'terfavorit' ? 'lowongan.counter' : 'lowongan.created_at', request()->get('sort') == 'terlama' ? 'ASC' : 'DESC')
            ->paginate(15);

        return view('pages.lowongan.index', compact('data', 'wilayah'));
    }

    public function show($slug)
    {
        $wilayah = new Wilayah();
        $lowongan = Lowongan::select('lowongan.*', 'mitra.nama as mitra_nama', 'mitra.provinsi', 'mitra.kabupaten')
            ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
            ->where('lowongan.slug', '=', $slug)
            ->first();
        $lowongan->counter = $lowongan->counter + 1;
        $lowongan->save();

        $mitra = Mitra::find($lowongan->mitra_id);
        $tersimpan = Simpanlowongan::where('lowongan_id', '=', $lowongan->id)
            ->where('personal_id', '=', Auth::guard('personal')->user()->id)->count();
        $lamaran = Kirimlamaran::where('lowongan_id', '=', $lowongan->id)
            ->where('personal_id', '=', Auth::guard('personal')->user()->id)->count();
        return view('pages.lowongan.show', compact('wilayah', 'lowongan', 'mitra', 'tersimpan', 'lamaran'));
    }

    public function save(Request $request)
    {
        Simpanlowongan::insert([
            'personal_id' => $request->personal_id,
            'lowongan_id' => $request->lowongan_id,
        ]);
        return redirect()->back();
    }

    public function send($slug)
    {
        $lowongan = Lowongan::where('lowongan.slug', '=', $slug)->first();
        return view('pages.lowongan.send', compact('lowongan'));
    }

    public function send_submit(Request $request)
    {
        $lowongan = Lowongan::find($request->lowongan_id);
        $lowongan->applicant = $lowongan->applicant + 1;
        $lowongan->save();

        Kirimlamaran::insert([
            'personal_id' => $request->personal_id,
            'lowongan_id' => $request->lowongan_id,
        ]);
        return redirect()->route('lowongan.kirim-lamaran.berhasil', $lowongan->slug);
    }

    public function send_success($slug)
    {
        $lowongan = Lowongan::where('slug', '=', $slug)->first();
        return view('pages.lowongan.send_success', compact('lowongan'));
    }
}
