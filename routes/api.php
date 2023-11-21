<?php

use App\Http\Controllers\ArquivoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Upload arquivo
Route::controller(ArquivoController::class)->group(function(){
    Route::get('/upload/arquivos', 'arquivos')->name('arquivo.arquivos');
    Route::post('/upload', 'upload')->name('arquivo.upload');
    Route::put('/upload/arquivo/update/{id}', 'update')->name('arquivo.update');
    Route::get('/upload/arquivo/{id}', 'show')->name('arquivo.show');
    Route::delete('/upload/arquivo/delete/{id}', 'destroy')->name('arquivo.destroy');
});