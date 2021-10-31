<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Mitra;
use App\Models\Personal;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jml_lowongan = Lowongan::where('publish', '=', true)->count();
        $jml_mitra = Mitra::where('publish', '=', true)->count();
        $jml_personal = Personal::count();

        $daftarMitra = Mitra::where('mitra_unggulan', '=', true)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();

        $daftarTestimonial = Testimonial::select('testimonial.*', 'personal.nama_depan', 'personal.nama_belakang', 'personal.photo')
            ->join('personal', 'personal.id', '=', 'personal_id')
            ->orderBy('testimonial.created_at', 'DESC')
            ->limit(6)
            ->get();

        return view('pages.home', compact(
            'jml_lowongan',
            'jml_mitra',
            'jml_personal',
            'daftarMitra',
            'daftarTestimonial'
        ));
    }
}
