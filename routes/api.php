<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AgendaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['web']], function () {
    Route::post('/login', [LoginController::class,'login']);
    Route::post('/logout', [LoginController::class,'logout']);
});


//berita route
Route::post('/berita', [BeritaController::class,'index']);
Route::post('/beritainsert', [BeritaController::class,'store']);
Route::post('/beritashow', [BeritaController::class,'show']);
Route::post('/beritaupdate', [BeritaController::class,'update']);
Route::post('/beritadelete', [BeritaController::class,'destroy']);

//banner route
Route::post('/banner', [BannerController::class,'index']);
Route::post('/bannerinsert', [BannerController::class,'store']);
Route::post('/bannershow', [BannerController::class,'show']);
Route::post('/bannerupdate', [BannerController::class,'update']);
Route::post('/bannerdelete', [BannerController::class,'destroy']);

//agenda route
Route::post('/agenda', [AgendaController::class,'index']);
Route::post('/agendainsert', [AgendaController::class,'store']);
Route::post('/agendashow', [AgendaController::class,'show']);
Route::post('/agendaupdate', [AgendaController::class,'update']);
Route::post('/agendadelete', [AgendaController::class,'destroy']);