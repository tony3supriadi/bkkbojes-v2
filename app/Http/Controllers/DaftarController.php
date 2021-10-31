<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{

    use RegistersUsers, VerifiesEmails;

    protected $personal = [];
    protected $redirectTo = "/akun/profile-saya/personal";

    public function __construct()
    {
        $this->middleware('guest:personal')
            ->except('confirm_page', 'confirm_resend', 'confirm_verify', 'success_page');
    }

    protected function guard()
    {
        $guard = Auth::guard('personal');
        Auth::setUser($this->personal);
        return $guard;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_depan' => 'required|max:64',
            'nama_belakang' => 'required|max:64',
            'email' => 'required|email|unique:fdf1_personal|max:128',
            'no_hp' => 'required|unique:fdf1_personal|max:16',
            'nama_pengguna' => 'required|unique:fdf1_personal|max:64',
            'jenis_akun' => 'required',
            'password' => 'required|confirmed|min:6',
            'agree' => 'required'
        ], [
            'agree.required' => 'Silahkan setujui ketentuan pengguna & kebijakan privasi.'
        ]);
    }

    protected function create(array $data)
    {
        $personal = Personal::create([
            'nama_depan' => $data['nama_depan'],
            'nama_belakang' => $data['nama_belakang'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp'],
            'nama_pengguna' => $data['nama_pengguna'],
            'jenis_akun' => $data['jenis_akun'],
            'password' => Hash::make($data['password'])
        ]);
        $this->personal = $personal;
        return $personal;
    }

    public function index()
    {
        return view('pages.daftar');
    }

    public function confirm_page(Request $request)
    {
        return Auth::guard('personal')->user()->hasVerifiedEmail()
            ? redirect()->route('akun.profile.personal')
            : view('pages.daftar-konfirmasi');
    }

    public function confirm_resend(Request $request)
    {
        if (Auth::guard('personal')->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect($this->redirectPath());
        }

        Auth::guard('personal')->user()->sendEmailVerificationNotification();

        return $request->wantsJson()
            ? new JsonResponse([], 202)
            : redirect()->route('verification.notice')->with('resent', true);
    }

    public function confirm_verify(Request $request)
    {
        if (!hash_equals((string) $request->route('id'), (string) Auth::guard('personal')->user()->getKey())) {
            throw new AuthorizationException();
        }

        if (!hash_equals((string) $request->route('hash'), sha1(Auth::guard('personal')->user()->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if (Auth::guard('personal')->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect($this->redirectPath());
        }

        if (Auth::guard('personal')->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('daftar.berhasil')
            ->with('verified', true);
    }

    public function success_page()
    {
        return view('pages.daftar-berhasil');
    }
}
