<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KetentuanPenggunaanController extends Controller
{
    public function index()
    {
        return view('pages.ketentuan-penggunaan');
    }
}
