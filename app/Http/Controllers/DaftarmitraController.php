<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class DaftarmitraController extends Controller
{
    public function index()
    {
        return view('pages.mitra.index');
    }

    public function show()
    {
        return view('pages.mitra.show');
    }
}
