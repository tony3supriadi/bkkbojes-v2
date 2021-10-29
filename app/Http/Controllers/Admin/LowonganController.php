<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Models\Mitra;
use App\Models\Programstudi;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:lowongan-read|lowongan-create|lowongan-update|lowongan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:lowongan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:lowongan-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:lowongan-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wilayah = new Wilayah();

        $index = 0;
        $results = [];
        if (request()->get('type') == "json") {
            $lowongan = Lowongan::select('lowongan.*', 'mitra.nama as mitra_nama', 'mitra.provinsi', 'mitra.kabupaten')
                ->leftJoin('mitra', 'mitra.id', '=', 'lowongan.mitra_id')
                ->where('lowongan.tanggal_berakhir', '>=', date('Y-m-d'))
                ->get();
            if (request()->get('lowongan') == 'berakhir') {
                $lowongan = Lowongan::select('lowongan.*', 'mitra.nama as mitra_nama', 'mitra.provinsi', 'mitra.kabupaten')
                    ->leftJoin('mitra', 'mitra.id', '=', 'lowongan.mitra_id')
                    ->where('tanggal_berakhir', '<', date('Y-m-d'))
                    ->get();
            }

            foreach ($lowongan as $item) {
                $results[$index] = $item;
                $results[$index]["encryptid"] = encrypt($item->id);
                $results[$index]["kabupaten_nama"] = str_replace("Kab. ", "", $wilayah->getName($item->kabupaten));
                $results[$index]["provinsi_nama"] = $wilayah->getName($item->provinsi);
                $results[$index]["tanggal_berakhir"] = Carbon::parse($item->tanggal_berakhir)->isoFormat('DD MMM Y');
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.lowongan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mitras = Mitra::orderBy('nama', 'ASC')->get();
        $programstudi = Programstudi::orderBy('nama', 'ASC')->get();
        return view('admin.pages.lowongan.create', compact('mitras', 'programstudi'));
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
            'judul' => 'required',
            'tipe_pekerjaan' => 'required',
            'program_studi' => 'required',
            'kisaran_gaji' => 'required',
            'tanggal_berakhir' => 'required',
        ]);

        $slug = str_replace([" ", ".", ","], ["-", "", ""], $request->judul);
        $lowongan = Lowongan::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'mitra_id' => $request->mitra_id,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'program_studi' => json_encode($request->program_studi),
            'kisaran_gaji' => $request->kisaran_gaji,
            'tampilkan_gaji' => $request->tampilkan_gaji,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'benefit' => $request->benefit,
            'catatan' => $request->catatan,
            'lainnya' => $request->lainnya,
            'tanggal_berakhir' => $request->tanggal_berakhir
        ]);
        return redirect()->route("admin.lowongan.edit", encrypt($lowongan->id))
            ->with('success', 'Tambah data lowongan berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lowongan = Lowongan::find(decrypt($id));
        $mitras = Mitra::orderBy('nama', 'ASC')->get();
        $programstudi = Programstudi::orderBy('nama', 'ASC')->get();
        return view('admin.pages.lowongan.edit', compact('lowongan', 'mitras', 'programstudi'));
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
            'judul' => 'required',
            'tipe_pekerjaan' => 'required',
            'program_studi' => 'required',
            'kisaran_gaji' => 'required',
            'tanggal_berakhir' => 'required',
        ]);

        $lowongan = Lowongan::find(decrypt($id));
        $slug = str_replace([" ", ".", ","], ["-", "", ""], $request->judul);
        $lowongan->update([
            'judul' => $request->judul,
            'slug' => $slug,
            'mitra_id' => $request->mitra_id,
            'tipe_pekerjaan' => $request->tipe_pekerjaan,
            'program_studi' => json_encode($request->program_studi),
            'kisaran_gaji' => $request->kisaran_gaji,
            'tampilkan_gaji' => $request->tampilkan_gaji,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'benefit' => $request->benefit,
            'catatan' => $request->catatan,
            'lainnya' => $request->lainnya,
            'tanggal_berakhir' => $request->tanggal_berakhir
        ]);
        return redirect()->back()
            ->with('success', 'Ubah data lowongan berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lowongan = Lowongan::find(decrypt($id));
        $lowongan->delete();
        return redirect()->route('admin.lowongan.index')
            ->with('success', 'Hapus data lowongan berhasil.');
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
            $data = Lowongan::find($id->id);
            $data->delete();
        }
        return redirect()->back()
            ->with('success', 'Hapus data lowongan berhasil.');
    }
}
