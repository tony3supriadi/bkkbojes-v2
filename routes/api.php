<?php

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kabupaten/{provid}', function ($provid) {
    $wilayah = new Wilayah();
    return $wilayah->kabupaten($provid);
});

Route::get('kecamatan/{kabid}', function ($kabid) {
    $wilayah = new Wilayah();
    return $wilayah->kecamatan($kabid);
});

Route::get('desa/{desid}', function ($desid) {
    $wilayah = new Wilayah();
    return $wilayah->desa($desid);
});
