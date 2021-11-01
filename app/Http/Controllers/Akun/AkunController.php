<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Personalketerampilan;
use App\Models\Personalorganisasi;
use App\Models\Personalpendidikan;
use App\Models\Personalpengalaman;
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
        return view('pages.akun.pemberitahuan.index');
    }

    public function pemberitahuan_detail()
    {
        return view('pages.akun.pemberitahuan.detail');
    }

    public function lowongan_tersimpan()
    {
        return view('pages.akun.lowongan_tersimpan.index');
    }

    public function lamaran_terkirim()
    {
        return view('pages.akun.lamaran_terkirim.index');
    }

    public function latihan_tes()
    {
        return view('pages.akun.latihan_tes.index');
    }
}
