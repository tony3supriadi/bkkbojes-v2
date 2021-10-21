<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Halaman;
use Illuminate\Http\Request;

class TentangkamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:tentang-kami-read|tentang-kami-create|tentang-kami-update|tentang-kami-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:tentang-kami-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tentang-kami-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tentang-kami-delete', ['only' => ['destroy']]);
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

            foreach (Halaman::where('name', '=', 'tentang-kami')
                ->orderBy('ordering', 'ASC')
                ->get() as $item) {

                $results[$index] = $item;
                $results[$index]["encryptid"] = encrypt($item->id);
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.halaman.tentang-kami.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.halaman.tentang-kami.create');
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
        return redirect()->route("admin.tentang-kami.edit", encrypt($halaman->id))
            ->with('success', 'Tambah data tentang kami berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tentang_kami = Halaman::find(decrypt($id));
        return view('admin.pages.halaman.tentang-kami.edit', compact('tentang_kami'));
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
            ->with('success', 'Ubah data tentang kami berhasil.');
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
        return redirect()->route('admin.tentang-kami.index')
            ->with('success', 'Hapus data tentang kami berhasil.');
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
            ->with('success', 'Hapus data tentang kami berhasil.');
    }
}
