<?php

namespace App\Http\Controllers\Akun;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Personalketerampilan;
use App\Models\Personalorganisasi;
use App\Models\Personalpendidikan;
use App\Models\Personalpengalaman;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function redirectTo()
    {
        return redirect()->route('akun.profile.personal');
    }

    public function personal()
    {
        $id = Auth::guard('personal')->user()->id;
        $personal = Personal::find($id);
        return view('pages.akun.profile.personal', compact('personal'));
    }

    public function personal_edit($id)
    {
        $personal = Personal::find(decrypt($id));

        $wilayah = new Wilayah();
        $provinsi = $wilayah->provinsi();
        $kabupaten = [];
        if ($personal->provinsi) {
            $kabupaten = $wilayah->kabupaten($personal->provinsi);
        }

        $kecamatan = [];
        if ($personal->kecamatan) {
            $kecamatan = $wilayah->kecamatan($personal->kabupaten);
        }

        $desa = [];
        if ($personal->desa) {
            $desa = $wilayah->desa($personal->kecamatan);
        }

        return view('pages.akun.profile.personal_edit', compact('personal', 'provinsi', 'kabupaten', 'kecamatan', 'desa'));
    }

    public function personal_update(Request $request, $id)
    {
        // return response()->json($request->all());
        $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'phone' => 'required|unique:personal,phone,' . decrypt($id),
            'email' => 'required|email|unique:personal,email,' . decrypt($id),
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kodepos' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required'
        ]);

        $data = $request->all();
        if (!empty($data['photo'])) {
            $data = Arr::except($data, array('photo'));
        }

        $personal = Personal::find(decrypt($id));
        $personal->update($data);

        return redirect()->route('akun.profile.personal')
            ->with('success', 'Data informasi personal berhasil di ubah.');
    }

    public function pengalaman()
    {
        $id = Auth::guard('personal')->user()->id;
        $pengalaman = Personalpengalaman::where('personal_id', '=', $id)->orderBy('mulai_bekerja', 'DESC')->get();
        return view('pages.akun.profile.pengalaman', compact('pengalaman'));
    }

    public function pengalaman_create()
    {
        $wilayah = new Wilayah();
        $provinsi = $wilayah->provinsi();
        return view('pages.akun.profile.pengalaman_create', compact('provinsi'));
    }

    public function pengalaman_store(Request $request)
    {
        $request->validate([
            "mulai_bekerja" => 'required',
            "selesai_bekerja" => $request->masih_bekerja ? "" : "required",
            "posisi_jabatan" => "required",
            "nama_perusahaan" => "required",
            "bidang_industri" => "required",
            "alamat" => "required",
            "provinsi" => "required",
            "kabupaten" => "required"
        ]);

        Personalpengalaman::create($request->all());

        return redirect()->route('akun.profile.pengalaman')
            ->with('success', 'Anda berhasil menambahkan pengalaman kerja.');
    }

    public function pengalaman_edit($id)
    {
        $pengalaman = Personalpengalaman::find(decrypt($id));

        $wilayah = new Wilayah();
        $provinsi = $wilayah->provinsi();
        $kabupaten = $wilayah->kabupaten($pengalaman->provinsi);

        return view('pages.akun.profile.pengalaman_edit', compact('pengalaman', 'provinsi', 'kabupaten'));
    }

    public function pengalaman_update(Request $request, $id)
    {
        $request->validate([
            "mulai_bekerja" => 'required',
            "selesai_bekerja" => $request->masih_bekerja ? "" : "required",
            "posisi_jabatan" => "required",
            "nama_perusahaan" => "required",
            "bidang_industri" => "required",
            "alamat" => "required",
            "provinsi" => "required",
            "kabupaten" => "required"
        ]);

        $data = $request->all();
        $data['masih_bekerja'] = 0;

        $pengalaman = Personalpengalaman::find(decrypt($id));
        $pengalaman->fill($data);
        $pengalaman->save();

        return redirect()->route('akun.profile.pengalaman')
            ->with('success', 'Perubahan data pengalaman kerja berhasil');
    }

    public function pengalaman_destroy($id)
    {
        $pengalaman = Personalpengalaman::find(decrypt($id));
        $pengalaman->delete();

        return redirect()->route('akun.profile.pengalaman')
            ->with('success', 'Penghapusan pengalaman kerja berhasil');
    }


    public function pendidikan()
    {
        $id = Auth::guard('personal')->user()->id;
        $pendidikan = Personalpendidikan::where('personal_id', '=', $id)->orderBy('mulai_sekolah', 'DESC')->get();
        return view('pages.akun.profile.pendidikan', compact('pendidikan'));
    }

    public function pendidikan_create()
    {
        $wilayah = new Wilayah();
        $provinsi = $wilayah->provinsi();
        return view('pages.akun.profile.pendidikan_create', compact('provinsi'));
    }

    public function pendidikan_store(Request $request)
    {
        $request->validate([
            "mulai_sekolah" => "required",
            "selesai_sekolah" => $request->masih_sekolah ? '' : 'required',
            "nama_sekolah" => "required",
            "alamat" => "required",
            "provinsi" => "required",
            "kabupaten" => "required",
            "jenjang_pendidikan" => "required",
            "program_studi" => "required",
            "nilai_akhir" => "required|numeric"
        ]);
        Personalpendidikan::create($request->all());
        return redirect()->route('akun.profile.pendidikan')
            ->with('success', 'Penambahan riwayat pendidikan berhasil');
    }

    public function pendidikan_edit($id)
    {
        $pendidikan = Personalpendidikan::find(decrypt($id));

        $wilayah = new Wilayah();
        $provinsi = $wilayah->provinsi();
        $kabupaten = $wilayah->kabupaten($pendidikan->kabupaten);
        return view('pages.akun.profile.pendidikan_edit', compact('provinsi', 'kabupaten', 'pendidikan'));
    }

    public function pendidikan_update(Request $request, $id)
    {
        $request->validate([
            "mulai_sekolah" => "required",
            "selesai_sekolah" => $request->masih_sekolah ? '' : 'required',
            "nama_sekolah" => "required",
            "alamat" => "required",
            "provinsi" => "required",
            "kabupaten" => "required",
            "jenjang_pendidikan" => "required",
            "program_studi" => "required",
            "nilai_akhir" => "required|numeric"
        ]);

        $pendidikan = Personalpendidikan::find(decrypt($id));

        $data = $request->all();
        $data['masih_sekolah'] = $request->masih_sekolah
            ? $request->masih_sekolah : 0;

        $data['selesai_sekolah'] = $request->masih_sekolah
            ? '' : $request->selesai_sekolah;

        $pendidikan->fill($data);
        $pendidikan->save();

        return redirect()->route('akun.profile.pendidikan')
            ->with('success', 'Perubahan riwayat pendidikan berhasil');
    }

    public function pendidikan_destroy($id)
    {
        $pendidikan = Personalpendidikan::find(decrypt($id));
        $pendidikan->delete();

        return redirect()->route('akun.profile.pendidikan')
            ->with('success', 'Penghapusan riwayat pendidikan berhasil');
    }

    public function keterampilan()
    {
        $id = Auth::guard('personal')->user()->id;
        $keterampilan = Personalketerampilan::where('personal_id', '=', $id)->get();

        $mahir = Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 'Mahir')->count();
        $menengah = Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 'Menengah')->count();
        $pemula = Personalketerampilan::where('personal_id', '=', $id)->where('level', '=', 'Pemula')->count();

        return view('pages.akun.profile.keterampilan', compact('keterampilan', 'mahir', 'menengah', 'pemula'));
    }

    public function keterampilan_edit()
    {
        $id = Auth::guard('personal')->user()->id;
        $keterampilan = Personalketerampilan::where('personal_id', '=', $id)->get();

        if (request()->get('type') == 'json') {
            return response()->json($keterampilan);
        }

        return view('pages.akun.profile.keterampilan_edit', compact('keterampilan'));
    }

    public function keterampilan_update(Request $request)
    {
        Personalketerampilan::where('personal_id', '=', $request->personal_id)->delete();

        $data = $request->all();
        foreach ($data['keterampilan'] as $item) {
            Personalketerampilan::create([
                "personal_id" => $data["personal_id"],
                "keterampilan" => $item["skill"],
                "level" => $item["level"]
            ]);
        }

        return redirect()
            ->route('akun.profile.keterampilan');
    }

    public function organisasi()
    {
        $id = Auth::guard('personal')->user()->id;
        $organisasi = Personalorganisasi::where('personal_id', '=', $id)->get();

        return view('pages.akun.profile.organisasi', compact('organisasi'));
    }

    public function organisasi_create()
    {
        return view('pages.akun.profile.organisasi_create');
    }

    public function organisasi_store(Request $request)
    {
        $request->validate([
            'mulai_menjabat' => 'required',
            'selesai_menjabat' => $request->masih_menjabat ? '' : 'required',
            'nama_organisasi' => 'required',
            'posisi_jabatan' => 'required'
        ]);

        Personalorganisasi::create($request->all());
        return redirect()->route('akun.profile.organisasi')
            ->with('success', 'Penamabahan data organisasi berhasil');
    }

    public function organisasi_edit($id)
    {
        $organisasi = Personalorganisasi::find(decrypt($id));
        return view('pages.akun.profile.organisasi_edit', compact('organisasi'));
    }

    public function organisasi_update(Request $request, $id)
    {
        $request->validate([
            'mulai_menjabat' => 'required',
            'selesai_menjabat' => $request->masih_menjabat ? '' : 'required',
            'nama_organisasi' => 'required',
            'posisi_jabatan' => 'required'
        ]);

        $organisasi = Personalorganisasi::find(decrypt($id));

        $data = $request->all();
        $data['masih_menjabat'] = $request->masih_menjabat ? $request->masih_menjabat : 0;

        $organisasi->fill($data);
        $organisasi->save();

        return redirect()->route('akun.profile.organisasi')
            ->with('success', 'Perubahan data organisasi berhasil');
    }

    public function organisasi_destroy($id)
    {
        $organisasi = Personalorganisasi::find(decrypt($id));
        $organisasi->delete();

        return redirect()->route('akun.profile.organisasi')
            ->with('success', 'Penghapusan data organisasi berhasil');
    }
}
