<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:pengaturan-read|pengaturan-update', ['only' => ['index', 'store']]);
        $this->middleware('permission:pengaturan-update', ['only' => ['edit', 'update']]);
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
        if (request()->get('type') == 'json') {
            $data = Pengaturan::orderBy('nama', 'ASC')->get();
            foreach ($data as $item) {
                $results[$index] = $item;
                $results[$index]['encryptId'] = encrypt($item->id);
                $results[$index]['createdAt'] = Carbon::parse($item->created_at)->isoFormat('DD MMMM Y');
                $results[$index]['updatedAt'] = Carbon::parse($item->updated_at)->isoFormat('DD MMMM Y');
                $index++;
            }
            return response()->json($results);
        }
        return view('admin.pages.pengaturan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaturan = Pengaturan::find(decrypt($id));
        return view('admin.pages.pengaturan.edit', compact('pengaturan'));
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
            'konten' => 'required'
        ]);

        $pengaturan = Pengaturan::find(decrypt($id));
        $pengaturan->update($request->all());
        return redirect()->back()
            ->with('success', 'Pengaturan berhasil diubah.');
    }
}
