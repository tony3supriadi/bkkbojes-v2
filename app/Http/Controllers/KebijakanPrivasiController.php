<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KebijakanPrivasiController extends Controller
{
    public function index()
    {
        return view('pages.kebijakan-privasi');
    }
}
