<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $data = Testimonial::select('testimonial.*', 'personal.nama_depan as personal_nama_depan', 'personal.nama_belakang as personal_nama_belakang', 'personal.photo as personal_photo')
            ->join('personal', 'personal.id', '=', 'personal_id')
            ->orderBy('testimonial.created_at', 'DESC')
            ->paginate(8);
        return view('pages.testimonial', compact('data'));
    }
}
