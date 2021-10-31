<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "/akun/profile-saya/personal";

    public function __construct()
    {
        $this->middleware('guest:personal')->except('logout');
    }

    public function index()
    {
        return view('pages.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('home');
    }

    protected function username()
    {
        $username = request()->input('nama_pengguna');
        return filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'nama_pengguna';
    }

    protected function guard()
    {
        return Auth::guard('personal');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
}
