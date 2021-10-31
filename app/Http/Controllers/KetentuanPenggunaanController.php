<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;

class KetentuanPenggunaanController extends Controller
{
    public function index()
    {
        $ketentuan_pengguna = Halaman::where('name', '=', 'ketentuan-pengguna')
            ->orderBy('ordering')->get();
        return view('pages.ketentuan-penggunaan', compact('ketentuan_pengguna'));
    }
}
