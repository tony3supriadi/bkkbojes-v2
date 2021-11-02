<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Models\Pengumuman;
use App\Models\Personal;
use App\Models\Personalketerampilan;
use App\Models\Personalorganisasi;
use App\Models\Personalpendidikan;
use App\Models\Personalpengalaman;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Auth;

use PDF;

class AkunController extends Controller
{
    public function redirectTo()
    {
        return redirect()->route('akun.profile.personal');
    }

    public function resume()
    {
        $id = Auth::guard('personal')->user()->id;
        $personal = Personal::find($id);
        $pengalaman = Personalpengalaman::where('personal_id', '=', $id)->get();
        $pendidikan = Personalpendidikan::where('personal_id', '=', $id)->get();
        $keterampilan = Personalketerampilan::where('personal_id', '=', $id)->get();
        $mahir = Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 100)->count();
        $menengah = Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 75)->count();
        $pemula = Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 60)->count();
        $organisasi = Personalorganisasi::where('personal_id', '=', $id)->get();
        return view(
            'pages.akun.resume.index',
            compact(
                'personal',
                'pengalaman',
                'pendidikan',
                'keterampilan',
                'mahir',
                'menengah',
                'pemula',
                'organisasi'
            )
        );
    }

    public function resume_download()
    {
        $id = Auth::guard('personal')->user()->id;
        $data = [
            "personal" => Personal::find($id),
            "pengalaman" => Personalpengalaman::where('personal_id', '=', $id)->get(),
            "pendidikan" => Personalpendidikan::where('personal_id', '=', $id)->get(),
            "keterampilan" => Personalketerampilan::where('personal_id', '=', $id)->get(),
            "mahir" => Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 100)->count(),
            "menengah" => Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 75)->count(),
            "pemula" => Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 60)->count(),
            "organisasi" => Personalorganisasi::where('personal_id', '=', $id)->get()
        ];

        // return view('pages.akun.resume.pdf', $data);

        $pdf = PDF::loadView('pages.akun.resume.pdf', $data);
        return $pdf->download('resume-' . time() . '.pdf');
    }

    public function resume_stream()
    {
        $id = Auth::guard('personal')->user()->id;
        $data = [
            "personal" => Personal::find($id),
            "pengalaman" => Personalpengalaman::where('personal_id', '=', $id)->get(),
            "pendidikan" => Personalpendidikan::where('personal_id', '=', $id)->get(),
            "keterampilan" => Personalketerampilan::where('personal_id', '=', $id)->get(),
            "mahir" => Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 100)->count(),
            "menengah" => Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 75)->count(),
            "pemula" => Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 60)->count(),
            "organisasi" => Personalorganisasi::where('personal_id', '=', $id)->get()
        ];

        $pdf = PDF::loadView('pages.akun.resume.pdf', $data);
        return $pdf->stream();
    }

    public function pemberitahuan()
    {
        $pengumuman = Pengumuman::where('publish', '=', true)
            ->orderBy('created_at', 'DESC')->get();
        return view('pages.akun.pemberitahuan.index', compact('pengumuman'));
    }

    public function pemberitahuan_detail($slug)
    {
        $pengumuman_detail = Pengumuman::select('pengumuman.*', 'mitra.logo as mitra_logo', 'mitra.nama as mitra_nama')
            ->where('pengumuman.slug', '=', $slug)
            ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
            ->first();

        $pengumuman_detail->counter = $pengumuman_detail->counter + 1;
        $pengumuman_detail->save();
        return view('pages.akun.pemberitahuan.detail', compact('pengumuman_detail'));
    }

    public function lowongan_tersimpan()
    {
        $wilayah = new Wilayah();
        $daftar_lowongan = Lowongan::select('lowongan.*', 'mitra.nama as mitra_nama', 'mitra.provinsi', 'mitra.kabupaten')
            ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
            ->join('personal_lowongan_tersimpan', 'personal_lowongan_tersimpan.lowongan_id', '=', 'lowongan.id')
            ->where('personal_lowongan_tersimpan.personal_id', '=', Auth::guard('personal')->user()->id)
            ->orderBy('personal_lowongan_tersimpan.created_at', 'DESC')
            ->get();
        return view('pages.akun.lowongan_tersimpan.index', compact('daftar_lowongan', 'wilayah'));
    }

    public function lamaran_terkirim()
    {
        $daftar_lowongan = Lowongan::select('lowongan.slug', 'lowongan.tanggal_berakhir', 'mitra.nama as mitra_nama', 'personal_lowongan_terkirim.created_at')
            ->leftJoin('mitra', 'mitra.id', '=', 'mitra_id')
            ->join('personal_lowongan_terkirim', 'personal_lowongan_terkirim.lowongan_id', '=', 'lowongan.id')
            ->where('personal_lowongan_terkirim.personal_id', '=', Auth::guard('personal')->user()->id)
            ->orderBy('personal_lowongan_terkirim.created_at', 'DESC')
            ->get();
        return view('pages.akun.lamaran_terkirim.index', compact('daftar_lowongan'));
    }

    public function latihan_tes()
    {
        return view('pages.akun.latihan_tes.index');
    }
}
