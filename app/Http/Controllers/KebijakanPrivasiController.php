<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;

class KebijakanPrivasiController extends Controller
{
    public function index()
    {
        $kebijakan_privasi = Halaman::where('name', '=', 'kebijakan-privasi')
            ->orderBy('ordering')->get();
        return view('pages.kebijakan-privasi', compact('kebijakan_privasi'));
    }
}
