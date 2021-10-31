<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Halaman::where('name', '=', 'faq')
            ->orderBy('ordering')->get();
        return view('pages.faq.index', compact('faqs'));
    }
}
