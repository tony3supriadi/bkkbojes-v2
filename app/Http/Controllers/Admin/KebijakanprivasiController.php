<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Http\Request;

class KebijakanprivasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:kebijakan-privasi-read|kebijakan-privasi-create|kebijakan-privasi-update|kebijakan-privasi-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:kebijakan-privasi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:kebijakan-privasi-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:kebijakan-privasi-delete', ['only' => ['destroy']]);
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

            foreach (Halaman::where('name', '=', 'kebijakan-privasi')
                ->orderBy('ordering', 'ASC')
                ->get() as $item) {

                $results[$index] = $item;
                $results[$index]["encryptid"] = encrypt($item->id);
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.halaman.kebijakan-privasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.halaman.kebijakan-privasi.create');
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
            ['point' => 'required'],
            ['point.required' => 'Pertanyaan harus diisi.']
        );
        $halaman = Halaman::create($request->all());
        return redirect()->route("admin.kebijakan-privasi.edit", encrypt($halaman->id))
            ->with('success', 'Tambah data kebijakan privasi berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kebijakan_privasi = Halaman::find(decrypt($id));
        return view('admin.pages.halaman.kebijakan-privasi.edit', compact('kebijakan_privasi'));
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
            ['point' => 'required'],
            ['point.required' => 'Pertanyaan harus diisi.']
        );
        $halaman = Halaman::find(decrypt($id));
        $halaman->update($request->all());
        return redirect()->back()
            ->with('success', 'Ubah data kebijakan privasi berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $halaman = Halaman::find(decrypt($id));
        $halaman->delete();
        return redirect()->route('admin.kebijakan-privasi.index')
            ->with('success', 'Hapus data kebijakan privasi berhasil.');
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
            $data = Halaman::find($id->id);
            $data->delete();
        }
        return redirect()->back()
            ->with('success', 'Hapus data kebijakan privasi berhasil.');
    }
}
