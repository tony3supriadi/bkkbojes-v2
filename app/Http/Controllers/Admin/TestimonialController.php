<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:testimonial-read|testimonial-create|testimonial-update|testimonial-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:testimonial-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
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

            $testimonial = Testimonial::select('testimonial.*', 'personal.nama_depan as personal_nama', 'personal.nama_belakang as personal_nama_belakang')
                ->join('personal', 'personal.id', '=', 'personal_id')
                ->orderBy('created_at', 'DESC')
                ->get();

            foreach ($testimonial as $item) {
                $results[$index] = $item;
                $results[$index]["encryptid"] = encrypt($item->id);
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal = Personal::orderBy('nama_depan', 'ASC')->get();
        return view('admin.pages.testimonial.create', compact('personal'));
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
            'personal_id' => 'required',
            'jenis_akun' => 'required',
            'bekerja_di' => 'required',
            'testimonial' => 'required'
        ]);
        $testimonial = Testimonial::create($request->all());
        return redirect()->route("admin.testimonial.edit", encrypt($testimonial->id))
            ->with('success', 'Tambah data testimonial berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find(decrypt($id));
        $personal = Personal::orderBy('nama_depan', 'ASC')->get();
        return view('admin.pages.testimonial.edit', compact('testimonial', 'personal'));
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
            'personal_id' => 'required',
            'jenis_akun' => 'required',
            'bekerja_di' => 'required',
            'testimonial' => 'required'
        ]);
        $testimonial = Testimonial::find(decrypt($id));
        $testimonial->update($request->all());
        return redirect()->back()
            ->with('success', 'Ubah data testimonial berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find(decrypt($id));
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Hapus data testimonial berhasil.');
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
            $data = Testimonial::find($id->id);
            $data->delete();
        }
        return redirect()->back()
            ->with('success', 'Hapus data testimonial berhasil.');
    }
}
