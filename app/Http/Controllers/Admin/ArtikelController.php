<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:artikel-read|artikel-create|artikel-update|artikel-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:artikel-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:artikel-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:artikel-delete', ['only' => ['destroy']]);
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
            $artikel = Artikel::orderBy('created_at', 'DESC')->get();
            foreach ($artikel as $item) {
                $results[$index] = $item;
                $results[$index]["encryptid"] = encrypt($item->id);
                $results[$index]["createdAt"] = Carbon::parse($item->created_at)->isoFormat('DD MMM Y, H:m');
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.artikel.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.artikel.create');
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

        $slug = str_replace([" ", ".", ","], ["-", "", ""], strtolower($request->judul)) . '-' . time();

        $fileName = "";
        if ($request->image) {
            $fileName = $slug . "." . $request->image->extension();
            $request->image->move(public_path('uploads/artikel'), $fileName);
        }

        $artikel = Artikel::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'image' => basename($fileName),
            'meta_tag' => $request->meta_tag,
            'meta_deskripsi' => $request->meta_deskripsi,
            'publish' => $request->publish
        ]);
        return redirect()->route("admin.artikel.edit", encrypt($artikel->id))
            ->with('success', 'Tambah data artikel berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find(decrypt($id));
        return view('admin.pages.artikel.edit', compact('artikel'));
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

        $fileName = "";
        if ($request->image) {
            $fileName = $data['slug'] . "." . $request->image->extension();
            $request->image->move(public_path('uploads/artikel'), $fileName);

            $data['image'] = $fileName;
        }

        if (!$request->publish) {
            $data['publish'] = false;
        }

        $artikel = Artikel::find(decrypt($id));
        $artikel->update($data);

        return redirect()->back()
            ->with('success', 'Ubah data artikel berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find(decrypt($id));
        $artikel->delete();
        return redirect()->route('admin.artikel.index')
            ->with('success', 'Hapus data artikel berhasil.');
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
            $data = Artikel::find($id->id);
            $data->delete();
        }
        return redirect()->back()
            ->with('success', 'Hapus data artikel berhasil.');
    }
}
