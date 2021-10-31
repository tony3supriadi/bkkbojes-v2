<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentang_kami = Halaman::where('name', '=', 'tentang-kami')
            ->orderBy('ordering')->get();
        return view('pages.tentang-kami', compact('tentang_kami'));
    }
}
