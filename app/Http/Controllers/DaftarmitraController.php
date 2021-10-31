<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class DaftarmitraController extends Controller
{
    public function index()
    {
        return view('pages.mitra.index');
    }

    public function show($slug)
    {
        $mitra = Mitra::where('slug', '=', $slug)->first();
        return view('pages.mitra.show', compact('mitra'));
    }
}
