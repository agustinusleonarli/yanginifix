<?php

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
//Dosen
Route::get('/dosenprodi/{id}', [App\Http\Controllers\Api\DosenController::class, 'test']);
Route::get('/dosen', [App\Http\Controllers\Api\DosenController::class, 'index']);
//Fasilitas
Route::get('/sarana', [App\Http\Controllers\Api\SaranaController::class, 'index']);
//Berita
Route::get('/berita', [App\Http\Controllers\Api\PostController::class, 'index']);
//Penghargaan
Route::get('/penghargaan', [App\Http\Controllers\Api\PenghargaanController::class, 'index']);
//Acara
Route::get('/acara', [App\Http\Controllers\Api\EventController::class, 'index']);
//Visi Misi
Route::get('/visimisi', [App\Http\Controllers\Api\VisiMisiController::class, 'index']);
Route::get('/visiprodi/{id}', [App\Http\Controllers\Api\VisiMisiController::class, 'test']);
// Kurikulum
Route::get('/kurikulumprodi/{id}', [App\Http\Controllers\Api\KurikulumController::class, 'test']);
Route::get('/kurikulum', [App\Http\Controllers\Api\KurikulumController::class, 'index']);
