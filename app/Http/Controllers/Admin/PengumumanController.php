<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:pengumuman-read|pengumuman-create|pengumuman-update|pengumuman-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:pengumuman-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pengumuman-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pengumuman-delete', ['only' => ['destroy']]);
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
            $pengumuman = Pengumuman::select('pengumuman.*', 'mitra.nama as mitra_nama')
                ->leftJoin('mitra', 'pengumuman.mitra_id', '=', 'mitra.id')
                ->orderBy('pengumuman.created_at', 'DESC')->get();
            foreach ($pengumuman as $item) {
                $results[$index] = $item;
                $results[$index]["encryptid"] = encrypt($item->id);
                $results[$index]["createdAt"] = Carbon::parse($item->created_at)->isoFormat('DD MMM Y, H:m');
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.pengumuman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mitras = Mitra::where('publish', '=', true)->get();
        return view('admin.pages.pengumuman.create', compact('mitras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            ['judul' => 'required'],
            ['judul.required' => 'Judul harus diisi.']
        );
        $data = $request->all();
        $data['slug'] = str_replace([" ", ".", ","], ["-", "", ""], strtolower($request->judul)) . '-' . time();
        $pengumuman = Pengumuman::create($data);
        return redirect()->route("admin.pengumuman.edit", encrypt($pengumuman->id))
            ->with('success', 'Tambah data pengumuman berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::find(decrypt($id));
        $mitras = Mitra::where('publish', '=', true)->get();
        return view('admin.pages.pengumuman.edit', compact('pengumuman', 'mitras'));
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
        $this->validate(
            $request,
            ['judul' => 'required'],
            ['judul.required' => 'Judul harus diisi.']
        );
        $data = $request->all();
        $data['slug'] = str_replace([" ", ".", ","], ["-", "", ""], strtolower($request->judul)) . '-' . time();

        if (!$request->publish) {
            $data['publish'] = false;
        }

        $pengumuman = Pengumuman::find(decrypt($id));
        $pengumuman->update($data);

        return redirect()->back()
            ->with('success', 'Ubah data pengumuman berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::find(decrypt($id));
        $pengumuman->delete();
        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Hapus data pengumuman berhasil.');
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
            $data = Pengumuman::find($id->id);
            $data->delete();
        }
        return redirect()->back()
            ->with('success', 'Hapus data pengumuman berhasil.');
    }
}
