<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;

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


Route::post('/berita', [BeritaController::class,'index']);
Route::post('/beritainsert', [BeritaController::class,'store']);
Route::post('/beritashow', [BeritaController::class,'show']);
Route::post('/beritaupdate', [BeritaController::class,'update']);
Route::post('/beritadelete', [BeritaController::class,'destroy']);