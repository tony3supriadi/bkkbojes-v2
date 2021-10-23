<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bidangusaha;
use App\Models\Mitra;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:mitra-read|mitra-create|mitra-update|mitra-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:mitra-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:mitra-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:mitra-delete', ['only' => ['destroy']]);
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
            if (request()->get('mitra') == "unggulan") {

                foreach (Mitra::where('mitra_unggulan', '=', true)
                    ->orderBy('nama', 'ASC')
                    ->get() as $item) {

                    $results[$index] = $item;
                    $results[$index]["encryptid"] = encrypt($item->id);
                    $index++;
                }
            } else {
                foreach (Mitra::orderBy('nama', 'ASC')->get() as $item) {
                    $results[$index] = $item;
                    $results[$index]["encryptid"] = encrypt($item->id);
                    $index++;
                }
            }
            return response()->json($results);
        }

        return view('admin.pages.mitra.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayah = new Wilayah();
        $cities = $wilayah->kabupaten();
        $bidangusaha = Bidangusaha::all();
        return view('admin.pages.mitra.create', compact('cities', 'bidangusaha'));
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
            'nama' => 'required',
            'logo' => 'required|file|max:2000',
            'lokasi' => 'required',
            'bentuk_usaha' => 'required',
            'bidang_usaha' => 'required',
            'badan_usaha' => 'required',
            'jumlah_karyawan' => 'required',
            'waktu_kerja' => 'required',
            'busana_kerja' => 'required',
            'kontak' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'faxmail' => 'required',
            'website' => 'required',
            'profile_perusahaan' => 'required'
        ]);

        $slug_string = str_replace([" ", "."], ["-", ""], strtolower($request->nama)) . '-' . time();
        $storage_path = Storage::putFile(
            'public/uploads/mitra',
            $request->file('logo'),
        );

        $mitra = Mitra::create([
            'nama' => $request->nama,
            'logo' => basename($storage_path),
            'slug' => $slug_string,
            'lokasi' => $request->lokasi,
            'bidang_usaha' => $request->bidang_usaha,
            'badan_usaha' => $request->badan_usaha,
            'bentuk_usaha' => $request->bentuk_usaha,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'waktu_kerja' => $request->waktu_kerja,
            'busana_kerja' => $request->busana_kerja,
            'kontak' => $request->kontak,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'faxmail' => $request->faxmail,
            'website' => $request->website,
            'profile_perusahaan' => $request->profile_perusahaan,
            'mitra_unggulan' => $request->mitra_unggulan ? true : false,
            'publish' => $request->publish ? true : false
        ]);
        return redirect()->route("admin.mitra.edit", encrypt($mitra->id))
            ->with('success', 'Tambah data mitra berhasil.');
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
        $cities = $wilayah->kabupaten();
        $bidangusaha = Bidangusaha::all();
        $mitra = Mitra::find(decrypt($id));
        return view('admin.pages.mitra.edit', compact('cities', 'bidangusaha', 'mitra'));
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
            'nama' => 'required',
            'lokasi' => 'required',
            'bentuk_usaha' => 'required',
            'bidang_usaha' => 'required',
            'badan_usaha' => 'required',
            'jumlah_karyawan' => 'required',
            'waktu_kerja' => 'required',
            'busana_kerja' => 'required',
            'kontak' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'faxmail' => 'required',
            'website' => 'required',
            'profile_perusahaan' => 'required'
        ]);

        $mitra = Mitra::find(decrypt($id));

        $slug_string = str_replace([" ", "."], ["-", ""], strtolower($request->nama)) . '-' . time();
        $storage_path = $mitra->logo;
        if ($request->logo) {
            $storage_path = Storage::putFile(
                'public/uploads/mitra',
                $request->file('logo'),
            );
        }

        $mitra->nama = $request->nama;
        $mitra->logo = basename($storage_path);
        $mitra->slug = $slug_string;
        $mitra->lokasi = $request->lokasi;
        $mitra->bidang_usaha = $request->bidang_usaha;
        $mitra->badan_usaha = $request->badan_usaha;
        $mitra->bentuk_usaha = $request->bentuk_usaha;
        $mitra->jumlah_karyawan = $request->jumlah_karyawan;
        $mitra->waktu_kerja = $request->waktu_kerja;
        $mitra->busana_kerja = $request->busana_kerja;
        $mitra->kontak = $request->kontak;
        $mitra->telephone = $request->telephone;
        $mitra->email = $request->email;
        $mitra->faxmail = $request->faxmail;
        $mitra->website = $request->website;
        $mitra->profile_perusahaan = $request->profile_perusahaan;
        $mitra->mitra_unggulan = $request->mitra_unggulan ? true : false;
        $mitra->publish = $request->publish ? true : false;
        $mitra->save();

        return redirect()->back()
            ->with('success', 'Ubah data mitra berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mitra = Mitra::find(decrypt($id));
        $mitra->delete();
        return redirect()->route('admin.mitra.index')
            ->with('success', 'Hapus data mitra berhasil.');
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
            $data = Mitra::find($id->id);
            $data->delete();
        }
        return redirect()->back()
            ->with('success', 'Hapus data mitra berhasil.');
    }
}
