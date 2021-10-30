<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Personalketerampilan;
use App\Models\Personalorganisasi;
use App\Models\Personalpendidikan;
use App\Models\Personalpengalaman;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:pengguna-read|pengguna-create|pengguna-update|pengguna-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:pengguna-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pengguna-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pengguna-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = 0;
        $results = [];
        if (request()->get('type') == "json") {
            $pengguna = Personal::orderBy('nama_depan', 'ASC')->get();
            foreach ($pengguna as $item) {
                $results[$index] = $item;
                $results[$index]["encryptid"] = encrypt($item->id);
                $results[$index]["tanggal_lahir"] = Carbon::parse($item->tanggal_lahir)->isoFormat('DD MMMM Y');
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayah = new Wilayah();
        $provinces = $wilayah->provinsi();

        if (request()->get('get') == 'cities') {
            $cities = $wilayah->kabupaten(request()->get('kode'));
            return response()->json($cities);
        } else 
        if (request()->get('get') == 'regencies') {
            $regencies = $wilayah->kecamatan(request()->get('kode'));
            return response()->json($regencies);
        } else 
        if (request()->get('get') == 'villages') {
            $villages = $wilayah->desa(request()->get('kode'));
            return response()->json($villages);
        }

        return view('admin.pages.pengguna.create', compact('wilayah', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|max:16|min:16',
            'nama_depan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kodepos' => 'required',
            'phone' => 'required',
            'username' => 'required|min:6|unique:personal,username',
            'email' => 'required|unique:personal,email',
            'password' => 'required|confirmed|min:6',
            'jenis_akun' => 'required'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $pengguna = Personal::create($request->all());
        return redirect()->route("admin.pengguna.edit", encrypt($pengguna->id))
            ->with('success', 'Tambah data pengguna berhasil.');
    }

    /**
     * Show the form for details the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wilayah = new Wilayah();
        $pengguna = Personal::find(decrypt($id));
        return view('admin.pages.pengguna.show', compact('wilayah', 'pengguna'));
    }

    // ======= pengguna pengalaman
    public function pengalaman($id)
    {
        $index = 0;
        $results = [];
        $wilayah = new Wilayah();
        $pengguna = Personal::find(decrypt($id));

        if (request()->get('type') == "json") {
            $pengalaman = Personalpengalaman::where('personal_id', decrypt($id))->get();
            foreach ($pengalaman as $item) {
                $results[$index] = $item;
                $results[$index]["mulai_bekerja"] = Carbon::parse($item->mulai_bekerja)->isoFormat('DD MMM Y');
                $results[$index]["selesai_bekerja"] = Carbon::parse($item->selesai_bekerja)->isoFormat('DD MMM Y');
                $results[$index]["created_at_parse"] = Carbon::parse($item->created_at)->isoFormat('DD MMM Y, H:m:s');
                $index++;
            }
            return response()->json($results);
        }
        return view('admin.pages.pengguna.pengalaman', compact('wilayah', 'pengguna'));
    }

    // ======= pengguna pendidikan
    public function pendidikan($id)
    {
        $index = 0;
        $results = [];
        $wilayah = new Wilayah();
        $pengguna = Personal::find(decrypt($id));

        if (request()->get('type') == "json") {
            $pendidikan = Personalpendidikan::where('personal_id', decrypt($id))->get();
            foreach ($pendidikan as $item) {
                $results[$index] = $item;
                $results[$index]["mulai_sekolah"] = Carbon::parse($item->mulai_sekolah)->isoFormat('DD MMM Y');
                $results[$index]["selesai_sekolah"] = Carbon::parse($item->selesai_sekolah)->isoFormat('DD MMM Y');
                $results[$index]["created_at_parse"] = Carbon::parse($item->created_at)->isoFormat('DD MMM Y, H:m:s');
                $index++;
            }
            return response()->json($results);
        }
        return view('admin.pages.pengguna.pendidikan', compact('wilayah', 'pengguna'));
    }

    // ======= pengguna keterampilan
    public function keterampilan($id)
    {
        $index = 0;
        $results = [];
        $wilayah = new Wilayah();
        $pengguna = Personal::find(decrypt($id));

        if (request()->get('type') == "json") {
            $keterampilan = Personalketerampilan::where('personal_id', decrypt($id))->get();
            foreach ($keterampilan as $item) {
                $results[$index] = $item;
                $results[$index]["created_at_parse"] = Carbon::parse($item->created_at)->isoFormat('DD MMM Y, H:m:s');
                $index++;
            }
            return response()->json($results);
        }
        return view('admin.pages.pengguna.keterampilan', compact('wilayah', 'pengguna'));
    }

    // ======= pengguna organisasi
    public function organisasi($id)
    {
        $index = 0;
        $results = [];
        $wilayah = new Wilayah();
        $pengguna = Personal::find(decrypt($id));

        if (request()->get('type') == "json") {
            $organisasi = Personalorganisasi::where('personal_id', decrypt($id))->get();
            foreach ($organisasi as $item) {
                $results[$index] = $item;
                $results[$index]["mulai_menjabat"] = Carbon::parse($item->mulai_menjabat)->isoFormat('DD MMM Y');
                $results[$index]["selesai_menjabat"] = Carbon::parse($item->selesai_menjabat)->isoFormat('DD MMM Y');
                $results[$index]["created_at_parse"] = Carbon::parse($item->created_at)->isoFormat('DD MMM Y, H:m:s');
                $index++;
            }
            return response()->json($results);
        }
        return view('admin.pages.pengguna.organisasi', compact('wilayah', 'pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wilayah = new Wilayah();
        $provinces = $wilayah->provinsi();
        $pengguna = Personal::find(decrypt($id));

        if (request()->get('get') == 'cities') {
            $cities = $wilayah->kabupaten(request()->get('kode'));
            return response()->json($cities);
        } else 
        if (request()->get('get') == 'regencies') {
            $regencies = $wilayah->kecamatan(request()->get('kode'));
            return response()->json($regencies);
        } else 
        if (request()->get('get') == 'villages') {
            $villages = $wilayah->desa(request()->get('kode'));
            return response()->json($villages);
        }
        return view('admin.pages.pengguna.edit', compact('wilayah', 'provinces', 'pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik' => 'required|max:16|min:16',
            'nama_depan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kodepos' => 'required',
            'phone' => 'required',
            'username' => 'required|min:6|unique:personal,username,' . decrypt($id),
            'email' => 'required|unique:personal,email,' . decrypt($id),
            'jenis_akun' => 'required'
        ]);

        $pengguna = Personal::find(decrypt($id));

        $data = $request->all();
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            $data['password'] = $pengguna->password;
        }
        $pengguna->update($data);

        return redirect()->back()
            ->with('success', 'Ubah data pengguna berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = Personal::find(decrypt($id));
        $pengguna->delete();
        return redirect()->route('admin.pengguna.index')
            ->with('success', 'Hapus data pengguna berhasil.');
    }

    /**
     * Remove the resource selected from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulk_destroy()
    {
        $ids = json_decode(request()->ids);
        foreach ($ids as $id) {
            $data = Personal::find($id->id);
            $data->delete();
        }
        return redirect()->back()
            ->with('success', 'Hapus data pengguna berhasil.');
    }
}
