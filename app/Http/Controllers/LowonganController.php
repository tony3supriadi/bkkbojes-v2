<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $data = Lowongan::orderBy('create_by', 'DESC')->paginate(15);
        return view('pages.lowongan.index', compact('data'));
    }

    public function lowongan_detail()
    {
        return view('pages.lowongan.detail');
    }
}